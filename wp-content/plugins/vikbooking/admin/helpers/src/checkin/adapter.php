<?php
/** 
 * @package     VikBooking
 * @subpackage  core
 * @author      Alessio Gaggii - E4J s.r.l.
 * @copyright   Copyright (C) 2022 E4J s.r.l. All Rights Reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @link        https://vikwp.com
 */

// No direct access
defined('ABSPATH') or die('No script kiddies please!');

/**
 * Defines an abstract adapter to extend the pax data collection.
 * 
 * @since 	1.15.0 (J) - 1.5.0 (WP)
 */
abstract class VBOCheckinAdapter implements VBOCheckinPaxfields
{
	/**
	 * The ID of the pax data collector class.
	 * 
	 * @var 	string
	 */
	protected $collector_id = '';

	/**
	 * Tells whether children should be registered.
	 * Children registration is disabled by default.
	 * 
	 * @param 	bool 	$precheckin 	true if requested for front-end pre check-in.
	 * 
	 * @return 	bool    true to also register the children.
	 * 
	 * @since 	1.16.3 (J) - 1.6.3 (WP) added $precheckin argument.
	 */
	public function registerChildren($precheckin = false)
	{
		// disabled by default, unless method gets overridden
		return false;
	}

	/**
	 * Returns the instance of the given pax field key.
	 * 
	 * @param 	string 	$key 		the field key identifier.
	 * 
	 * @return 	VBOCheckinPaxfield 	the requested pax field object.
	 */
	public function getField($key)
	{
		// get all the existing field attributes
		$attributes = $this->getAttributes();

		// create a new instance of the field registry object
		$pax_field = new VBOCheckinPaxfield();

		// inject key and type of field
		$field_type = (isset($attributes[$key]) ? $attributes[$key] : 'text');
		$pax_field->setKey($key);
		$pax_field->setType($field_type);

		// return the field registry object
		return $pax_field;
	}

	/**
	 * Renders a specific pax field type.
	 * 
	 * @param 	VBOCheckinPaxfield 	$field 	the pax field object to render.
	 * 
	 * @return 	string  			the HTML string to display the field.
	 */
	public function render(VBOCheckinPaxfield $field)
	{
		// get the field implementor
		$implementor = $this->getFieldTypeImplementor($field);

		if ($implementor === null) {
			// could not access the implementor
			return '';
		}

		// let the handler render the field
		return $implementor->render();
	}

	/**
	 * Attempts to return an instance of the field-type implementor object being parsed.
	 * 
	 * @param 	VBOCheckinPaxfield 	$field 	the pax field object to render.
	 * 
	 * @return 	null|object 		the field implementor class of VBOCheckinPaxfieldType or null.
	 */
	public function getFieldTypeImplementor(VBOCheckinPaxfield $field)
	{
		// get the type of field to render
		$field_type = $field->getType();

		if ($field_type === null) {
			return null;
		}

		if (is_array($field_type)) {
			// convert field type to "select" string
			$field_type = 'select';
		}

		if (!is_string($field_type)) {
			// invalid field type
			return null;
		}

		// compose dinamically the implementor class name
		$field_class = $this->getFieldTypeClass($field_type);

		if (!class_exists($field_class)) {
			// no implementor handler found for this type of field
			return null;
		}

		// return the field handler by passing the pax field object and the data collector id
		return new $field_class($field, $this->collector_id);
	}

	/**
	 * Builds the list of back-end pax fields for the extended collection type.
	 * 
	 * @return 	array 	the list of pax fields to collect in the back-end.
	 */
	public function listFields()
	{
		return [$this->getLabels(), $this->getAttributes()];
	}

	/**
	 * Builds the list of front-end (pre-checkin) pax fields for the extended collection type.
	 * Check-in pax fields data collector implementations may override this method, if needed.
	 * 
	 * @param 	array 	$def_fields 	list of default pre-checkin field labels and attributes.
	 * 
	 * @return 	array 	the list of pax fields to collect in the front-end during pre-checkin.
	 * 
	 * @since 	1.17.2 (J) - 1.7.2 (WP)
	 */
	public function listPrecheckinFields(array $def_fields)
	{
		// return no labels, nor attributes by default
		return [
			[],
			[],
		];
	}

	/**
	 * Invokes a callback for the extended collection type after the pre-checkin
	 * information have been stored or updated to perform certain actions.
	 * 
	 * @param 	array 	$data 		the guest registration data stored.
	 * @param 	array 	$booking 	the booking record involved with the guests registration.
	 * @param 	array 	$customer 	optional customer record associated with the booking.
	 * 
	 * @return 	void
	 * 
	 * @since 	1.17.5 (J) - 1.7.5 (WP)
	 */
	public function onPrecheckinDataStored(array $data, array $booking, array $customer)
	{
		// no actions to be performed by default
		return;
	}

	/**
	 * Performs a validation over the guest registration fields data for a given reservation.
	 * Custom drivers can override this method to implement their own validation method.
	 * 
	 * @param 	array 	$booking 		The booking record involved with the guests registration.
	 * @param 	array 	$booking_rooms 	The booking room records involved with the guests registration.
	 * @param 	array 	$data 			The guests registration data to validate.
	 * @param 	bool 	$precheckin 	True if validating pre-checkin fields.
	 * 
	 * @return 	void
	 * 
	 * @throws 	Exception
	 * 
	 * @since 	1.17.7 (J) - 1.7.7 (WP)
	 */
	public function validateRegistrationFields(array $booking, array $booking_rooms, array $data, bool $precheckin = true)
	{
		// no guest fields data validation performed by default
		return;
	}

	/**
	 * Composes the field type class name given its type-string.
	 * 
	 * @param 	string 	$field_type 	the field type-string identifier.
	 * 
	 * @return 	bool|string 	the class name to use for the field, or false.
	 */
	protected function getFieldTypeClass($field_type)
	{
		if (!is_string($field_type) || empty($field_type)) {
			return false;
		}

		// base class name
		$base_paxf_class = 'VBOCheckinPaxfieldType';

		// compose field type class name
		$field_type = ucwords(str_replace(array('_', '-'), ' ', $field_type));
		$field_type = preg_replace("/[^a-zA-Z0-9]/", '', $field_type);

		return $base_paxf_class . $field_type;
	}

	/**
	 * Returns the name of the current pax data driver.
	 * 
	 * @return 	string 	the name of the driver.
	 */
	abstract public function getName();

	/**
	 * Builds the list pax fields labels.
	 * 
	 * @return 	array 	the list of pax fields labels.
	 */
	abstract public function getLabels();

	/**
	 * Builds the list pax fields attributes.
	 * 
	 * @return 	array 	the list of pax fields attributes.
	 */
	abstract public function getAttributes();
}
