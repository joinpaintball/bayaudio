<?php
/**
 * Template functions used for the site header.
 *
 * @package shop-isle
 */
	session_start();

	if(!empty($_GET['lng'])){
		$_SESSION['lng'] = $_GET['lng'];
	}
							
if ( ! function_exists( 'shop_isle_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function shop_isle_primary_navigation() {

		global $wp_customize;

		?>
		<!-- Navigation start -->
		<nav id="nav_id" class="navbar navbar-custom navbar-transparent <?php if(!is_front_page() && !is_page("support") && !is_page("support_de")){echo "white_homepage";} ?> navbar-fixed-top" role="navigation">

			<div class="container">
				<div class="header-container">
					
						<div class="navbar-header">
							<?php
								$shop_isle_logo = get_theme_mod('shop_isle_logo');
								echo '<a href="'.esc_url( home_url( '/' ) ).'" class="logo-image"><div class="shop_isle_header_title"><div class="shop-isle-header-title-inner">';
								
								if( !empty($shop_isle_logo) ):
									echo '<a href="'.esc_url( home_url( '/' ) ).'" class="logo-image"><img src="'.esc_url( $shop_isle_logo ).'"></a>';
									if( isset( $wp_customize ) ):
										echo '<h1 class="site-title shop_isle_hidden_if_not_customizer""></h1>';
										echo '<h2 class="site-description shop_isle_hidden_if_not_customizer"></h2>';
									endif;
								else:
									if( isset( $wp_customize ) ):
									endif;							
									echo '<h1 class="site-title"></h1>';
									echo '<h2 class="site-description"></h2>';
								endif;
								echo '</div></div></a>';
							?>

							<div type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
								<span class="sr-only"><?php _e('Toggle navigation','shop-isle'); ?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</div>
							
						</div>
					</a>
					<div class="header-menu-wrap">
						<div class="collapse navbar-collapse" id="custom-collapse">
							
							<?php 
								if ($_SESSION['lng'] == "de")
									wp_nav_menu( array('theme_location' => 'de_primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right') ); 
								else
									wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right') );  
							
							?>
							
							<form id="searchForm" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
								<?php
								if ($_SESSION['lng'] == "de"){
								?>
									<input type="search" id='searchInp' class="search-field" placeholder="SearchDE" value="<?php echo get_search_query() ?>" name="s" title="Keresés">
									<input class='submit' type='submit' value='search'/>
								<?php
									}else{
								?>
									<input type="search" id='searchInp' class="search-field" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="Keresés">
									<input class='submit' type='submit' value='search'/>
								<?php
									}
								?>
							</form>
							<script>
								jQuery(function(){
									
									jQuery(".nav.navbar-nav.navbar-right").append(
										'<li  class="search_icon menu-item menu-item-type-custom menu-item-object-custom">'+
										'</li>'+
										'<li  class="menu-item menu-item-type-custom menu-item-object-custom lngSwch">'+
											'<a   href="<?php echo get_home_url(); ?>/?lng=en" style="display:inline-block;padding-right:5px;">en</a><span>/</span><a   style="display:inline-block;padding-left:5px;" href="<?php echo get_home_url(); ?>/?lng=de">de</a>'+
										'</li>'
									);
									
									jQuery(".search_icon").on("click",function(){
										jQuery("#searchInp").fadeToggle();
									});
									 
								});
							</script>
						</div>
					</div>

					<?php if( class_exists( 'WooCommerce' ) ): ?>
						<div class="navbar-cart">
							
							<div class="header-search">
								<div class="glyphicon glyphicon-search header-search-button"></div>
								<div class="header-search-input">
									<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
										<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'shop-isle' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'shop-isle' ); ?>" />
										<input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'shop-isle' ); ?>" />
										<input type="hidden" name="post_type" value="product" />
									</form>
								</div>
							</div>

							<?php if( function_exists( 'WC' ) ): ?>
								<div class="navbar-cart-inner">
									<a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart','shop-isle' ); ?>" class="cart-contents">
										<span class="icon-basket"></span>
										<span class="cart-item-number"><?php echo esc_html( trim( WC()->cart->get_cart_contents_count() ) ); ?></span>
									</a>
								</div>
							<?php endif; ?>

						</div>
					<?php endif; ?>
	
				</div>
			</div>

		</nav>
		<!-- Navigation end -->
		<?php
	}
}