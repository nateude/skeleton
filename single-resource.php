<?php
	//redirects for resource pages with external urls
	$resource_url = get_post_meta( $post->ID, 'resource_url', true );
	if($resource_url != false){ wp_redirect( $resource_url, 301 ); exit; }

/**
 * @package WordPress
 * @subpackage skeleton
 */
?>

<?php include ("header.php") ?>


<!-- Begin Template: resoure.php  -->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5500cb4f5ae09ec3" async="async"></script>

	<div id="content">
		<div class="wrapper">
			<div class="section full text">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h1 class="pagetitle"><?php the_title(); ?></h1>
					<?php the_content(__('')); ?>
					<?php $terms = wp_get_post_terms( $post->ID, 'resource_types'); ?>
				<?php endwhile; else: endif; ?>
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_sharing_toolbox"></div>
					<?php if ($terms[0]->slug == 'case-studies'){?>
					<a href="<?php echo get_option('home'); ?>/our-results/case-studies/" class="button blue">View All Case Studies</a>
					<?php } ?>
			</div>  <!-- END .section full text -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: resoure.php  -->

<?php include ("footer.php") ?>