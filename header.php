<!doctype html>
<html>
<head>

	<meta charset=utf-8>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
	<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url'); ?>/favicon.ico">

	<!-- Include Global & Font Sheets for All devices  -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700|Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/styles/screen.css" />
	<!--[if lt IE 9]> <link rel="stylesheet" type="text/css" href="stylesheets/ie.css" /> <![endif]-->

    <?php wp_head(); ?>

</head>
<body>
<div class="mainwrapper">

	<div class="masthead">
		<div class="wrapper">
			<div class="widgets">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Widgets') ) {} ?>
			</div>  <!-- END .widget menu top -->
		</div>  <!-- END .wrapper -->
	</div> <!-- END Wrapper -->

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
		</div> <!-- END .wrapper -->
	</div>  <!-- END #header -->

<!-- End Template: header.php  -->

<div class="menu main">
	<div class="wrapper">
		<?php wp_nav_menu( array( 'theme_location' => "main-menu" ) ); ?>
	</div> <!-- END .wrapper -->
</div>  <!-- END .menu main -->