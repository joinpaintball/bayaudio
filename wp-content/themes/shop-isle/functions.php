<?php
/**
 * Main file
 */

/**
 * Initialize all the things. 
 */
require get_template_directory() . '/inc/init.php';

/**
 * Note: Do not add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * http://codex.wordpress.org/Child_Themes
 */

 $editor = get_role('editor');
   // add $cap capability to this role object
   $editor->add_cap('edit_theme_options');


function shop_isle_themeisle_sdk(){
	require 'vendor/themeisle/load.php';
	themeisle_sdk_register (
		array(
			'product_slug'=>'shop-isle',
			'store_url'=>'http://themeisle.com',
			'store_name'=>'Themeisle',
			'product_type'=>'theme',
			'wordpress_available'=>false,
			'paid'=>false,
		)
	);
}

shop_isle_themeisle_sdk(); 

 
