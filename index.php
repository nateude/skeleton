<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 * Template Name: Home Page
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: index.php  -->

	<?php include("visual.slider.php") ?>

	<div class="menu main large medium">
		<?php wp_nav_menu( array( 'theme_location' => "main-menu" ) ); ?>
	</div>  <!-- END .menu main -->

	<div id="content">
		<div class="wrapper">
			<?php if(!is_page('blog')) { ?>
			<div class="section full text border">
				<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(__('')); endwhile; else: endif; ?>
			</div>  <!-- END .section -->
			<?php } ?>
			<div class="section full posts grid border">
				<?php
					$i=1;
					$cat = get_post_meta(get_the_ID(), 'categories', true);
					$posts = get_option('posts_per_page');
					$my_query = new WP_Query('cat='.$cat.'-2&posts_per_page='.$posts);
					if (have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
					if( !in_array($post->ID,  $do_not_duplicate ) ):
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
					<a href="<?php the_permalink() ?>" ><h3><?php the_title(); ?></h3></a>
						<p><?php echo get_the_excerpt(); ?> <a class="readmore" href="<?php the_permalink() ?>">..read more &rsaquo; </a></p>
						<div class="metadata">
						  <p>Written by <?php the_author_posts_link(); ?> on <?php echo get_the_time('M Y'); ?><br>
								Post Tags: <?php the_tags(' '); ?><br>
								Post Categories: <?php the_category(','); ?></p>
						</div>
				</div> <!--END post post<?=$i?> -->

				<?php
					$i++;
					endif;
					endwhile;
					endif;
				?>
			</div>  <!-- END .section -->
			<div class="section full widgets grid">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Widgets') ) {} ?>
			</div>  <!-- END .section -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: index.php  -->

<?php include ("footer.php") ?>