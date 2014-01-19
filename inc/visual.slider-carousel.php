<?php
/**
 * Visual element: Slider with pager carousel
 */
?>

<!-- Begin Template: inc/visual.slider-carousel.php  -->

<div id="mainvisual" class="slider carousel">
	<div class="controls">
    	<div class="arrows cycle-prev"></div>  <!-- END .cycle cycle-prev -->
    	<div class="arrows cycle-next"></div>  <!-- END .cycle cycle-next -->
	</div>  <!-- END .controls -->

	<div class="slideshow cycle-slideshow"
	    data-cycle-fx="scrollHorz"
	    data-cycle-pause-on-hover="true"
	    data-cycle-speed="2000"
	    data-cycle-timeout="4000"
	    data-cycle-slides="> div"
	    data-cycle-prev=".cycle-prev"
	    data-cycle-next=".cycle-next"
	>

	<?php
		$do_not_duplicate = array();
		$i=1;
		$my_query = new WP_Query('category_name=banner&posts_per_page=5');
		while ($my_query->have_posts()) : $my_query->the_post();
			$do_not_duplicate[] = $post->ID;
			$permalink = get_post_meta(get_the_ID(), 'link', true);
			if(!$permalink){$permalink = get_permalink();}

	?>
			<div class="slide slide<?=$i?>">
				<div class="image"><a href="<?=$permalink ?>" ><?php  the_post_thumbnail( $deviceType ); ?></a></div>
				<div class="content" >
					<div class="wrapper">
						<h3 class="title"><a href="<?php $permalink ?>" ><?php the_title(); ?></a></h3>
						<div class="text">
							<p><?php echo get_the_excerpt(); ?> <a class="readmore" href="<?php the_permalink() ?>">..read more &rsaquo; </a></p>
						</div>
					</div> <!-- END .wrapper -->
				</div> <!-- END .content -->
			</div>
	<?php $i++; endwhile; ?>

	</div> <!-- END .slideshow -->

</div>  <!-- END #mainvisual .slider carousel -->

<!-- End Template: inc/visual.slider-carousel.php  -->