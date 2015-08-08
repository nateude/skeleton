<?php
/**
 * @package WordPress
 * @subpackage skeleton
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: single-placements.php  -->

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5500cb4f5ae09ec3" async="async"></script>

	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php if ( has_post_thumbnail() ) { echo "<div class='post_feat'>"; the_post_thumbnail('full'); echo '</div>'; }?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>
						<?php the_content(__('')); ?>
					<?php endwhile; else: endif; ?>
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_sharing_toolbox"></div>

				</div>  <!-- END .section full text -->
			</div>  <!-- END .section twothird -->
			<div class="section onethird right sidebar">
				<div class="widgets list">
					<a href="<?php echo get_option('home'); ?>/placements/" class="button blue">View All Placements</a>
					<?php include 'includes/single.sidebar.php'; ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: single-placements.php -->

<?php include ("footer.php") ?>