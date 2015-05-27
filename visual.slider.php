<?php
/**
 * Visual element: Slider
 */
?>

<!-- Begin Template: inc/visual.slider.php  -->

<div id="mainvisual" class="slider">

		<?php
			$i=1;
			$query = new WP_Query( array(
		        'post_type' => 'banner',
				'posts_per_page' => '-1',
				'orderby' => 'menu_order',
				'order' => 'ASC'
		    ));
		    $posthtml = "";
		    $largecss = "";
		    $tabletcss = "";
		    $mobilecss = "";

		    if ( $query->have_posts() ) { ?>
		            <?php while ( $query->have_posts() ) : $query->the_post();
						$banner = "";
						if ( has_post_thumbnail($post->ID) ) {
							$image_id = get_post_thumbnail_id($post->ID);
							$banner = wp_get_attachment_image_src($image_id,'banner', true)[0];
							$tablet = wp_get_attachment_image_src($image_id,'banner-medium', true)[0];
							$mobile = wp_get_attachment_image_src($image_id,'banner-small', true)[0];
							$color = get_post_meta(get_the_ID(), 'banner_button_color', true);
							$url = get_post_meta(get_the_ID(), 'banner_button_url', true);
							$text = get_post_meta(get_the_ID(), 'banner_buton_text', true);
						}
						$h="h2";
						if ($i == 1){$h="h1";}

						$largecss .= ".slide".$i.'{background-image:url('.$banner.');}';
						$tabletcss .= ".slide".$i.'{background-image:url('.$tablet.');}';
						$mobilecss .= ".slide".$i.'{background-image:url('.$mobile.');}';

						$posthtml .= '<div class="slide slide'.$i.'"><div class="wrapper"><div class="content" >'."<".$h." class='title'>".get_the_excerpt()."</".$h.">".'<a href="'.$url.'" class="button '.$color.'">'.$text.'</a></div></div></div>';

		            	$i++;
		            endwhile;
		            echo '<style>'.$largecss.'@media (max-width: 1024px) {'.$tabletcss.'}@media (max-width: 600px) {'.$mobilecss.'}</style>';
		         ?>
		    <?php } wp_reset_postdata(); ?>
	<div class="controls">
    	<div class="arrows cycle-prev"></div>  <!-- END .cycle cycle-prev -->
    	<div class="cycle-pager"></div>
    	<div class="arrows cycle-next"></div>  <!-- END .cycle cycle-next -->
	</div>  <!-- END .controls -->

	<div class="slideshow cycle-slideshow testimonial-slider"
	    data-cycle-fx="scrollHorz"
	    data-cycle-pause-on-hover="true"
	    data-cycle-speed="2000"
		data-cycle-timeout="0"
	    data-cycle-slides="> div.slide"
	    data-cycle-prev=".cycle-prev"
	    data-cycle-next=".cycle-next"
	    data-cycle-log="false"
		data-cycle-pager=".controls .cycle-pager"
	>
		<?=$posthtml ?>
	</div> <!-- END .slideshow -->

</div>  <!-- END #mainvisual .slider -->