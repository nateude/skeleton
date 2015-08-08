<?php
/**
 * @package WordPress
 * @subpackage skeleton
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: searh.php  -->

	<div id="content">
		<div class="wrapper">
				<div class="section full posts list searchlist">
					<h1 class="pagetitle"> Search Results for: "<?php echo $_GET['s']; ?>"</h1>
					<?php
						$i = 1;
						if (have_posts()) : while (have_posts()) : the_post();
						$perma = get_post_meta( $post->ID, 'resource_url', true );
						if($perma == false){$perma = get_post_meta( $post->ID, 'event_url', true );}
						if($perma == false){$perma = get_permalink($post->ID);}
						$post_type = get_post_type( $post->ID );
						$post_type = get_post_type_object( $post_type );
						$post_type = $post_type->labels->singular_name;
					?>

						<div class="post post<?=$i?>">
							<div class="content">
								<h2><a href="<?=$perma ?>" ><?php the_title(); ?></a></h2>
								<p><?php echo get_the_excerpt() ?></p>
								<a class="readmore" href="<?=$perma ?>">View <?=$post_type ?></a>
							</div>
						</div> <!--END post post<?=$i ?> -->

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

		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: searh.php  -->

<?php include ("footer.php") ?>