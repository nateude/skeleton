<?php
/**
 * @package WordPress
 * @subpackage skeleton
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: single-post.php  -->

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5500cb4f5ae09ec3" async="async"></script>

	<div id="content">
		<div class="wrapper">
			<div class="section twothird left single-post">
				<div class="section full text">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>
						<div class="metadata"> <?php the_category(','); ?> / <?php the_author_posts_link(); ?> / <?php echo get_the_time('F j, Y'); ?></div>
						<?php if ( has_post_thumbnail() ) { echo "<div class='post_feat blog'>"; the_post_thumbnail('blog'); echo '</div>'; }?>
						<?php the_content(__('')); ?>
					<?php endwhile; else: endif; ?>
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_sharing_toolbox"></div>
				</div>  <!-- END .section full text -->
				<div class="author">
						<div class='image'><?php echo get_avatar( get_the_author_meta( 'ID' ), 130 ); ?></div>
						<div class="wrap">
							<h2>
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="Posts By <?php the_author_meta( 'display_name' ); ?>" >
									<?php the_author_meta( 'display_name' ); ?>
								</a>
							</h2>
							<div class="social blue">
								<?php
									$facebook = get_the_author_meta('facebook'); if($facebook) echo "<a class='facebook' href='".$facebook."' target='_blank'></a>";
									$twitter = get_the_author_meta('twitter'); if($twitter) echo "<a class='twitter' href='".$twitter."' target='_blank'></a>";
									?><a class='rss' href='<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>/feed/' target='_blank'></a><?php
									$linkedin = get_the_author_meta('linkedin'); if($linkedin) echo "<a class='linkedin' href='".$linkedin."' target='_blank'></a>";
									$google = get_the_author_meta('googleplus'); if($google) echo "<a class='google' rel='author' href='".$google."' target='_blank'></a>";
									$youtube = get_the_author_meta('youtube'); if($youtube) echo "<a class='youtube' href='".$youtube."' target='_blank'></a>";
									$website = get_the_author_meta('website'); if($website) echo "<a class='website' href='".$website."' target='_blank'></a>";
								?>
							</div>
						</div>
						<?php
							//crop description length
							$desc = get_the_author_meta( 'description' );
							$descLen = strlen($desc);
							if ($descLen > 110) {
								$desc = substr($desc, 0, strpos($desc, " ", 110))."";
							}
						 	if($descLen > 0){ ?>
						 		<div class="exc"><p><?=$desc ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">..read more</a></p></div>
						 <?php } ?>

				</div>  <!-- END .section -->
			</div>  <!-- END .section twothird -->
			<div class="section onethird right sidebar">
				<div class="widgets list">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Default Sidebar') ) {} ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
			<div class="section full posts cards grid fourth tagged">
				
				<h2 class="sectiontitle">Related Posts</h2>
			
				<div class="card_quarter">
					<?php
						$categories = get_the_category($post->ID);
						$cat = "";
						$i = 0;
						foreach ($categories as $key => $value) {
							if($i > 0) {$cat.= ',';}
							$cat.= $value->term_id;
							$i++;
						}

						$args = array(
							'posts_per_page' => 4,
							'post_type' => 'blog',
							'cat' => $cat
						);
						$query = new WP_Query( $args );
						if (have_posts()) : while ($query->have_posts()) : $query->the_post();
						$resource_url = get_post_meta( $post->ID, 'resource_url', true );
						if($resource_url == false){$resource_url = get_permalink($post->ID);}
					?>

						<div class="post post<?=$i?>">
							<div class="pageImageThumb" >
								<a href="<?=$resource_url ?>" rel="bookmark">
									<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('resource');
									 	}
									?>
								</a>
							</div>
							<div class="content">
								<h2 class="title"><a href="<?=$resource_url ?>" ><?php the_title(); ?></a></h2>
							</div>
						</div> <!--END post post<?=$i?> -->

					<?php
						$i++;
						endwhile;
						endif;
						wp_reset_postdata();
					?>
					</div>
				</div>  <!-- END .section full text -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: single-post.php  -->

<?php include ("footer.php") ?>