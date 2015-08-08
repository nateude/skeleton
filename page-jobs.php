<?php
/**
 * @package WordPress
 * @subpackage skeleton
 * Template Name: Page Jobs
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: page-team.php  -->

	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>

						<?php the_content(__('')); ?>
					<?php endwhile; else: endif; ?>
				</div>  <!-- END .section full text -->
					<?php
						$job_types = get_terms( 'job_types' );
						// print_r($job_types);

						foreach ($job_types as $type) {
							echo '<div class="section full posts list jobs_list">';
							echo "<h2 class='jobtype'>".$type->name."</h2>";

							$custom_args = array(
								'post_type' => 'jobs',
								'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'job_types',
										'field'    => 'slug',
										'terms'    => $type->slug
									),
								)
							);
							$i = 1;
							$custom_query = new WP_Query( $custom_args );
							if ( $custom_query->have_posts() ) :
							while ( $custom_query->have_posts() ) : $custom_query->the_post();
								$perma = get_permalink($post->ID);
						?>

									<div class="post post<?=$i?>">
										<div class="content">
											<h3><a href="<?=$perma ?>" ><?php the_title(); ?></a></h3>
											<p><?php echo get_the_excerpt() ?></p>
											<a class="readmore green" href="<?=$perma ?>">View this Job Description</a>
										</div>
									</div> <!--END post post<?=$i?> -->

								<?php
									$i++;
									endwhile;
								wp_reset_postdata();
								else:  ?>
								<p><?php _e( $meta['page_list_none'][0] ); ?></p>
							<?php endif;
								echo "</div>  <!-- END .section full posts list -->";
								}
							?>
			</div>  <!-- END .section twothird -->
			<div class="section onethird right sidebar">
				<div class="full widgets list">
					<?php include 'includes/page.sidebar.php'; ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->

			</div>  <!-- END .section full -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: page-team.php  -->

<?php include ("footer.php") ?>