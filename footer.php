
<!-- Begin Template: footer.php  -->

	<div id="footer">
		<div class="wrapper">
			<div class="widgets">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-menu') ) {} ?>
			</div>  <!-- END .widgets -->
			<div class="menu footer">
				<?php wp_nav_menu( array( 'theme_location' => 'Footer' ) ); ?>
			</div>  <!-- END .menu footer -->
			<div class="social">
				<a class="linkedin" target="_blank" href="#" ></a>
				<a class="twitter" target="_blank" href="#" ></a>
				<a class="facebook" target="_blank" href="#" ></a>
				<a class="youtube" target="_blank" href="#" ></a>
				<a class="rss" target="_blank" href="<?php echo get_option('home'); ?>/feed/" ></a>
			</div>  <!-- END .social -->
			<div class="copy">
				<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, All Rights Reserved. | <a href="tel:1234567890">(123) 456.7890</a> | <a href="mailto:nateude@gmail.com">NateUde@gmail.com</a> <br>
				Updated <?php the_modified_date('M Y'); ?> | Theme by <a href="http://nateude.com" target="_blank">Nate Ude Design</a> | <a href="<?php echo wp_login_url(); ?>" title="Login">Login</a></p>
			</div>  <!-- END .copy -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #footer -->
</div>  <!-- END .mainwrapper -->

	<?php wp_footer(); ?>
	<!-- 	Include Scripts  -->
	<?php  include 'libs/scripts.php';?>

</body>
</html>