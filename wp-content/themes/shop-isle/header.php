<?php
/**
 * The header for our theme.
 *
 * @package shop-isle
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php shop_isle_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600,600i&subset=latin-ext" rel="stylesheet">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script type="text/javascript"> 
function go(){ 
if (document.boogie.pickem.options[document.boogie.pickem.selectedIndex].value != "none") { 
location = document.boogie.pickem.options[document.boogie.pickem.selectedIndex].value 
		} 
	} 
</script> 

<style>
	.lngSwch{display:none !important;}
	.nav.navbar-nav{padding-right: 20px}

	.shop_isle_bannerss_section > .col-xs-6.col-sm-3.imagebox:first-child > div{display:none;}
</style>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'shop_isle_before_header' ); ?>

	<!-- Preloader -->
	<?php
	
	global $wp_customize;
	
	/* Preloader */
	if(is_front_page() && !isset( $wp_customize ) && get_option( 'show_on_front' ) != 'page'  ): 	
	
		$shop_isle_disable_preloader = get_theme_mod('shop_isle_disable_preloader');
		
		if( isset($shop_isle_disable_preloader) && ($shop_isle_disable_preloader != 1) ):
		
			echo '<div class="page-loader">';
				echo '<div class="loader">'.__('Loading...','shop-isle').'</div>';
			echo '</div>';
		
		endif;
		
	endif;
	if(is_page('de')){
		
		$shop_isle_disable_preloader = get_theme_mod('shop_isle_disable_preloader');
		
		if( isset($shop_isle_disable_preloader) && ($shop_isle_disable_preloader != 1) ):
		
			echo '<div class="page-loader">';
				echo '<div class="loader">'.__('Loading...','shop-isle').'</div>';
			echo '</div>';
		
		endif;
	}
	
	
	?>
	
	<?php do_action( 'shop_isle_header' ); ?>

	<?php do_action( 'shop_isle_after_header' ); ?>
