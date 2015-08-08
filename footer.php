
<!-- Begin Template: footer.php  -->

	<div id="footer">
		<div class="wrapper">
			<div class="widgets">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) {} ?>
			</div>  <!-- END .widget menu footer -->
			
		</div>  <!-- END .wrapper -->
		<div class="copy">
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, All Rights Reserved.</p>
		</div>  <!-- END .copy -->
	</div>  <!-- END #footer -->
</div>  <!-- END .mainwrapper -->
	<?php wp_footer(); ?>
	<!-- 	Include Scripts  -->
	<?php  include 'libs/scripts.php';?>

</body>
</html>