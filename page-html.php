<?php
/**
 * @package WordPress
 * @subpackage skeleton
 * Template Name: Page w HTML
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
					<div class="widget widget_form">
						<?php echo get_post_meta( $post->ID, 'page_html_script', true ); ?>
					</div>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: page.php  -->

<?php include ("footer.php") ?>