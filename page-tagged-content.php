<?php
/**
 * @package WordPress
 * @subpackage skeleton
 * Template Name: Page w/ Tagged Content
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: page-tagged-content.php  -->

	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text">
					<?php if (have_posts()) : while (have_posts()) : the_post();
						$postid = $post->ID;
					?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>
						<?php the_content(__('')); ?>
					<?php endwhile; else: endif; ?>
				</div>  <!-- END .section full text -->
			</div>  <!-- END .section twothird -->
			<div class="section onethird right sidebar">
				<div class="widgets list">
					<?php include 'includes/page.sidebar.php'; ?>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
			<div class="divider"></div>
			<div class="section full tagged posts cards">

				<h2 class="sectiontitle nocase">Related Resources</h2>
				<?php $term_list = wp_get_post_terms($postid, 'content_tags', array("fields" => "names")); ?>
				<?php

					$args = array(
						'posts_per_page' => 4,
						'post_type' => 'resource',
						'tax_query' => array(
							array(
								'taxonomy' => 'content_tags',
								'field'    => 'slug',
								'terms'    => $term_list
							),
						),
					);
					$i = 1;
					$query = new WP_Query( $args );
					if (have_posts()) : while ($query->have_posts()) : $query->the_post();
					$resource_url = get_post_meta( $postid, 'resource_url', true );
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
				</div>  <!-- END .section full text -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: page-tagged-content.php  -->

<?php include ("footer.php") ?>