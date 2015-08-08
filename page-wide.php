<?php
/**
 * @package WordPress
 * @subpackage skeleton
 * Template Name: Page Wide
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: page-wide.php  -->

	<div id="content">
		<div class="wrapper">
			<div class="section full text">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h1 class="pagetitle"><?php the_title(); ?></h1>

					<?php the_content(__('')); ?>
				<?php endwhile; else: endif; ?>
			</div>  <!-- END .section full text -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: page-wide.php  -->

<?php include ("footer.php") ?>