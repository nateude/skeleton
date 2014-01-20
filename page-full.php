<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 * Template Name: Default Page
 */
?>

<?php include ("inc/head.php") ?>

<!-- Begin Template: page.php  -->

	<?php include ("inc/body.header.php") ?>

	<div class="menu main">
		<?php wp_nav_menu( array( 'theme_location' => "Main" ) ); ?>
	</div>  <!-- END .menu main -->

	<div id="content">
		<div class="wrapper">
			<div class="section full text">
				<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(__('')); endwhile; else: endif; ?>
			</div>  <!-- END .section -->
			<div class="section full widgets grid">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Widgets') ) {} ?>
			</div>  <!-- END .section -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

	<?php include("inc/body.footer.php") ?>

<!-- End Template: page.php  -->