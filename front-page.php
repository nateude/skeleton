<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 * Template Name: Home Page
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: index.php  -->

	<?php include("includes/visual.slider.php") ?>

	<div id="content">
			<?php if(!is_page('blog')) { ?>
			<div class="section full text">
				<div class="wrapper">
					<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(__('')); endwhile; else: endif; ?>
				</div>  <!-- END .wrapper -->
			</div>  <!-- END .section -->
			<?php } ?>
			<div class="section full posts cards card_onethird graylt ">
				<div class="wrapper">
					<?php
						$args = array(
							'posts_per_page' => 3
						);
						include 'includes/post.loop.php';
					?>
				</div>  <!-- END .wrapper -->
			</div>  <!-- END .section -->

	</div>  <!-- END #content -->


<!-- End Template: index.php  -->

<?php include ("footer.php") ?>