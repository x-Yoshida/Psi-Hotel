# Changelog

## 1.7.8

*Release date - 12 March 2025*

- Fixed empty new line at the beginning of the file /wp-content/plugins/vikbooking/libraries/language/site.php.

## 1.7.7

*Release date - 11 March 2025*

- Various admin widgets improvements.
- Responsiveness improvements on admin section.
- Dates range picker improvements.
- Damage deposit separate payment improvements.
- PMS Reports framework updates with new profile settings support.
- Various improvements to the PMS Reports framework.
- Pre-checkin guests data collection drivers can validate the information before submission.
- Introducing PMS report for Catalonia (Spain) Mossos d'Esquadra.
- Cron jobs email and pre-checkin reminder new listings filter.
- Orphan dates collection and opening now available for the AI Assistant widget.

## 1.7.6

*Release date - 19 February 2025*

- Admin-widgets rendered in modal windows can be minimized or enlarged.
- Introducing the admin-dock bar for the minimized admin-widgets.
- New inbox-style layout for the admin-widget "Guest Messages" with infinite scroll loading.
- Options of type damage deposit allow to configure a payment window and payment method.
- Various improvements to the rates overview page and pricing update features.
- Various improvements to the operator tools framework.
- Introducing the new operator tool "Guest Messaging" (E4jConnect CM required).
- Various improvements to the listing-style layout of the front-end page "Room Details".
- Visual editor improvements for Cron Jobs to preview the message for a specific booking ID.

## 1.7.5

*Release date - 29 January 2025*

- JavaScript improvements with new dates-range picker calendars.
- Styling and responsiveness improvements with new dates-range picker calendars.
- Introduced listings automatic mini-thumbnail for drop down menus.
- Storing the pre-checkin guests registration data will invoke the pax driver callback.

## 1.7.4

*Release date - 22 January 2025*

- JavaScript bug fixing with new dates-range picker calendars.
- Introduced new guest registration field type signature.

## 1.7.3

*Release date - 21 January 2025*

- New dates-range picker calendars.
- New listing layout parameter for room-details shortcode.
- Gen AI functions for listing contents (E4jConnect CM required).
- Gen AI Assistant in Visual Editor (E4jConnect CM required).
- Various Visual Editor improvements.
- Maintenance controller for performance optimization (large datasets).
- Multiple security improvements.

## 1.7.2

*Release date - 18 December 2024*

- Custom OTA pricing overrides in Rates Overview.
- New default PMS Reports.
- New options/extras of type late check-out/early check-in.
- Various AI framework improvements.
- New front-end search settings to display unavailable rooms.

## 1.7.1

*Release date - 12 November 2024*

- New OTA listing onboarding functions (Airbnb and Booking.com).
- Refactoring of PMS Reports framework.
- AI framework improvements required by Vik Channel Manager and E4jConnect.
- Minor back-end design improvements.
- Minor fixes.

## 1.7.0

*Release date - 23 September 2024*

- Major framework release.
- AI framework powered by ChatGPT (Channel Manager and E4jConnect subscription required).
- New admin-widget "AI Assistant" (Channel Manager and E4jConnect subscription required).
- New admin-widget "Guest Reviews" (Channel Manager and E4jConnect subscription required).
- Added support to Airbnb reactions in "Guest Messages" admin-widget.
- Derived rate plans with automatic rates and restrictions update from parent rate plans.
- Tiny URLs generated automatically to improve the OTA messaging capabilities.
- Room rates and restrictions management in admin-widget "Bookings Calendar".
- Improved Notifications Center functionalities and CTA buttons.
- Schedule automatic payment collections.
- Register, update and delete offline payments.
- New financial statistics.
- New back-end styles.
- Several framework improvements.

## 1.6.9

*Release date - 11 June 2024*

- New operator-tool permissions framework.
- New finance operators tool.
- Refactoring of the operators dashboard and tools.
- Fixed month-day rows in Availability Overview.
- New layout for CC/VCC details for OTA reservations.
- New "Takings" tab for the payment events of a reservation.
- Improved "Guest Messages" admin-widget.
- Improved OTA guest messaging functions through Cron Jobs.

## 1.6.8

*Release date - 2 April 2024*

- Introducing the Notifications Center.
- Admin-widget framework refactoring.
- Improved ACL controls.

## 1.6.7

*Release date - 7 February 2024*

- Added support to new Gutenberg blocks for the widgets.
- All widgets have been converted into native Gutenberg blocks.
- Introduced live preview for the Shortcode block.
- New admin widget "Bulk Messaging".
- Added support to pin/recent widgets in Quick Actions menus.
- Refactoring of the e-invoicing framework to support new local requirements.
- Various framework improvements.

## 1.6.6

*Release date - 13 December 2023*

- Added support for the E4jConnect Trial activation system.
- Added search facility to translations.
- New actions and filters introduced.

## 1.6.5

*Release date - 13 November 2023*

- New Booking Details admin-widget.
- Admin widgets framework refactoring.
- Introducing Push notifications through ServiceWorker.
- Improved Desktop (Web) notifications.
- Added support for WebApp through apposite manifest for MacOS.
- Added support for new Channel Manager capabilities with the Booking.com Content APIs.
- Cron Jobs attempting to notify Airbnb reservations now rely on the Guest Messaging APIs.
- Added the "important" flag to reminders for specific reservations.
- New overrides manager interface and breaking changes detection framework.
- Minor framework improvements.

## 1.6.4

*Release date - 27 July 2023*

- New Virtual Terminal admin-widget.
- Added support for direct-charge transactions.
- Seasonal rates refactoring for promotions.
- Improvements to increase the price the accuracy score with Google Hotel.
- Hooks refactoring for admin widgets.
- Minor framework improvements.

## 1.6.3

*Release date - 21 June 2023*

- Split stays framework improvements.
- Automatic reminders for Channel Manager notifications.
- Added support for the new Vrbo API channel connection.
- Maximum advance booking notice at room-level.
- Implemented several new hooks to facilitate customization.
- Improved extendibility of check-in and pre-checkin registration fields.
- CTD restrictions applied on check-out date rather than on check-in date.
- CSS styling inspector improvements with quick preview and tag selector.
- Several improvements for the PMS Reports framework.
- Broadcast channel for desktop push notifications across multiple tabs.
- Backup framework improvements for large datasets.
- Cron Jobs framework improvements to avoid timezone conflicts.
- New hooks implemented for the Statistics Tracking object.
- New front-end pricing calendar calculation based on rate plan IDs.
- Several generic improvements related to UI and framework.

## 1.6.2

*Release date - 4 May 2023*

- Added support for pet fees through options with selectable quantity.
- New planning system with Availability Overview.
- Drag & Drop functionalities for single-unit rooms as well as for hotel-inventory rooms.
- Swap room sub-units in case of low or full occupancy.
- New PMS Report for Takings.
- Several improvements and fixes (CSRF).

## 1.6.1

*Release date - 18 April 2023*

- Enhanced caching functions for databases with large datasets.
- Improved performances.
- Several improvements to the admin-widgets and Multitask panel.
- Added support for pets for each room reservation record.
- Added support for included meal plans in the various rate plans.
- New framework for the PMS Reports supporting CSV, Excel and Print formats.
- Improved various PMS Reports (Pro version).
- New Cron Job (Pro version) to automatically export reports dynamically.
- Default integration for PayPal Express Checkout (Pro version).
- Compatibility with the new Vrbo API channel connection (Pro version + E4jConnect & Vik Channel Manager).

## 1.6.0

*Release date - 14 February 2023*

- Major release of the framework.
- New admin-widgets: Finance and Guest Messaging.
- Improved several admin-widgets.
- Quick reservation added to Bookings Calendar admin-widget.
- Multitask panel improvements to render the admin-widgets within modal windows.
- Support for simultaneous chat threads with Booking.com, Airbnb and Website.
- New Availability Overview layout and functionalities.
- New adaptive back-end menu with custom and pinnable quick actions.
- New browser notifications system.
- Split Stays.
- Early departures or late arrivals for multiple room bookings.
- Room Upgrade functionalities.
- Enhanced Cron Jobs framework.
- Enhanced coupons functionalities to apply tailored and automatic discounts to certain customers.
- Added plenty of new hooks/events to extend the default framework functionalities.
- Back-end registration detection of returning customer.
- VAT breakdown for each line item in the invoice template.
- Payment methods can be assigned to certain listings only.
- PMS Reports improvements.
- States/Provinces management functions for each country.
- New custom field of type "State".
- Improved communication with Vik Channel Manager.
- Added support for the new Expedia Product API within Vik Channel Manager.
- Several enhancements for the front-end pages.
- Several minor fixes and improvements.
- Added CSRF tokens to admin AJAX requests to improve the security.

## 1.5.12

*Release date - 10 January 2023*

- Fixed attributes escaping to prevent XSS attacks with administrator privileges.

## 1.5.11

*Release date - 26 July 2022*

- Conditional text rules improvements.
- Support for multiple hotel rooms categories (Google Hotel).
- Minor CSS adjustments for a better responsiveness.

## 1.5.10

*Release date - 10 June 2022*

- Added support for WP-Cron scheduled tasks with a new and extendable Cron Jobs framework.
- Added support for Booking.com Guest Messaging API.
- Zoom feature for Airbnb profile picture of guest reservations.
- Improved custom email sending functions through the Visual Editor.
- Improved performances for databases with a large amount of reservations (2+ GBs).

## 1.5.9

*Release date - 29 April 2022*

- Implemented extra anti-XSS checks for the admin pages.

## 1.5.7 + 1.5.8

*Release date - 20 April 2022*

- Implemented extra CSRF checks for the admin pages.

## 1.5.6

*Release date - 19 April 2022*

- Fixed issue with invalid email attachments passed to the framework.

## 1.5.5

*Release date - 13 April 2022*

- Added support for customer profile picture (avatar).
- Prevented switch of non refundable rates during booking modification.
- Minor improvements.

## 1.5.4

*Release date - 17 March 2022*

- Sanitized malicious data injections.

## 1.5.3

*Release date - 16 March 2022*

- Minor improvements for the customer email.

## 1.5.2

*Release date - 11 March 2022*

- Minor fixes.

## 1.5.1

*Release date - 1 March 2022*

- Fixed compatibility issues with Windows servers.

## 1.5.0

*Release date - 28 February 2022*

- Major core framework release.
- Dark mode appearance for dark color scheme preferences.
- Multitask panel to quickly query the system without changing pages.
- Browser (web push) notifications with real-time alerts.
- New admin widgets and framework.
- Reminders with scheduled due dates.
- Rates flow monitoring for OTA and Website rates.
- Custom data collection for guests registration.
- myDATA AADE integration for electronic invoicing in Greece.
- Inquiry reservations with pending status and auto room-assignment.
- Backups: import and export an entire configuration from one site to another.
- Visual (rich text) editor and composer for any email message.
- New statistics tracking features.
- Coupon codes with minimum stay filter.
- New conditional text rules.
- New permissions for front-end Tableaux and operators.
- Support (and certification) for Google Hotel Free Booking Links!! (Vik Channel Manager + E4jConnect subscription required)

## 1.4.6

*Release date - 2 November 2021*

- Minor fix for editors.

## 1.4.5

*Release date - 29 October 2021*

- Core framework minor fixes.

## 1.4.4

*Release date - 27 October 2021*

- Core framework update.

## 1.4.3

*Release date - 6 October 2021*

- Minor update to prevent SSL issues with expired certificate chains.

## 1.4.2

*Release date - 15 June 2021*

- Language files loading moved to a different hook for a better compatibility with third party plugins.
- Implemented use of alias methods to facilitate the translation of the plugin on its official WordPress page.

## 1.4.1

*Release date - 10 June 2021*

- Internal libraries updated to support a new type of nonces against CSRF attacks.
- Minor fixes and improvements in some back-end pages.

## 1.4.0

*Release date - 17 May 2021*

- New major release of the core framework.
- Custom admin widgets for a completely new Dashboard.
- Geocoding functionalities.
- Interactive Google Maps with overlay and custom markers.
- Conditional text rules to control email messages and more.
- Templates styling through graphical interface.
- New front-end design with responsive and lazy image gallery.
- Added support for refund transactions.
- Hundreds of minor improvements.
- Tens of new features for those who also use Vik Channel Manager.

## 1.3.11

*Release date - 30 December 2020*

- Custom ordering of preferred countries for phone numbers.
- Sample Data available for new installations.

## 1.3.10

*Release date - 23 December 2020*

- RSS Feeds Opt-in minor fix with 1.3.10.
- Support for installation of Sample Data.

## 1.3.8

*Release date - 17 August 2020*

- Compatibility fixes with WP 5.5 and the new PHPMailer.

## 1.3.7

*Release date - 12 August 2020*

- Minor compatibility fixes with WP 5.5.

## 1.3.6

*Release date - 8 July 2020*

- Automatic creation of new pages with Shortcodes.
- Improvements to search suggestions and alternative booking solutions.
- Global restrictions overrides with priority to newer rules.

## 1.3.5

*Release date - 1 July 2020*

- Major release of new framework.
- Import reservations tool from third party plugins.
- Improvements to tableaux.
- Room-day notes defined at room-level as well as sub-unit-level.
- Festivities and custom fests management.
- New PMS Reports added.
- New filtering and pricing for options and extra-services.
- Pre-set for characteristics font-icons.
- Added possibility of sorting the characteristics.
- New calculation type for Promotions.
- Dynamic rooms daily price.

## 1.3.2

*Release date - 9 May 2020*

- Framework adapted to rates comparison widget.
- Language files updated.

## 1.3.1

*Release date - 25 March 2020*

- Added occupancy forecast missing file.

## 1.3.0

*Release date - 23 March 2020*

- Major release of a brand new framework.
- Guest Reviews: those who are also using Vik Channel Manager will be able to start receiving reviews from the guests for their stays
- Occupancy Forecast: a new widget has been placed in the Dashboard as well as in the page Rates Overview to monitor the future occupancy
- Reports Graphs and Sheets: certain reports, such as the occupancy ranking, will render the data also on line charts
- Shared Calendars: it is now possible to link the availability calendars between multiple rooms
- Upsell Extra Services: guests will be able to upgrade their bookings (website and OTAs/Channels) by ordering some extra services through your site at any time
- OTA Booking details: any reservation downloaded by the Channel Manager will be also visible by your guests on your website
- Back-end reservations with front-end rate plans: the page Calendar will now display the front-end rate plans for selection
- Rates Calculator Book Now button: the useful tool of the Rates Overview will now let you use a Book Now button to quickly book a room-rate plan combination
- Custom Documents for Customers: it is now possible to upload custom files for any customers to keep track of them
- New compact layout for multiple rooms bookings: booking multiple rooms, like a group of rooms, is much faster now
- Booking History: added several new events to keep track of any modification made for a booking
- Vik Channel Manager: automatic triggering of reports, reviews download and opportunities with a new promotion sync system
- OTA Reviews Module: you will now be able to display your website reviews as well as the Global Score of your property(s)
- FontAwesome updated: the FontAwesome library was updated to their latest version
- New back-end filtering options: added several new filters in the back-end Views
- Pre-checkin for OTA bookings: guests can now self check-in even if they booked through an external channel

## 1.2.13

*Release date - 23 December 2019*

- Implemented deactivation feedback.
- Fixed an issue that prevented to use multiple instances of the same widget on one page.

## 1.2.12

*Release date - 20 December 2019*

- Change-log download during update.

## 1.2.11

*Release date - 18 December 2019*

- Added parameter to force category ID in shortcode Search Form.

## 1.2.10

*Release date - 21 November 2019*

- Fixed minor issue with widgets timezone

## 1.2.9

*Release date - 14 November 2019*

- Fixed minor issue with routing functions when parsing URLs with array values.

## 1.2.8

*Release date - 18 September 2019*

- Added new warning messages.

## 1.2.7

*Release date - 16 September 2019*

- Fixed minor issues related to the Shortcodes handling functions.

## 1.2.6

*Release date - 2 August 2019*

- Minor CSS fixes.
- Various improvements to the framework libraries.

## 1.2.5

*Release date - 26 June 2019*

- Dashboard Ajax navigation between donut charts.
- Screen Options for pagination limit.
- Various improvements to the framework libraries.


## 1.2.4

*Release date - 21 June 2019*

- Minor fix for timezone issue.


## 1.2.3

*Release date - 10 June 2019*

- Libraries improvements.
- Fixed compatibility issues with Site Health checks.


## 1.2.2

*Release date - 29 May 2019*

- Minor fixes for default section language.
- Fixed issue with certain editor IDs.


## 1.2.1

*Release date - 28 May 2019*

- Minor fix for new MVC structure.


## 1.2.0

*Release date - 23 May 2019*

- Major release of the new core framework.
- New front-end gallery.
- Custom festivities.
- Tens of improvements.


## 1.1.7

*Release date - 17 April 2019*

- Fixed minor core issues.


## 1.1.6

*Release date - 14 February 2019*

- Fixed an issue that could cause multiple email messages to be sent repeatedly.


## 1.1.5

*Release date - 5 February 2019*

- Added filters to Shortcodes page.
- Enhanced router for multilingual pages.


## 1.1.4

*Release date - 4 February 2019*

- Shortcodes now support language tags.
- Adjusted some routing rules.


## 1.1.3

*Release date - 22 January 2019*

- Fixed a possible issue with the Shortcodes on Windows OS.
- Added support to resolve Timezone conflicts.


## 1.1.2

*Release date - 8 January 2019*

- Main language auto-detect.
- Minor fixes for the Widgets framework.


## 1.1.1

*Release date - 31 December 2018*

- Rates Overview can show multiple Pricing Calendar for several rooms.
- Generation of custom invoices for different services.


## 1.1.0

*Release date - 20 December 2018*

- Major release of the new core framework.


## 1.0.18

*Release date - 26 November 2018*

- Room details shortcodes can be used for generic routing.
- Datepicker improvements.


## 1.0.17

*Release date - 16 November 2018*

- Added support for the new Gutenberg editor and WordPress 5.0.
- Improved Shortcodes stability while updating a post.


## 1.0.16

*Release date - 9 November 2018*

- Improved Shortcodes generation for params with multiple values.


## 1.0.15

*Release date - 31 October 2018*

- Fixed minor issue for parameters with multiple values in Shortcodes.


## 1.0.14

*Release date - 29 October 2018*

- Added support for several new currencies in the converter.
- New type of Shortcode called "Booking" to rewrite the URLs of the booking details pages.
- Various improvements to routing functions and framework


## 1.0.13

*Release date - 26 September 2018*

- Added support for all Timezones.
- Improved responsiveness for date picker calendars.
- Minor core and application fixes.


## 1.0.12

*Release date - 7 September 2018*

- Minor core and application fixes for front-end and back-end.


## 1.0.11

*Release date - 16 July 2018*

- Shortcodes models can now be accessed also via front-end.


## 1.0.10

*Release date - 18 June 2018*

- Improved hooks for Shortcodes usage in posts during drafts saving.


## 1.0.9

*Release date - 4 June 2018*

- Minor backward compatibility fixes for PHP <= 5.4.


## 1.0.8

*Release date - 16 may 2018*

- Shortcodes processing for third party plugins in descriptions.
- Overrides functions for layout files of pages and widgets.


## 1.0.7

*Release date - 14 may 2018*

- Automatic mirroring backup of uploaded or generated files (photos, invoices, docs).


## 1.0.6

*Release date - 8 May 2018*

- Added support for Multisite network.


## 1.0.5

*Release date - 27 April 2018*

- Payment framework extendable with dedicated plugins.


## 1.0.4

*Release date - 24 April 2018*

- Automated backup and restore functions for uploaded files (photos, images, logos).
- Improvements for upgrading to the Pro version.


## 1.0.3

*Release date - 23 April 2018*

- Minor core fixes.


## 1.0.2

*Release date - 20 April 2018*

- Unified language files for Widgets, Front-end and Back-end for easier translation.


## 1.0.1

*Release date - 17 April 2018*

- Template files and custom CSS files are no longer overridden during updates.
- SEO optimizations for custom page titles and metas in front-end.


## 1.0

*Release date - 10 April 2018*

- First stable release of the Vik Booking Framework for WordPress.
