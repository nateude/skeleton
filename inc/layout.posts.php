<?php
/**
 * layout section posts
 */
?>

<!-- Begin Template: inc/layout.posts.php  -->

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

<!-- End Template: inc/layout.posts.php  -->