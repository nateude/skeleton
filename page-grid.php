<?php
/**
 * @package WordPress
 * @subpackage skeleton
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: page-grid.php  -->

	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>

						<?php the_content(__('')); ?>
					<?php endwhile; else: endif; ?>
				</div>  <!-- END .section full text -->
				<div class="section full posts grid<?=$meta['page_list_type'][0]?> <?=$meta['page_list_tag'][0]?>">

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
					$k = 1;
					$i = 1;
					$custom_query = new WP_Query( $custom_args ); ?>

					  <?php if ( $custom_query->have_posts() ) : ?>

						<!-- the loop -->
						<?php while ( $custom_query->have_posts() ) : $custom_query->the_post();
							$perma = get_post_meta( $post->ID, 'resource_url', true );
							if($perma == false){$perma = get_permalink($post->ID);}
							$class = "post post".$i;
							if($k==1){ $class .=" first"; }
							if($k==3){ $class .=" last";}
						?>

							<div class="<?=$class?> ">
								<div class="content">
									<?php if ( has_post_thumbnail() ) { echo "<div class='feat'>"; the_post_thumbnail('thumb'); echo '</div>'; }?>
									<h3><a href="<?=$perma ?>" ><?php the_title(); ?></a></h3>
									<p><?php echo get_the_excerpt() ?></p>
									<?php if($meta['page_list_button'][0]){?><a class="readmore button green" href="<?=$perma ?>"><?=$meta['page_list_button'][0]?></a><?php }?>
								</div>
							</div> <!--END post post<?=$i?> -->

						<?php
							$k++;
							if($k > 3){$k=1;}
							$i++;
							endwhile; ?>
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

<!-- End Template: page-grid.php  -->

<?php include ("footer.php") ?>