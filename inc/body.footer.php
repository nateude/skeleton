<?php
/**
 * Body footer elements
 */
?>

<!-- Begin Template: inc/body.footer.php  -->

	<div id="footer">
		<div class="widgets">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) {} ?>
		</div>  <!-- END .widgets -->
		<div class="copy">
			<p>&copy; <?php getdate('Y'); ?> <?php bloginfo('name'); ?> All Rights Reserved. | P. 123.456.7890 | <a href="mailto:nateude@gmail.com">NateUde@gmail.com</a> <br>
			Updated <?php the_modified_date('M Y'); ?> | Theme by <a href="http://nateude.com" target="_blank">Nate Ude Design</a> | <a href="<?php echo wp_login_url(); ?>" title="Login">Login</a></p>
		</div>  <!-- END .copy -->
	</div>  <!-- END #footer -->

	<?php wp_footer(); ?>
	<!-- 	Include Scripts  -->
	<?php  include 'scripts.php';?>

</body>
</html>

<!-- End Template: inc/body.footer.php  -->