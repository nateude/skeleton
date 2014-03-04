<!doctype html>
<html>
<head>

	<meta charset=utf-8>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
	<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url'); ?>/favicon.ico">

	<!-- Include Global & Font Sheets for All devices  -->
	<link href='http://fonts.googleapis.com/css?family=Italiana|Open+Sans:400italic,400,300,700|Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/styles/screen.css" />
	<!--[if lt IE 9]> <link rel="stylesheet" type="text/css" href="stylesheets/ie.css" /> <![endif]-->

    <?php wp_head(); ?>

</head>
<body>
<div class="mainwrapper">

	<div class="menu top">
		<div class="wrapper">
			<?php wp_nav_menu( array( 'theme_location' => "top-menu" ) ); ?>
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

<!-- End Template: header.php  -->
