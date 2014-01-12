<?php
/**
 * layout section posts
 */
?>

<!-- Begin Template: inc/layout.posts.php  -->

<div class="section full posts list">

	<div class="wrapper">
		<?php
			$i=1;
			$cat = get_post_meta(get_the_ID(), 'categories', true);
			$posts = get_option('posts_per_page');
			if(!$do_not_duplicate) $do_not_duplicate = array();
			$my_query = new WP_Query('cat='.$cat.'&posts_per_page='.$posts);

			if (have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
			if (in_array($post->ID, $do_not_duplicate)) continue;
		?>

		<div class="post post<?=$i?>">
			<a href="<?php the_permalink() ?>" ><h4><?php the_title(); ?></h4></a>
				<?php if ( has_post_thumbnail() ) { ?>
				  <div class="pageImageThumb" ><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('thumb'); ?></a></div>
				<?php } ?>
				<p><?php the_excerpt(); ?><a class="readmore" href="<?php the_permalink() ?>">..Read More</a></p>
				<div class="metadata">
				  <p>Written by <?php the_author_posts_link(); ?> | <?php echo get_the_time('F, Y'); ?> | Post Tags: <?php the_tags(' '); ?> | Post Categories: <?php the_category(','); ?></p>
				</div>
		</div> <!--END post post<?=$i?> -->

		<?php $i++; endwhile; endif; ?>
	</div>  <!-- END .wrapper -->

</div>  <!-- END .section full posts list -->

<!-- End Template: inc/layout.posts.php  -->