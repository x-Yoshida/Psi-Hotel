<?php
/**
 * @package     VikBooking
 * @subpackage  com_vikbooking
 * @author      Alessio Gaggii - E4J srl
 * @copyright   Copyright (C) 2025 E4J srl. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @link        https://vikwp.com
 */

// No direct access to this file
defined('ABSPATH') or die('No script kiddies please!');

/**
 * VikBooking check-in controller.
 *
 * @since   1.17.4 (J) - 1.7.4 (WP)
 */
class VikBookingControllerCheckin extends JControllerAdmin
{
    /**
     * AJAX endpoint for storing a customer signature during pre-checkin.
     * Endpoint originally introduced for the PaxField of type "signature".
     */
    public function saveSignature()
    {
        $app = JFactory::getApplication();
        $dbo = JFactory::getDbo();

        if (!JSession::checkToken()) {
            // missing CSRF-proof token
            VBOHttpDocument::getInstance($app)->close(403, JText::translate('JINVALID_TOKEN'));
        }

        // gather request values
        $sid = $app->input->getAlnum('sid', '');
        $ts = $app->input->getUInt('ts', 0);
        $pad_ratio = $app->input->getUInt('pad_ratio', 1);
        $pad_width = $app->input->getUInt('pad_width', 0);
        $signature = $app->input->get('signature', '', 'raw');

        if (empty($signature)) {
            VBOHttpDocument::getInstance($app)->close(400, 'Missing signature image data');
        }

        // get the booking record involved
        $dbo->setQuery(
            $dbo->getQuery(true)
                ->select('*')
                ->from($dbo->qn('#__vikbooking_orders'))
                ->where($dbo->qn('ts') . ' = ' . $ts)
                ->where($dbo->qn('status') . ' = ' . $dbo->q('confirmed'))
                ->andWhere([
                    $dbo->qn('sid') . ' = ' . $dbo->q($sid),
                    $dbo->qn('idorderota') . ' = ' . $dbo->q($sid),
                ])
        );

        $booking = $dbo->loadObject();

        if (!$booking) {
            VBOHttpDocument::getInstance($app)->close(404, 'Booking not found');
        }

        // get the customer record involved
        $customer = VikBooking::getCPinInstance()->getCustomerFromBooking($booking->id);

        if (!$customer) {
            VBOHttpDocument::getInstance($app)->close(404, 'Customer not found');
        }

        // get signature image data
        $signature_data = '';
        $img_type = '';
        if (preg_match("/^data:image\/(png|jpe?g|svg);base64,([A-Za-z0-9\/=+]+)$/", $signature, $safe_match)) {
            $signature_data = base64_decode($safe_match[2]);
            $img_type = $safe_match[1];
        }

        if (empty($signature_data)) {
            VBOHttpDocument::getInstance($app)->close(500, 'Unexpected signature image data format');
        }

        // store image data
        $sign_fname = implode('_', [$booking->id, $sid, $customer['id']]) . '.' . $img_type;
        $file_path = implode(DIRECTORY_SEPARATOR, [VBO_ADMIN_PATH, 'resources', 'idscans', $sign_fname]);
        $file_uri = VBO_ADMIN_URI . 'resources/idscans/' . $sign_fname;
        if (!JFile::write($file_path, $signature_data)) {
            VBOHttpDocument::getInstance($app)->close(500, 'Could not store the signature image data');
        }

        // update the customer signature on the db
        $dbo->setQuery(
            $dbo->getQuery(true)
                ->update($dbo->qn('#__vikbooking_customers_orders'))
                ->set($dbo->qn('signature') . ' = ' . $dbo->q($sign_fname))
                ->where($dbo->qn('idorder') . ' = ' . (int) $booking->id)
        );
        $dbo->execute();

        // resize image for screens with high resolution (retina)
        if ($pad_ratio > 1 && $pad_width) {
            $new_width = floor(($pad_width / 2));
            (new VikResizer)->proportionalImage($file_path, $file_path, $new_width, $new_width);
        }

        if (VBOPlatformDetection::isWordPress()) {
            // trigger file mirroring
            VikBookingLoader::import('update.manager');
            VikBookingUpdateManager::triggerUploadBackup($file_path);
        }

        // send response to output
        VBOHttpDocument::getInstance($app)->json([
            'signatureFileUri'  => $file_uri,
            'signatureFileName' => $sign_fname,
        ]);
    }

    /**
     * AJAX endpoint for validating fields during pre-checkin before submission.
     * 
     * @since   1.17.7 (J) - 1.7.7 (WP)
     */
    public function validatePrecheckinFields()
    {
        $app = JFactory::getApplication();
        $dbo = JFactory::getDbo();

        if (!JSession::checkToken()) {
            // missing CSRF-proof token
            VBOHttpDocument::getInstance($app)->close(403, JText::translate('JINVALID_TOKEN'));
        }

        // gather request values
        $sid = $app->input->getAlnum('sid', '');
        $ts = $app->input->getUInt('ts', 0);
        $guests = $app->input->get('guests', [], 'array');

        // get the booking record involved
        $dbo->setQuery(
            $dbo->getQuery(true)
                ->select('*')
                ->from($dbo->qn('#__vikbooking_orders'))
                ->where($dbo->qn('ts') . ' = ' . $ts)
                ->where($dbo->qn('status') . ' = ' . $dbo->q('confirmed'))
                ->andWhere([
                    $dbo->qn('sid') . ' = ' . $dbo->q($sid),
                    $dbo->qn('idorderota') . ' = ' . $dbo->q($sid),
                ])
        );

        $booking = $dbo->loadObject();

        if (!$booking) {
            VBOHttpDocument::getInstance($app)->close(404, 'Booking not found');
        }

        // get booking rooms data
        $booking_rooms = VikBooking::loadOrdersRoomsData($booking->id);

        // get the customer record involved
        $customer = VikBooking::getCPinInstance()->getCustomerFromBooking($booking->id);

        if (!$customer) {
            VBOHttpDocument::getInstance($app)->close(404, 'Customer not found');
        }

        // validate guests registration fields
        if (!$guests) {
            VBOHttpDocument::getInstance($app)->close(500, 'Missing guest fields for validation.');
        }

        // access pax fields registration object
        $pax_fields_obj = VBOCheckinPax::getInstance();

        try {
            // let the driver perform the fields validation
            $pax_fields_obj->validateRegistrationFields((array) $booking, $booking_rooms, $guests);
        } catch (Exception $e) {
            // raise an error
            VBOHttpDocument::getInstance($app)->close($e->getCode() ?: 500, $e->getMessage());
        }

        // send successful response to output
        VBOHttpDocument::getInstance($app)->json(['success' => 1]);
    }
}
