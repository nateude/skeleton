<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 * Template Name: Page w Resources
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
			<div class="section onethird right">
				<div class="section full widgets list">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Sidebar') ) {} ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
		</div>  <!-- END .wrapper -->
		<div class="section full posts cards card_onethird graylt ">
			<div class="wrapper">
				<?php
					$terms = get_the_terms( $post->ID,'industry' );

					$nterms = array();
					foreach ($terms as $key => $value) {
						$nterms[] = $value->slug;
					}
					$args = array(
						'posts_per_page' => 6,
						'post_type' => 'resource',
						'tax_query' => array(
							array(
								'taxonomy' => 'industry',
								'field'    => 'slug',
								'terms'    => $nterms,
							),
						),
					);
					include 'includes/post.loop.php';
				?>
			</div>  <!-- END .wrapper -->
		</div>  <!-- END .section -->
		<div class="section full widgets grid">
			<div class="wrapper">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page Widgets') ) {} ?>
			</div>
		</div>  <!-- END .section -->
	</div>  <!-- END #content -->


<!-- End Template: page.php  -->

<?php include ("footer.php") ?>