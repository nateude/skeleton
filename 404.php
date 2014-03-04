<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: 404.php  -->

	<div class="menu main">
		<?php wp_nav_menu( array( 'theme_location' => "main-menu" ) ); ?>
	</div>  <!-- END .menu main -->

	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text">
					<h3>Error 404: Page Not Found</h3>
					<h4>We are sorry the page you requested is missing. </h4>
				</div>  <!-- END .section -->
				<div class="section full widgets grid">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Widgets') ) {} ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section twothird -->
			<div class="section onethird right">
				<div class="section full widgets list">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Sidebar') ) {} ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: 404.php  -->

<?php include ("footer.php") ?>