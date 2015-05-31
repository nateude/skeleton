<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 * Template Name: Home Page
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: index.php  -->

	<div id="content">
			<?php if(!is_page('blog')) { ?>
			<div class="section full text border">
				<div class="wrapper">
					<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(__('')); endwhile; else: endif; ?>
				</div>  <!-- END .wrapper -->
			</div>  <!-- END .section -->
			<?php } ?>
			<div class="section full posts cards graylt ">
				<div class="wrapper">
				<?php
					$i=1;
					$cat = get_post_meta(get_the_ID(), 'categories', true);
					$posts = get_option('posts_per_page');
					$my_query = new WP_Query('cat='.$cat.'&posts_per_page='.$posts);
					if (have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
				?>

				<div class="post post<?=$i?>">
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
						<div class="metadata"> <?php the_category(','); ?> / <?php the_author_posts_link(); ?> / <?php echo get_the_time('M Y'); ?></div>
						<a href="<?php the_permalink() ?>" ><h2><?php the_title(); ?></h2></a>
						<p><?php echo get_the_excerpt(); ?> <a class="readmore" href="<?php the_permalink() ?>">..read more &rsaquo; </a></p>
					</div>
				</div> <!--END post post<?=$i?> -->

				<?php
					$i++;
					endwhile;
					endif;
				?>
				</div>  <!-- END .wrapper -->
			</div>  <!-- END .section -->
			<div class="section full widgets grid">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Widgets') ) {} ?>
			</div>  <!-- END .section -->

	</div>  <!-- END #content -->

<!-- End Template: index.php  -->

<?php include ("footer.php") ?>