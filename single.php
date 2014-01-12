<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 * Template Name: Post
 */
?>

<?php include ("inc/head.php") ?>

<!-- Begin Template: single.php  -->

	<?php include ("inc/body.header.php") ?>

	<div class="menu main">
		<div class="wrapper">
			<?php wp_nav_menu( array( 'theme_location' => "Main" ) ); ?>
		</div>  <!-- END .wrapper -->
	</div>  <!-- END .menu main -->

	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text">
					<?php include ("inc/layout.col-one.php") ?>
				</div>  <!-- END .section -->
				<div class="section full widgets grid">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Widgets') ) {} ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section twothird -->
			<div class="section onethird right">
				<div class="section full widgets list">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Sidebar') ) {} ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

	<?php include("inc/body.footer.php") ?>

<!-- End Template: single.php  -->