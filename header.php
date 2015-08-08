<!doctype html>
<html>
<head>

	<?php
		// retrieve meta array for page
		$meta = get_post_meta( get_the_ID() );
	?>

	<meta charset=utf-8>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
	<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url'); ?>/favicon.ico">

    <?php wp_head(); ?>

    <?php
    	$template_name = basename(get_page_template());
    	$template_name = substr($template_name, 0, -4);
    ?>

</head>
<body class="template_<?=$template_name ?>">

<div class="mainwrapper">

	<div class="masthead">
		<div class="wrapper">

			<div class="widgets">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Masthead') ) {} ?>
			</div>  <!-- END .widget menu top -->
		</div>  <!-- END .wrapper -->
	</div> <!-- END Wrapper -->

	<div class="menu main <?php if ( is_user_logged_in() ) { ?>logedin<?php } ?>">
		<div class="wrapper">
			<div class="logo"><a href="<?php echo get_option('home'); ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/img/nateude-design-logo.png" alt="Nate Ude Design Logo"></a></div>
			<div class="menubttn mobilebutton">MENU</div>
			<?php wp_nav_menu( array( 'theme_location' => "main-menu" ) ); ?>
		</div> <!-- END .wrapper -->
	</div>  <!-- END .menu main -->

<!-- End Template: header.php  -->