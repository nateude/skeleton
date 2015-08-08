<?php
/**
 * @package WordPress
 * @subpackage skeleton
 * Template Name:Page Newsroom
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: page.php  -->

	<div id="content">

			<div class="section full text">
				<div class="wrapper">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h1 class="pagetitle"><?php the_title(); ?></h1>

					<?php the_content(__('')); ?>
				<?php endwhile; else: endif; ?>
				</div>
			</div>  <!-- END .section full text -->

			<div class="section full posts cards placements graylt">
				<div class="wrapper">
				<h2 class="sectiontitle">Media Coverage</h2>
				<div class="card_third">
					<?php

						$args = array(
							'posts_per_page' => '6',
							'post_type' => 'placements'
						);

						$j = 1;
						$query = new WP_Query( $args );
						if (have_posts()) : while ($query->have_posts()) : $query->the_post();

					?>

						<div class="post post<?=$j?>">
							<div class="pageImageThumb" >
								<a href="<?php the_permalink() ?>" rel="bookmark">
									<?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumb'); }?>
								</a>
							</div>
							<div class="content">
								<h2 class="title"><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h2>
							</div>
						</div> <!--END post post<?=$j?> -->


				<?php
					$j++;
					endwhile;
					endif;
					wp_reset_postdata();
				?>
				</div>
			</div>  <!-- END .wrapper -->
			<div class="btnwrap placements"><a href="<?php echo get_option('home'); ?>/placements/" class="button blue">View All Placements</a></div>
		</div>  <!-- END section full posts cards placements -->

		<div class="section full posts list press-release">
			<div class="wrapper">
				<h2 class="sectiontitle">Press Releases</h2>
			<?php

				$args = array(
					'posts_per_page' => '10',
					'post_type' => 'press-release'
				);

				$j = 1;
				$query = new WP_Query( $args );
				if (have_posts()) : while ($query->have_posts()) : $query->the_post();

			?>

				<div class="post post<?=$j?>">
					<div class="content">
						<h2 class="title"><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h2>
						<div class="metadata"><?php echo get_the_time('F j, Y'); ?></div>
						<p><?php echo get_the_excerpt(); ?></a></p>
								<a class="readmore button blue" href="<?php the_permalink() ?>" >Read full Press Release</a>
					</div>
				</div> <!--END post post<?=$j?> -->

			<?php
				$j++;
				endwhile;
				endif;
				wp_reset_postdata();
			?>
			<div class="btnwrap releases"><a href="<?php echo get_option('home'); ?>/press-releases/" class="button">View All Press Releases</a></div>
		</div>  <!-- END .wrapper -->
	</div>  <!-- END section full posts cards placements -->
	</div>  <!-- END #content -->

<!-- End Template: page.php  -->

<?php include ("footer.php") ?>