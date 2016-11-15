<?php
/*
Template Name: Blog template
*/
?>
<?php get_header(); ?>

		<!-- Wrapper start -->
	<div class="main page_main no_bg">

		 
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

				</div><!-- .col-sm-6 col-sm-offset-3 -->

			</div><!-- .row -->

		</div><!-- .container -->

	<?php
		echo '</section><!-- .module -->';
	?>
	<!-- Header section end -->

	<!-- Blog standar start -->
	<?php
		$shop_isle_posts_per_page = get_option('posts_per_page'); /* number of latest posts to show */

		if( !empty($shop_isle_posts_per_page) && ($shop_isle_posts_per_page > 0) ):
 
			if($_SESSION['lng'] == "de" )
				$shop_isle_query = new WP_Query( array('category_name' => 'Deutsche', 'post_type' => 'post', 'posts_per_page' => $shop_isle_posts_per_page,'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ) ) );
			else		
				$shop_isle_query = new WP_Query( array('category_name' => 'English', 'post_type' => 'post', 'posts_per_page' => $shop_isle_posts_per_page,'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ) ) );
			
			
			if ( have_posts() ) {

				?>
				<section class="module">
						<?php
							if($_SESSION['lng'] == "de"){
						?>
						
						<h2 class="module-title font-alt product-hide-title news_title"><u>NACHRICHTEN</u></h2>
						<?php
							}else{
						?>
						<h2 class="module-title font-alt product-hide-title news_title"><u>NEWS</u></h2>
						<?php }?>
							<!-- Content column start -->
							<div class="col-sm-12 posts_list posts_list2" id="shop-isle-blog-container">
								<?php
								$isOdd = true;
								while ( $shop_isle_query->have_posts() ) {
									$shop_isle_query->the_post();
									?>
									<div id="post-<?php the_ID(); ?>" <?php if($isOdd==true){post_class("post post_custom");}else{post_class("post post_custom is_odd");} ?> itemscope="" itemtype="http://schema.org/BlogPosting">
									<div class="post_unique">
										<?php
										if ( has_post_thumbnail() ) {
											echo '<div class="post-thumbnail">';
												echo '<a href="'.esc_url( get_permalink() ).'">';
													echo get_the_post_thumbnail($post->ID, 'shop_isle_blog_image_size');
												echo '</a>';
											echo '</div>';
										}
										
										?>

										<div class="post-header font-alt">
											<div class="post-meta posts_meta">
												<?php
												shop_isle_posted_on();
												?>
											</div>
											<?php $address = esc_url( get_permalink());?>
											<h2 class="post-title posts_title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
										</div>

										<div class="post-entry posts_entry">
											<?php
											$shop_isleismore = @strpos( $post->post_content, '<!--more-->');
												the_content();
											?>
										</div>
										<div class="post-more">
											<a href="<?php echo $address; ?>" class="more-link2"><?php _e('Continue reading','shop-isle'); ?></a>
										</div>
									</div>
									</div>
									<?php
									$isOdd = !$isOdd;
								}

								?>
								
							<?php
							if(count($shop_isle_query->posts)==3){?>
								<div class="bottom_stuff">
								<!-- Pagination start-->
								<div class="pagination font-alt pagination_custom">
								<?php wp_pagenavi( array( 'query' => $shop_isle_query ) ); ?>
								</div>
								<!-- Pagination end -->
								
								<a href="#totop">
									<div class="icon_bar_posts"></div>
								</a>
							</div>
							<?php }?>
							</div>
							<!-- Content column end -->

				</section>
				<?php if(count($shop_isle_query->posts)<3){?>
							<div class="bottom_stuff">
								<!-- Pagination start-->
								<div class="pagination font-alt pagination_custom">
								<?php wp_pagenavi( array( 'query' => $shop_isle_query ) ); ?>
								</div>
								<!-- Pagination end -->
								
								<a href="#totop">
									<div class="icon_bar_posts"></div>
								</a>
							</div>
							<?php }?>
				<!-- Blog standar end -->

				<?php
				/* Restore original Post Data */
				wp_reset_postdata();
			}

		endif;

		?>
		
<?php get_footer(); ?>