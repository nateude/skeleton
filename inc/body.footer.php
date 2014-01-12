<?php
/**
 * Body footer elements
 */
?>

<!-- Begin Template: inc/body.footer.php  -->

	<div id="footer">
		<div class="wrapper">
			<div class="widgets">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) {} ?>
			</div>  <!-- END .widgets -->
			<div class="menu footer">
				<?php wp_nav_menu( array( 'theme_location' => 'Footer' ) ); ?>
			</div>  <!-- END .menu footer -->
			<div class="copy">
				<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, All Rights Reserved. | <a href="tel:1234567890">(123) 456.7890</a> | <a href="mailto:nateude@gmail.com">NateUde@gmail.com</a> <br>
				Updated <?php the_modified_date('M Y'); ?> | Theme by <a href="http://nateude.com" target="_blank">Nate Ude Design</a> | <a href="<?php echo wp_login_url(); ?>" title="Login">Login</a></p>
			</div>  <!-- END .copy -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #footer -->

	<?php wp_footer(); ?>
	<!-- 	Include Scripts  -->
	<?php  include 'scripts.php';?>

</body>
</html>

<!-- End Template: inc/body.footer.php  -->