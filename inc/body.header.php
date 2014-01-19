<?php
/**
 * Body header/masthead elements
 */
?>

<?php include ("head.php") ?>

<!-- Begin Template: inc/body.header.php  -->

<div class="mainwrapper">

<div class="menu top">
	<div class="wrapper">
		<?php wp_nav_menu( array( 'theme_location' => "Top" ) ); ?>
	</div>  <!-- END .wrapper -->
</div>  <!-- END .menu top -->

<div id="header">
	<div class="wrapper">
		<a href="<?php echo get_option('home'); ?>">
			<img class="logo" src="<?php echo get_bloginfo('template_url'); ?>/img/logo.png" />
		</a>
		<div class="title">
			<a href="<?php echo get_option('home'); ?>">
				<h1><?php bloginfo('name'); ?></h1>
			</a>
			<h2><?php bloginfo('description'); ?></h2>
		</div>  <!-- END .title -->

		<div class="search">
			<?php get_search_form(); ?>
		</div>  <!-- END .search -->

		<div class="social">
			<a class="linkedin" target="_blank" href="#" ></a>
			<a class="twitter" target="_blank" href="#" ></a>
			<a class="facebook" target="_blank" href="#" ></a>
			<a class="youtube" target="_blank" href="#" ></a>
			<a class="rss" target="_blank" href="<?php echo get_option('home'); ?>/feed/" ></a>
		</div>  <!-- END .social -->
	</div> <!-- END .wrapper -->
</div>  <!-- END #header -->

<!-- End Template: inc/body.header.php  -->
