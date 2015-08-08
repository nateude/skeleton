<?php
/**
 * @package WordPress
 * @subpackage skeleton
 * Template Name: Events Calendar
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: page-events.php  -->

	<div id="content">
		<div class="wrapper">
				<div class="section full text">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<h1 class="pagetitle"><?php the_title(); ?></h1>

						<?php the_content(__('')); ?>
					<?php endwhile; else: endif; ?>
				</div>  <!-- END .section full text -->
				<div class="posts cards grid fourth events_calendar">
				<div class="card_quarter">
						<?php
							$args = array(
								'posts_per_page' => -1,
								'post_type' => 'events',
								'orderby' => 'menu_order',
								'order' => 'DESC'
							);
							$k=1;
							$i=1;
							$query = new WP_Query( $args );
							if (have_posts()) : while ($query->have_posts()) : $query->the_post();
								$event_day = get_post_meta( $post->ID, 'event_day', true );
								$event_month = get_post_meta( $post->ID, 'event_month', true );
								$event_text = get_post_meta( $post->ID, 'event_text', true );
								$event_url = get_post_meta( $post->ID, 'event_url', true );
								$class = "post event post".$i;
						?>


							<div class="<?=$class?> ">
								<?php if ( has_post_thumbnail() ) { echo "<div class='pageImageThumb'><a href='".$event_url."'>"; the_post_thumbnail('thumb'); echo '</a></div>'; }?>
								<div class="content">
									<div class="date">
										<span class="day"><?=$event_day ?></span>
										<span class="month"><?=$event_month ?></span>
									</div>
									<h3><a href="<?=$perma ?>" ><?=$event_text ?></a></h3>
								</div>

							</div> <!--END post post<?=$i?> -->

							<?php
								$k++;
								if($k > 4){$k=1;}
								$i++;
								endwhile;
								endif;
								wp_reset_postdata();
							?>
						</div>

				</div>  <!-- END posts list -->

				<div class="section full on24embded">

					<!--On24 Portal Code-->
					<script src="https://portal.on24.com/view/channel/js/embed.js" data-width="100%" data-height="750" data-url="https://portal.on24.com/vshow/discoverorg/registration?v=channel&showSearchInput=Y&backgroundOpacity=0&portalLayout=carousel"></script>

				</div>  <!-- END posts list -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->

<!-- End Template: page-events.php  -->

<?php include ("footer.php") ?>