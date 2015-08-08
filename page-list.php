<?php
/**
 * @package WordPress
 * @subpackage skeleton
 * Template Name: Page w/ Archive List
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: page-list.php  -->

	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>
						<?php the_content(__('')); ?>
					<?php endwhile; else: endif; ?>
				</div>  <!-- END .section full text -->
				<div class="section full posts list <?=$meta['page_list_type'][0]?> <?=$meta['page_list_tag'][0]?>">

					<?php

					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$ppp = get_option('posts_per_page');
					if($meta['page_list_ppp'][0] != false) $ppp = $meta['page_list_ppp'][0];
					$custom_args = array(
						'post_type' => $meta['page_list_type'][0],
						'posts_per_page' => -1,
						'paged' => $paged
					);

					if($meta['page_list_tag'][0] != 'false'){

						$custom_args['tax_query'] = array(
								array(
									'taxonomy' => 'resource_types',
									'field'    => 'slug',
									'terms'    => $meta['page_list_tag'][0]
								),
							);
					}
					  $i = 1;
					  $custom_query = new WP_Query( $custom_args ); ?>

					  <?php if ( $custom_query->have_posts() ) : ?>

						<!-- the loop -->
						<?php while ( $custom_query->have_posts() ) : $custom_query->the_post();

						$posttype = get_post_type( $post );
						if($posttype == 'testimonials'){
							$testimonial_headline = get_post_meta( $post->ID, 'testimonial_headline', true );
							$testimonial_title = get_post_meta( $post->ID, 'testimonial_title', true );
							$testimonial_name = get_post_meta( $post->ID, 'testimonial_name', true );
							$testimonial_company = get_post_meta( $post->ID, 'testimonial_company', true );
							$testimonial_url = get_post_meta( $post->ID, 'testimonial_url', true );
							$testimonial_text = get_post_meta( $post->ID, 'testimonial_text', true );
						?>

							<div class="post post<?=$i?>">
									<div class='feat'><?php if ( has_post_thumbnail() ) { echo ""; the_post_thumbnail('resource'); }?></div>
								<div class="content">

										<h3><a href="<?=$testimonial_url ?>" target="_blank"><?=$testimonial_headline ?></a></h3>
										<p class="smtext"><?=$testimonial_name ?>, <em><?=$testimonial_title ?>, <?=$testimonial_company ?></em></p>
										<p><?=$testimonial_text ?></p>
										<?php if($meta['page_list_button'][0]){?><a class="readmore green" href="<?=$testimonial_url ?>" target="_blank"><?=$meta['page_list_button'][0]?></a><?php }?>

								</div>
							</div> <!--END post post<?=$i?> -->

						<?php

						}else{
							$perma = get_post_meta( $post->ID, 'resource_url', true );
							if($perma == false){$perma = get_permalink($post->ID);}

						?>

							<div class="post post<?=$i?>">
									<?php if ( has_post_thumbnail() ) {
										echo "<div class='feat'><a href='".$perma."' >";
										the_post_thumbnail('resource');
										echo '</a></div>';
									}?>
								<div class="content">
									<h3><a href="<?=$perma ?>" ><?php the_title(); ?></a></h3>
									<p><?php echo get_the_excerpt() ?></p>
									<?php if($meta['page_list_button'][0]){?><a class="readmore green" href="<?=$perma ?>"><?=$meta['page_list_button'][0]?></a><?php }?>
								</div>
							</div> <!--END post post<?=$i?> -->

						<?php
							}
							$i++;
							endwhile;
						?>
						<!-- end of the loop -->

						<!-- pagination here -->
						<?php
						  if (function_exists(custom_pagination)) {
							custom_pagination($custom_query->max_num_pages,"",$paged);
						  }
						?>

					  <?php wp_reset_postdata(); ?>

					  <?php else:  ?>
						<p><?php _e( $meta['page_list_none'][0] ); ?></p>
					  <?php endif; ?>

				</div>  <!-- END .section full posts list -->
				<?php if($meta['page_list_aftertext'][0]){ ?>
					<div class="section full text">
						<?php echo $meta['page_list_aftertext'][0] ?>
					</div>  <!-- END .section full text -->
				<?php } ?>
			</div>  <!-- END .section twothird -->
			<div class="section onethird right sidebar">
				<div class="widgets list">
					<?php include 'includes/page.sidebar.php'; ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: page-list.php  -->

<?php include ("footer.php") ?>