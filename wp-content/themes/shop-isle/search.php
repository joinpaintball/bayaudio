<?php
/**
 * The template for displaying search results pages.
 *
 */

get_header(); ?>
	<?php
		$search = $_GET['s'];
		$allPosts = "
			SELECT *
			FROM $wpdb->posts
			WHERE  $wpdb->posts.post_status = 'publish' 
			AND ($wpdb->posts.post_type = 'post')
			AND $wpdb->posts.post_title like '%$search%'
			/*OR $wpdb->posts.post_content like '%$search%'*/
			ORDER BY $wpdb->posts.post_date DESC
		";
		$pageposts = $wpdb->get_results($allPosts, OBJECT);
	?>
	<!-- Wrapper start -->
	<div class="main page_main no_bg">
		<!-- Post single start -->
			 
			<div class="container">
				 
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
					
						
					</div><!-- .col-sm-6 col-sm-offset-3 -->

				</div><!-- .row -->

		 
				<div class="row">
			
					<!-- Content column start -->
					<div class="col-sm-12">
					<?php if (count($pageposts) == 0){ ?>
						<section class="module">
						<h2 class='module-title font-alt product-hide-title news_title'><u>Nothing found.</u></h2>
						</section>
					<?php }else{?>
						<section class="module">
						<h2 class="module-title font-alt product-hide-title news_title"><u>Found items: </u></h2>
						</section>
						<?php 
							global $post; 
						?>
						<?php foreach ($pageposts as $post): ?>
						<br><br>
							<h2 class="post-title posts_title">
								<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
							</h2>
							
						<?php endforeach; ?>
					<?php }?>
					</div><!-- Content column end -->	
					
					<!-- Sidebar column start -->
					 
					<!-- Sidebar column end -->
					
				</div><!-- .row -->

			</div>
		</section>
		<!-- Post single end -->


<?php get_footer(); ?>
