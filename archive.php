<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 * Template Name: Archive
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: archive.php  -->

	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text">
					<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(__('')); endwhile; else: endif; ?>
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

<!-- End Template: archive.php  -->

<?php include ("footer.php") ?>