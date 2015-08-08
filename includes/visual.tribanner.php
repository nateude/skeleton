<?php

// ------------------------------------------------------
// Template Parts to build Tri Banner
// ------------------------------------------------------
?>


<!-- Begin Template: inc/visual.tribanner.php  -->

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
							$image_id   = get_post_thumbnail_id($post->ID);
							$ban_main     = wp_get_attachment_image_src($image_id,'banner', true)[0];
							$ban_tablet     = wp_get_attachment_image_src($image_id,'banner-medium', true)[0];
							$ban_mobile     = wp_get_attachment_image_src($image_id,'banner-small', true)[0];
							$ban_title      = get_post_meta(get_the_ID(), 'banner_title', true);
							$ban_subtitle   = get_post_meta(get_the_ID(), 'banner_subtitle', true);
							$ban_buttontext = get_post_meta(get_the_ID(), 'banner_buttontext', true);
							$ban_url        = get_post_meta(get_the_ID(), 'banner_url', true);
							$ban_class      = get_post_meta(get_the_ID(), 'banner_class', true);
						}
						$h="h2";
						if ($i == 1){$h="h1";}

						$largecss  .= ".slide".$i.'{background-image:url('.$ban_main.');}';
						$tabletcss .= ".slide".$i.'{background-image:url('.$ban_tablet.');}';
						$mobilecss .= ".slide".$i.'{background-image:url('.$ban_mobile.');}';

						$posthtml  .= '<div class="slide slide'.$i.' '.$ban_class.'">';
						$posthtml  .= '<a href="'.$ban_url.'" class="ovelay"></a>';
						$posthtml  .= '<div class="wrapper"><div class="content" >';
						$posthtml  .= '<'.$h.' class="title">'.$ban_title.'</'.$h.'>';
						$posthtml  .= '<p class="subtitle">'.$ban_subtitle.'</p>';
						$posthtml  .= '<a href="'.$ban_url.'" class="button">'.$ban_buttontext.'</a>';
						$posthtml  .= '</div></div></div>';

						$i++;
					endwhile;
					// echo '<style>'.$largecss.'@media (max-width: 1024px) {'.$tabletcss.'}@media (max-width: 600px) {'.$mobilecss.'}</style>';
				 ?>
			<?php } wp_reset_postdata(); ?>

	<div class="tribanner">

		<div class="banner item1" style="z-index:200">
			<div class="message">
				<h1>Avoid the risk. <strong>Start your journey</strong></h1>
			</div>

			<div class="sec sec1 left" style="background-color:#124666;">
				<div class="top">
					<div class="conwrap">
						<div class="icon"><img src="http://ideosity.stagingcms.com/wp-content/uploads/2015/08/advisory-icon.png"></div>
						<h2>Advisory</h2>
					</div>
				</div>
				<div class="bottom">
					<div class="conwrap">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<a href="#" class="button white">Free Handshakes</a>
					</div>
				</div>
			</div>

			<div class="sec sec2 center" style="background-color:#5b7c8e;">
				<div class="top" >
					<div class="conwrap">
						<div class="icon">	<img src="http://ideosity.stagingcms.com/wp-content/uploads/2015/08/implementation-icon.png"></div>
						<h2>Implementation</h2>
					</div>
				</div>
				<div class="bottom">
					<div class="conwrap">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<a href="#" class="button white">Let us Help</a>
					</div>
				</div>
			</div>

			<div class="sec sec3 right" style="background-color:#74b3ce;">
				<div class="top" >
					<div class="conwrap">
						<div class="icon"><img src="http://ideosity.stagingcms.com/wp-content/uploads/2015/08/support-icon.png"></div>
						<h2>Support</h2>
					</div>
				</div>
				<div class="bottom">
					<div class="conwrap">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<a href="#" class="button white">Learn More</a>
					</div>
				</div>
			</div>
		</div>

		<div class="banner item2" style="z-index:100">
			<div class="message"  style="background-color:#5b7c8e;">
				<h1>Manage information. <strong>Streamline your supply chain.</strong></h1>
			</div>

			<div class="sec sec1 left" style="background-image:url(http://ideosity.localhost/wp-content/uploads/icons/old-bicycle_bppl_original.jpg);">
				<div class="top">
					<div class="conwrap">
						<div class="icon"><img src="http://ideosity.stagingcms.com/wp-content/uploads/2015/08/advisory-icon.png"></div>
						<h2>Advisory</h2>
					</div>
				</div>
				<div class="bottom">
					<div class="conwrap">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<a href="#" class="button white">Free Handshakes</a>
					</div>
				</div>
			</div>

			<div class="sec sec2 center" style="background-image:url(http://ideosity.localhost/wp-content/uploads/icons/old-bicycle_bppl_original.jpg);">
				<div class="top" >
					<div class="conwrap">
						<div class="icon">	<img src="http://ideosity.stagingcms.com/wp-content/uploads/2015/08/implementation-icon.png"></div>
						<h2>Implementation</h2>
					</div>
				</div>
				<div class="bottom">
					<div class="conwrap">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<a href="#" class="button white">Let us Help</a>
					</div>
				</div>
			</div>

			<div class="sec sec3 right" style="background-image:url(http://ideosity.localhost/wp-content/uploads/icons/old-bicycle_bppl_original.jpg);">
				<div class="top" >
					<div class="conwrap">
						<div class="icon"><img src="http://ideosity.stagingcms.com/wp-content/uploads/2015/08/support-icon.png"></div>
						<h2>Support</h2>
					</div>
				</div>
				<div class="bottom">
					<div class="conwrap">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<a href="#" class="button white">Learn More</a>
					</div>
				</div>
			</div>
		</div>


	</div> <!-- END .slideshow -->

</div>  <!-- END #mainvisual .slider -->