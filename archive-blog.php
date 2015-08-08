<?php
/**
 * @package WordPress
 * @subpackage skeleton
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: archive-blog.php  -->


	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text">
					<h1 class="pagetitle">Our Blog: Ideosphere</h1>
				</div>
				<div class="section full posts list blog">
							<?php $i = 1; ?>
					<?php if (have_posts()) : while (have_posts()) : the_post();
							$perma = get_permalink($post->ID);
					?>

						<div class="post post<?=$i?>"><div class='feat'>
								<?php if ( has_post_thumbnail() ) {
									echo "<a href='".$perma."' >";
									the_post_thumbnail('blog');
									echo '</a>';
								}?></div>
							<div class="content">
								<h2><a href="<?=$perma ?>" ><?php the_title(); ?></a></h2>
								<div class="metadata"> <?php the_category(','); ?> / <?php the_author_posts_link(); ?> / <?php echo get_the_time('F j, Y'); ?></div>
								<p><?php echo get_the_excerpt() ?></p>
								<a class="readmore button orange" href="<?=$perma ?>" >Read full post</a>
							</div>
						</div> <!--END post post<?=$i?> -->

				<?php
					$i++;
					endwhile;
					endif;
				?>
				<?php 	global $wp_query;
					$big = 999999999; // need an unlikely integer
					$pagination = paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages,
						'type' => 'array'
					) );
					if($pagination){
						echo "<div class='section full pagination'>";
						foreach ($pagination as $page) {
							echo $page;
						}
						echo "</div><!-- section full pagination -->";
					}
				?>
				</div>  <!-- END .section full text -->
			</div>  <!-- END .section twothird -->
			<div class="section onethird right sidebar">
				<div class="full widgets list">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Sidebar') ) {} ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: archive-blog.php  -->

<?php include ("footer.php") ?>