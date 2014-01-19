<?php
	//Set & Device Type & Body Classes

	//Check user agents & convert to lowercase
	$userAgentraw = $_SERVER['HTTP_USER_AGENT'];
	$userAgent = strtolower ( $userAgentraw );

	//logic to check for stings
	$ipadAgent    = strpos($userAgent, "ipad");
	$iphoneAgent  = strpos($userAgent, "iphone");
	$androidAgent = strpos($userAgent, "android");
	$mobileAgent  = strpos($userAgent, "mobile");
	$tabletAgent  = strpos($userAgent, "tablet");

	//Logic to set variable base on user agent, note any device without specifications should output desktop
	if($ipadAgent == true){
		$deviceType = "tablet";
	}elseif($androidAgent == true && $mobileAgent == false){
		$deviceType = "tablet";
	}elseif($tabletAgent  == true){
		$deviceType = "tablet";
	}elseif($mobileAgent  == true){
		$deviceType = "mobile";
	}else{
		$deviceType = "desktop";
	}
?>

<!doctype html>
<html>
<head>

	<meta charset=utf-8>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php //get meta title from meta data else set pagename | blog name

		if(is_page('blog')) {
			$metaTitle = get_bloginfo('name');
		}else{
			$metaTitle = get_post_meta(get_the_ID(), 'meta_title', true);
				if(!$metaTitle) $metaTitle = get_the_title();
				if($metaTitle) $metaTitle .= " | ".get_bloginfo('name');
				if(!$metaTitle) $metaTitle = get_bloginfo('name');
		}

		$metaDesc = get_post_meta(get_the_ID(), 'meta_description', true);
			if(!$metaDesc) $metaDesc =  get_bloginfo('description');
			if($metaDesc) $metaDesc =  "<meta name='description' content='".$metaDesc."'>";

		$metaAuthor = get_the_author();
			if($metaAuthor) $metaAuthor =  "<meta name='description' content='".$metaAuthor."'>";

		$metaKey = get_post_meta(get_the_ID(), 'meta_keywords', true);
			if($metaKey) $metaKey = "<meta name='keywords' content='".$metaKey."' >";
	?>

	<title><?=$metaTitle ?></title>
	<?=$metaDesc ?>
	<?=$metaKey ?>
	<?=$metaAuthor ?>

	<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url'); ?>/favicon.ico">

	<!-- Include Global & Font Sheets for All devices  -->
	<link href='http://fonts.googleapis.com/css?family=Italiana|Open+Sans:400italic,400,300,700|Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/styles/screen.css" />

	<!-- Include Device Style Sheets --><!--[if !IE]> -->
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/styles/large.css" media="only screen and (min-width: 768px)" />
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/styles/medium.css" media="only screen and (max-width: 1023px) and (min-width: 768px)" />
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/styles/small.css" media="only screen and (max-width: 767px)" />
	<!-- <![endif]-->

	<!--[if lt IE 9]> <link rel="stylesheet" type="text/css" href="stylesheets/ie.css" /> <![endif]-->

    <?php wp_head(); ?>

</head>

<body>
<!-- END Template: inc/head.php  -->