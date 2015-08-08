<?php
/**
 * @package WordPress
 * @subpackage skeleton
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: author.php  -->


	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text" style="margin-bottom:60px;">
					<div class="author">
							<?php
								$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
								$aid = $curauth->ID;
							?>
							<div class='image'><?php echo get_avatar( $aid, 130 ); ?></div>
							<div class="wrap">
								<h1><?php the_author_meta( 'display_name', $aid ); ?></h1>
								<div class="social blue">
									<?php
										$facebook = get_the_author_meta('facebook', $aid); if($facebook) echo "<a class='facebook' href='".$facebook."' target='_blank'></a>";
										$twitter = get_the_author_meta('twitter', $aid); if($twitter) echo "<a class='twitter' href='".$twitter."' target='_blank'></a>";
										?><a class='rss' href='<?php echo get_author_posts_url( $aid );?>/feed/' target='_blank'></a><?php
										$linkedin = get_the_author_meta('linkedin', $aid); if($linkedin) echo "<a class='linkedin' href='".$linkedin."' target='_blank'></a>";
										$google = get_the_author_meta('googleplus', $aid); if($google) echo "<a class='google' rel='author' href='".$google."' target='_blank'></a>";
										$youtube = get_the_author_meta('youtube', $aid); if($youtube) echo "<a class='youtube' href='".$youtube."' target='_blank'></a>";
										$website = get_the_author_meta('website', $aid); if($website) echo "<a class='website' href='".$website."' target='_blank'></a>";
									?>
								</div>
							</div>
							<?php $desc = get_the_author_meta( 'description', $aid ); ?>
							 <div class="exc"><p><?=$desc ?></p></div>
					</div>  <!-- END .section -->
					<h1 class="pagetitle">
						<?php if ( single_cat_title('', false) ) { single_cat_title( '', true ); }?>
						<?php if ( is_post_type_archive() ) { post_type_archive_title(); }?>
						<?php if ( is_year() ) { get_the_date( 'Y' ); } ?>
					</h1>
				</div>

				<div class="section full posts list blog-posts">
				<h2>Posts by <?php the_author_meta( 'display_name', $aid ); ?></h2>

					<?php

					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$custom_args = array(
						'author' => $aid,
						'post_type' => 'blog',
						'posts_per_page' => -1,
						'paged' => $paged
					);
					  $i = 1;
					  $custom_query = new WP_Query( $custom_args ); ?>

					  <?php if ( $custom_query->have_posts() ) : ?>

						<!-- the loop -->
						<?php while ( $custom_query->have_posts() ) : $custom_query->the_post();

							$posttype = get_post_type( $post );
							$perma = get_permalink($post->ID);

						?>

							<div class="post post<?=$i?>">
									<?php if ( has_post_thumbnail() ) {
										echo "<div class='feat'><a href='".$perma."' >";
										the_post_thumbnail('resource');
										echo '</a></div>';
									}?>
								<div class="content">
									<h3><a href="<?=$perma ?>" ><?php the_title(); ?></a></h3>
								<div class="metadata"> <?php the_category(','); ?> / <?php echo get_the_time('F j, Y'); ?></div>
								<p><?php echo get_the_excerpt() ?></p>
								</div>
							</div> <!--END post post<?=$i?> -->

						<?php
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
			</div>  <!-- END .section twothird -->
			<div class="section onethird right sidebar">
				<div class="full widgets list">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Default Sidebar') ) {} ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->


<!-- End Template: author.php  -->

<?php include ("footer.php") ?>