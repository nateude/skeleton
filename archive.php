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
			<div class="section full posts cards card_onequarter ">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="post">
						<div class="pageImageThumb" >
							<a href="<?php the_permalink() ?>" rel="bookmark">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail('thumb');
								 	}else{ ?>
								 		<img src="<?php bloginfo('template_url') ?>/img/thumb.png" class="attachment-thumb wp-post-image" alt="<?php bloginfo('name') ?>">
								 	<?php	}
								?>
							</a>
						</div>
						<div class="content">
							<h2 class="title"><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h2>
							<p><?php echo get_the_excerpt(); ?></p>
						</div>
					</div> <!--END post -->
				<?php endwhile; else: endif; ?>
			</div>  <!-- END .section -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: archive.php  -->

<?php include ("footer.php") ?>