<?php
/**
 * @package WordPress
 * @subpackage skeleton
 * Template Name: Page Resources Overview
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: page-resources.php  -->

	<div id="content">

		<div class="section full text">
			<div class="wrapper">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h1 class="pagetitle"><?php the_title(); ?></h1>

					<?php the_content(__('')); ?>
				<?php endwhile; else: endif; ?>
			</div>  <!-- END .wrapper -->
		</div>  <!-- END .section full text -->
			<?php
				function buildOptions($term,$default){
					$types = get_terms($term);
					$options = "<option value='false'>".$default."</option>";
					array('none' => $defualt);
					foreach ($types as $value) {
						$options .= "<option value='".$value->slug."'>".$value->name."</option>";
					}
					return $options;
				}
				function getTerms($id){
					$terms = wp_get_post_terms($id, 'content_tags');
					$classes ="";
					foreach ($terms as $key => $value) {
						$classes .= " tags-".$value->slug;
					}
					$terms = wp_get_post_terms($id, 'resource_types');
					foreach ($terms as $key => $value) {
						$classes .= " type-".$value->slug;
					}
					return $classes;
				}
			?>
		<div class="section full search graylt">
			<div class="wrapper">
				<div class="srch_resources">
				<div class="inputwrap first">
					<label for="type"></label>
					<select class="type" name="type" id="type">
						<?php echo buildOptions('resource_types','All Resource Types') ?>
					</select>
				</div>
				<div class="inputwrap middle">
					<label for="tags"></label>
					<select class="tags" name="tags" id="tags">
						<?php echo buildOptions('content_tags','All Topics') ?>
					</select>
				</div>
				<div class="inputwrap last">
					<label for="search"></label>
					<input class="search" id="search" name="search" type="text" placeholder="Search" value="">
				</div>
				</div>
			<script>
				jQuery(document).ready(function($) {
					function tar(){
						searchfilter()
						var type = $('select.type').val();
						var tags = $('select.tags').val();
						var tar = ".search-true";
						if(type != 'false') {tar += ".type-"+type;}
						if(tags != 'false') {tar += ".tags-"+tags;}

						var count = $('.resource_search '+tar).length;
						if(count < 1){$('p.message').html('There are no results for your search.');}else{$('p.message').html('');}

						$('.resource_search .post').not(tar).slideUp(600);
						$(tar).slideDown(600);

						$('.resource_search').slideDown(500);
					}

					function searchfilter(){
						var search = $('input.search').val().toLowerCase();
						if(search.length > 0){
							$('.resource_search .post').each(function(index, el) {
								var title = $(this).find('.title').html().toLowerCase();
								// console.log(title);
								if (title.indexOf(search) >= 0){
									$(this).addClass('search-true');
								}else if(title.indexOf(search) <= 0){
									$(this).removeClass('search-true');
								}
							});
						}else{
							$('.resource_search .post').addClass('search-true');
						}
					}
					$(document).on('change', '.srch_resources select', function(event) {
						event.preventDefault();
							tar();
					});

					$(document).on('keyup', '.srch_resources input.search', function(event) {
						event.preventDefault();
						tar();
					});
				});
			</script>
			</div>
		</div>  <!-- END .section full search -->

		<div class="section full posts cards resource_search nopadding">
		

		<?php

			$cards = "";

			$i = 1;
			while ($i <= 9) { ?>
				<?php if($meta['resources_section_'.$i.'_display'][0] != 'hide'){ ?>
				<div class="section posts_<?=$i ?> full posts cards <?=$meta['resources_section_'.$i.'_type'][0]?> <?=$meta['resources_section_'.$i.'_color'][0]?>">
					<div class="wrapper">
						<h2 class="sectiontitle"><?=$meta['resources_section_'.$i.'_title'][0]?></h2>
						<p class="intro"><?=$meta['resources_section_'.$i.'_text'][0]?></p>
						<div class="card_<?=$meta['resources_section_'.$i.'_class'][0]?>">
						<?php

						switch ($meta['resources_section_'.$i.'_class'][0]) {
							case 'half': $row = 2; break;
							case 'third': $row = 3; break;
							case 'quarter': $row = 4; break;
							case 'fifth': $row = 5; break;
							default: $row = 1; break;
						}

						if($meta['resources_section_'.$i.'_type'][0] == 'blog'){
							$args = array('posts_per_page' => $meta['resources_section_'.$i.'_count'][0], 'post_type' => 'blog');
						}elseif($meta['resources_section_'.$i.'_type'][0] == 'webinar'){
							$args = array(
								'posts_per_page' => $meta['resources_section_'.$i.'_count'][0],
								'post_type' => 'events',
								'tax_query' => array(
									array(
										'taxonomy' => 'event_types',
										'field'    => 'slug',
										'terms'    => 'webinar'
									),
								),
							);
						}else{
							$args = array(
								'posts_per_page' => $meta['resources_section_'.$i.'_count'][0],
								'post_type' => 'resource',
								'tax_query' => array(
									array(
										'taxonomy' => 'resource_types',
										'field'    => 'slug',
										'terms'    => $meta['resources_section_'.$i.'_type'][0]
									),
								),
							);
						}
							$j = 1;
							$k = 1;
							$query = new WP_Query( $args );
							if (have_posts()) : while ($query->have_posts()) : $query->the_post();
							$resource_url = get_post_meta( $post->ID, 'resource_url', true );
							if($resource_url == false){$resource_url = get_post_meta( $post->ID, 'event_url', true );}
							if($resource_url == false){$resource_url = get_permalink($post->ID);}
							$class = "post post".$j;
							if($k == 1) $class .=" first";
							if($k == $row) $class .=" last";
							?>

							<div class="<?=$class ?>">
								<div class="pageImageThumb" >
									<a href="<?=$resource_url ?>" rel="bookmark">
										<?php if ( has_post_thumbnail() ) { the_post_thumbnail('resource'); }?>
									</a>
								</div>
								<div class="content">
									<h2 class="title"><a href="<?=$resource_url ?>" ><?php the_title(); ?></a></h2>
									<?php if($meta['resources_section_'.$i.'_class'][0] == 'full'){ ?>
										<?php the_content(__('')); ?>
									<?php }else{ ?>
										<p><?php echo get_the_excerpt(); ?></p>
									<?php } ?>

									<a href="<?=$resource_url ?>">Read More</a>
								</div>
							</div> <!--END post post<?=$j?> -->

							<?php
								$k++;
								if($k > $row) $k = 1;
								$j++;
								endwhile;
								endif;
								wp_reset_postdata();
							?>
						</div>  <!-- END .card_onethird -->
					</div>  <!-- END .wrapper -->
				</div> <!-- END .section posts_<?=$i ?> full posts cards <?=$meta['resources_section_'.$i.'_type'][0]?> <?=$meta['resources_section_'.$i.'_color'][0]?> -->
				 <?php }?>
			<?php
				$i++;
			}

		?>


	</div>  <!-- END #content -->

<!-- End Template: page-resources.php  -->

<?php include ("footer.php") ?>


