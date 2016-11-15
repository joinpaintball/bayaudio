<?php
/*
Plugin Name: Contact Form With Shortcode
Plugin URI: http://aviplugins.com/
Description: This is a contact form plugin. You can use widgets and shortcodes to display contact form in your theme. Unlimited number of dynamic fields can me created for contact froms.
Version: 3.2.1
Text Domain: contact-form-with-shortcode
Domain Path: /languages
Author: avimegladon
Author URI: http://avifoujdar.wordpress.com/
*/

/**
	  |||||   
	<(`0_0`)> 	
	()(afo)()
	  ()-()
**/

include_once dirname( __FILE__ ) . '/settings.php';
include_once dirname( __FILE__ ) . '/fields_class.php';
include_once dirname( __FILE__ ) . '/contact_class.php';
include_once dirname( __FILE__ ) . '/contact_afo_widget.php';
include_once dirname( __FILE__ ) . '/contact_afo_widget_shortcode.php';
include_once dirname( __FILE__ ) . '/contact_mail_class.php';
include_once dirname( __FILE__ ) . '/contact_mail_smtp_class.php';
include_once dirname( __FILE__ ) . '/paginate_class.php';

include_once dirname( __FILE__ ) . '/subscribe_afo_widget.php';
include_once dirname( __FILE__ ) . '/subscribe_class.php';
include_once dirname( __FILE__ ) . '/subscribers_list_class.php';
include_once dirname( __FILE__ ) . '/newsletter_class.php';
include_once dirname( __FILE__ ) . '/newsletter_template_functions.php';
include_once dirname( __FILE__ ) . '/wp_register_profile_action.php';
include_once dirname( __FILE__ ) . '/unsubscribe_newsletter.php';

$sup_attachment_files_array = array( 
'image/jpeg',  
'image/png', 
'image/gif', 
'application/msword', 
'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
'application/pdf', 
);

class ContactFormSC {

	static function cfws_install() {
	 global $wpdb;
	 $create_table = "CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."contact_subscribers` (
	  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
	  `form_id` int(11) NOT NULL,
	  `sub_name` varchar(255) NOT NULL,
	  `sub_email` varchar(255) NOT NULL,
	  `sub_ip` varchar(50) NOT NULL,
	  `sub_added` datetime NOT NULL,
	  `sub_status` enum('Active','Inactive','Deleted') NOT NULL,
	  PRIMARY KEY (`sub_id`)
	)";
	$wpdb->query($create_table);
	}
	
	static function cfws_uninstall() {}
}
register_activation_hook( __FILE__, array( 'ContactFormSC', 'cfws_install' ) );