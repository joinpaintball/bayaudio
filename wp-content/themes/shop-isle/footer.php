<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 */
?>
<?php do_action( 'shop_isle_before_footer' ); ?>

	<?php do_action('shop_isle_footer'); ?>
	
	</div>
	<!-- Wrapper end -->
	
	<!-- Scroll-up -->
	<div class="scroll-up">
		<a href="#totop"><i class="arrow_carrot-2up"></i></a>
	</div>

	<?php do_action( 'shop_isle_after_footer' ); ?>

<?php wp_footer(); ?>
<script>
jQuery("#con-230 input#email").attr("placeholder","Email")


var cls = jQuery(".product_dd select").val();
jQuery(".productTab").hide()
jQuery(".productTab."+cls).show()

jQuery("input#A1").on("click",function(){
cls = jQuery(".product_dd select").val();
jQuery(".productTab").hide()
jQuery(".productTab."+cls).show()
})
</script>

</body>
</html>
