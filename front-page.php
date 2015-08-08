<?php
/**
 * @package WordPress
 * @subpackage discoverorg
 * Template Name: Home Page
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: front-page.php  -->

	<?php include("includes/visual.slider.php"); ?>

	<div id="content">

			<div class="section full who center">
				<div class="wrapper small">
					<h2 class="sectiontitle"><?=$meta['homepage_who_title'][0] ?></h2>
					<p class="intro"><?=$meta['homepage_who_intro'][0] ?></p>
				</div>
					<div class="divider"></div>

				<div class="wrapper">

					<div class="iconwrap">
						<div class="icon icon-1 <?=$meta['homepage_who_icon_1_class'][0] ?>">
							<a href="<?=$meta['homepage_who_icon_1_url'][0] ?>">
								<img src="<?=$meta['homepage_who_icon_1_image'][0] ?>" alt="<?=$meta['homepage_who_icon_1_alt'][0] ?>">
							</a>
							<div class="content">
								<h3><?=$meta['homepage_who_icon_1_title'][0] ?></h3>
								<p><?=$meta['homepage_who_icon_1_par'][0] ?></p>
							</div>
						</div>
						<div class="icon icon-2 <?=$meta['homepage_who_icon_2_class'][0] ?>">
							<a href="<?=$meta['homepage_who_icon_2_url'][0] ?>">
								<img src="<?=$meta['homepage_who_icon_2_image'][0] ?>" alt="<?=$meta['homepage_who_icon_2_alt'][0] ?>">
							</a>
							<div class="content">
								<h3><?=$meta['homepage_who_icon_2_title'][0] ?></h3>
								<p><?=$meta['homepage_who_icon_2_par'][0] ?></p>
							</div>
						</div>
						<div class="icon icon-3 <?=$meta['homepage_who_icon_3_class'][0] ?>" >
							<a href="<?=$meta['homepage_who_icon_3_url'][0] ?>">
								<img src="<?=$meta['homepage_who_icon_3_image'][0] ?>" alt="<?=$meta['homepage_who_icon_3_alt'][0] ?>">
							</a>
							<div class="content">
								<h3><?=$meta['homepage_who_icon_3_title'][0] ?></h3>
								<p><?=$meta['homepage_who_icon_3_par'][0] ?></p>
							</div>
						</div>
					</div><!-- END iconwrap -->

				</div>  <!-- END .wrapper -->
			</div>  <!-- END .section -->
			<div class="section full partners graylt center">
				<div class="wrapper">
					<h2 class="sectiontitle"><?=$meta['homepage_partners_title'][0] ?></h2>
					<div class="divider"></div>

					<div class="partner_wrap">

						<?php
							$args = array(
								'posts_per_page' => 8,
								'post_type'      => 'partners',
								'meta_key'       => 'partners_featured',
								'meta_value'     => 'featured'
							);
							$i=1;
							$query = new WP_Query( $args );
							if (have_posts()) : while ($query->have_posts()) : $query->the_post();
						?>

							<div class="post post<?=$i?> partners">
								<div class='feat'><?php echo the_post_thumbnail('thumb');?> </div>
							</div> <!--END post post<?=$i?> -->

						<?php
							$i++;
							endwhile;
							endif;
							wp_reset_postdata();
						?>

					</div>
					<div class="btnwrap">
						<a href="<?=$meta['homepage_partners_button_url'][0] ?>" class="button orange"><?=$meta['homepage_partners_button_text'][0] ?></a>
					</div>

			</div>
			</div>

			<div class="section full resources">
				<div class="wrapper">
					<h2 class="sectiontitle"><?=$meta['homepage_resources_title'][0] ?></h2>
					<p class="intro center"><?=$meta['homepage_resources_intro'][0] ?></p>
					<div class="divider"></div>

						<div class="resource-slider height-match">

							<?php
								$args = array(
									'posts_per_page' => 2,
									'post_type'      => 'resource',
									'meta_key'       => 'resource_featured',
									'meta_value'     => 'featured'
								);
								$i=1;
								$query = new WP_Query( $args );
								if (have_posts()) : while ($query->have_posts()) : $query->the_post();
								$perma = get_post_meta( $post->ID, 'resource_url', true );
								if($perma == false){$perma = get_permalink($post->ID);}
							?>

								<div class="post post<?=$i?> resources">
									<h3><a href="<?=$perma ?>" ><?php the_title(); ?></a></h3>
									<p><?php echo get_the_excerpt() ?></p>
									<div class="info">
										<span class="name">Mike Strong</span>
										<span class="title">Web Content Manager</span>
										<span class="company">Yankee Candle</span>
									</div>
									<a class="readmore" href="<?=$perma ?>">Read More</a>

								</div> <!--END post post<?=$i?> -->

							<?php
								$i++;
								endwhile;
								endif;
								wp_reset_postdata();
							?>
							<div class="arrows cycle-prev"></div>  <!-- END .cycle cycle-prev -->
							<div class="arrows cycle-next"></div>  <!-- END .cycle cycle-next -->
						</div> 
						
						<!-- END .slideshow -->
						

				</div>  <!-- END .wrapper -->
			</div>  <!-- END .section -->
			<div class="section full form">
				<div class="wrapper">
					<h2><?=$meta['homepage_cta_title'][0] ?></h2>
					<p>Nate needs to add this form</p>
				</div>  <!-- END .wrapper -->
			</div>


			<div class="section full leadership graylt">
				<div class="wrapper">
					<h2 class="sectiontitle nocase"><?=$meta['homepage_news_title'][0] ?></h2>
					<div class="divider"></div>
					<div class="bgwrap">
					<div class="inthenews">
						<h3 class="sectiontitle nocase"><?=$meta['homepage_news_news_button_title'][0] ?></h3>
							<?php
								$args = array(
									'posts_per_page' => 3,
									'post_type'      => 'news'
								);
								$i=1;
								$query = new WP_Query( $args );
								if (have_posts()) : while ($query->have_posts()) : $query->the_post();
								$perma = get_permalink($post->ID);
							?>

								<div class="post post<?=$i?> news">
									<h3><a href="<?=$perma ?>" ><?php the_title(); ?></a></h3>
									<p><?php echo get_the_excerpt() ?></p>

								</div> <!--END post post<?=$i?> -->

							<?php
								$i++;
								endwhile;
								endif;
								wp_reset_postdata();
							?>


						<div class="btnwrap">
							<a href="<?=$meta['homepage_news_news_button_url'][0] ?>" class="button orange"><?=$meta['homepage_news_news_button_text'][0] ?></a>
						</div>
					</div>
					<div class="hwrap"></div>

					<div class="blog">
						<h3 class="sectiontitle nocase"><?=$meta['homepage_news_blog_button_title'][0] ?></h3>
							<?php
								$args = array(
									'posts_per_page' => 3,
									'post_type'      => 'blog'
								);
								$i=1;
								$query = new WP_Query( $args );
								if (have_posts()) : while ($query->have_posts()) : $query->the_post();
								$perma = get_post_meta( $post->ID, 'resource_url', true );
								$perma = get_permalink($post->ID);
							?>

								<div class="post post<?=$i?> blog">
									<h3><a href="<?=$perma ?>" ><?php the_title(); ?></a></h3>
									<p><?php echo get_the_excerpt() ?></p>

								</div> <!--END post post<?=$i?> -->

							<?php
								$i++;
								endwhile;
								endif;
								wp_reset_postdata();
							?>


						<div class="btnwrap">
							<a href="<?=$meta['homepage_news_blog_button_url'][0] ?>" class="button orange"><?=$meta['homepage_news_blog_button_text'][0] ?></a>
						</div>
					</div>
				</div>
				</div>  <!-- END .wrapper -->
			</div>  <!-- END .section -->





	</div>  <!-- END #content -->


<!-- End Template: index.php  -->

<?php include ("footer.php") ?>