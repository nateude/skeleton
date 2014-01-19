<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 * Template Name: Home Page
 */
?>

<?php include ("inc/head.php") ?>

<!-- Begin Template: index.php  -->

	<?php include ("inc/body.header.php") ?>

	<?php include("inc/visual.slider.php") ?>

	<div class="menu main">
		<div class="wrapper">
			<?php wp_nav_menu( array( 'theme_location' => "Main" ) ); ?>
		</div>  <!-- END .wrapper -->
	</div>  <!-- END .menu main -->

	<div id="content">
		<div class="wrapper">
			<?php if(!is_page('blog')) { ?>
			<div class="section full text border">
				<?php include ("inc/layout.col-two.php") ?>
			</div>  <!-- END .section -->
			<?php } ?>
			<div class="section full posts grid border">
				<?php include ("inc/layout.posts.php") ?>
			</div>  <!-- END .section -->
			<div class="section full widgets grid">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Widgets') ) {} ?>
			</div>  <!-- END .section -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

	<?php include("inc/body.footer.php") ?>

<!-- End Template: index.php  -->