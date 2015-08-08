<?php
/**
 * @package WordPress
 * @subpackage skeleton
 * Template Name: Page Team
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: page-team.php  -->

	<div id="content">
		<div class="wrapper">
			<div class="section full left">
				<div class="section full text">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>

						<?php the_content(__('')); ?>
					<?php endwhile; else: endif; ?>
				</div>  <!-- END .section full text -->
					<?php
						$termid = get_term_by('slug', $meta['page_team_roles'][0], 'team_roles');
						$termid = $termid->term_id;
						$args = array(
							'child_of'=> $termid,
							'orderby' => 'slug',
							'order' => 'ASC',
						);
						$children = get_terms( 'team_roles', $args);
						if($children){
							foreach ($children as $key => $value) { ?>
							<div class="posts cards grid fourth team term_<?=$value->slug ?>">
							<h2 class="sectiontitle"><?=$value->name ?></h2>
							<div class="card_quarter">

							<?php $args = array(
								'posts_per_page' => '-1',
								'post_type' => 'team',
								'orderby' => 'menu_order',
								'order' => 'ASC',
								'tax_query' => array(
									array(
										'taxonomy' => 'team_roles',
										'field'    => 'slug',
										'terms'    => $value->slug
									),
								),
							);

							$j = 1;
							$k = 1;
							$query = new WP_Query( $args );
							if (have_posts()) : while ($query->have_posts()) : $query->the_post();
							$class = "post post".$i;
							if($k==1){ $class .=" first";}
							if($k==4){ $class .=" last";}
						?>

							<div class="<?=$class?>">
									<div class="pageImageThumb" >
										<a href="<?php the_permalink() ?>" rel="bookmark">
											<?php if ( has_post_thumbnail() ) { the_post_thumbnail('profile'); }?>
										</a>
									</div>
									<div class="content">
										<h3 class="name"><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h3>
										<span class="title"><?php echo get_post_meta( $post->ID, 'team_title', true );?></span>
									</div>
								</div> <!--END post post<?=$j?> -->

							<?php
								$k++;
								if($k > 4){$k=1;}
								$j++;
								endwhile;
								endif;
								wp_reset_postdata();
								echo '</div></div>';
							}
						}else{
							echo '<div class="posts cards grid fourth team"><div class="card_quarter">';

							$args = array(
								'posts_per_page' => '-1',
								'post_type' => 'team',
								'orderby' => 'menu_order',
								'order' => 'ASC',
									'tax_query' => array(
										array(
											'taxonomy' => 'team_roles',
											'field'    => 'slug',
											'terms'    => $meta['page_team_roles'][0]
										),
									),

							);

							$j = 1;
							$k = 1;
							$query = new WP_Query( $args );
							if (have_posts()) : while ($query->have_posts()) : $query->the_post();
							$class = "post post".$i;
							if($k==1){ $class .=" first";}
							if($k==4){ $class .=" last";}
						?>

							<div class="<?=$class?>">
									<div class="pageImageThumb" >
										<a href="<?php the_permalink() ?>" rel="bookmark">
											<?php if ( has_post_thumbnail() ) { the_post_thumbnail('profile'); }?>
										</a>
									</div>
									<div class="content">
										<h4 class="name"><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h4>
										<span class="title"><?php echo get_post_meta( $post->ID, 'team_title', true );?></span>
									</div>
								</div> <!--END post post<?=$j?> -->

							<?php
								$k++;
								if($k > 4){$k=1;}
								$j++;
								endwhile;
								endif;
								wp_reset_postdata();
								echo '</div></div>';
						}
						?>
					</div>
				</div>  <!-- END .section full posts list -->
			</div>  <!-- END .section full -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: page-team.php  -->

<?php include ("footer.php") ?>