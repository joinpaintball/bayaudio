<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

get_header(); ?>

	<!-- Wrapper start -->
	<div class="main page_main">

		
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
				
					<?php

					/* Header description */

					$shop_isle_shop_id = get_the_ID();

					if( !empty($shop_isle_shop_id) ):

						$shop_isle_page_description = get_post_meta($shop_isle_shop_id, 'shop_isle_page_description');

						if( !empty($shop_isle_page_description[0]) ):
							echo '<div class="module-subtitle font-serif mb-0">'.$shop_isle_page_description[0].'</div>';
						endif;

					endif;
					?>

				</div>
			</div>
			<?php 
				if(( function_exists('is_cart') && is_cart() ) || ( function_exists('is_checkout') && is_checkout() ) || ( function_exists('is_wc_endpoint_url') && is_wc_endpoint_url( 'lost-password' ) ) || ( function_exists('is_account_page') && is_account_page() )):
					echo '<hr class="divider-w pt-20"><!-- divider -->';
				endif; 
			?>
		</div><!-- .container -->
		
		<?php	
			echo '</section>';
		?>	
	

		<!-- Pricing start -->
		<?php 
			if(( function_exists('is_cart') && is_cart() ) || ( function_exists('is_checkout') && is_checkout() ) || ( function_exists('is_wc_endpoint_url') && is_wc_endpoint_url( 'lost-password' ) ) || ( function_exists('is_account_page') && is_account_page() )):
				echo '<section class="page-module-content module module-cart-bottom">';
			else:
				echo '<section class="page-module-content module">';
			endif; 
		?>
			<div class="container">
			
				<div class="row">	
							<?php

							do_action( 'shop_isle_content_top' ); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php
								do_action( 'shop_isle_page_before' );
								?>

								<?php get_template_part( 'content', 'page' ); ?>

								<?php

								do_action( 'shop_isle_page_after' );
								?>

							<?php endwhile; ?>
				</div>
				
			</div>
		<?php
			echo '</section>';
		?>	
		<!-- Pricing end -->


<?php get_footer(); ?>