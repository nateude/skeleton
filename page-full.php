<?php
/**
 * @package WordPress
 * @subpackage skeleton
 * Template Name:Full Page
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: page.php  -->

	<div id="content">
		<div class="wrapper">
			<div class="section full text">
				<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(__('')); endwhile; else: endif; ?>
			</div>  <!-- END .section -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: page.php  -->

<?php include ("footer.php") ?>