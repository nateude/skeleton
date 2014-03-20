<?php
/**
 * Visual element: Slider
 */
?>

<!-- Begin Template: inc/visual.slider.php  -->

<div id="mainvisual" class="slider large medium">
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
			$i=1;
			$query = new WP_Query( array(
		        'post_type' => 'banner',
		    ));

		    if ( $query->have_posts() ) { ?>
		            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
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
		            <?php  $i++; endwhile; ?>
		    <?php } wp_reset_postdata(); ?>
	</div> <!-- END .slideshow -->

</div>  <!-- END #mainvisual .slider -->

<!-- End Template: inc/visual.slider.php  -->