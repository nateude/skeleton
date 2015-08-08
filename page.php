<?php
/**
 * @package WordPress
 * @subpackage skeleton
 * Template Name: Default Page
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: page.php  -->

	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>

						<?php the_content(__('')); ?>
					<?php endwhile; else: endif; ?>
				</div>  <!-- END .section full text -->
			</div>  <!-- END .section twothird -->
			<div class="section onethird right sidebar">
				<div class="full widgets list">
					<?php include 'includes/page.sidebar.php'; ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: page.php  -->

<?php include ("footer.php") ?>