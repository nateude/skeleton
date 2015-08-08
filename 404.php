<?php
/**
 * @package WordPress
 * @subpackage skeleton
 */
?>

<?php include ("header.php") ?>

<!-- Begin Template: 404.php  -->
	<div id="content">
		<div class="wrapper">
			<div class="section twothird left">
				<div class="section full text">
					<h1 class="pagetitle">We&#8217;re sorry the page you are looking for is unavailable.</h1>

					<p>Please explore other sections of the site to find related information:</p>
					<ul>
						<li><a href="<?php echo get_option('home'); ?>/discoverorg-sales-intelligence-platform/">Our Platform</a></li>
						<li><a href="<?php echo get_option('home'); ?>/who-we-serve/" target="_blank">Who We Serve</a></li>
						<li><a href="<?php echo get_option('home'); ?>/our-results/" target="_blank">Our Results</a></li>
						<li><a href="<?php echo get_option('home'); ?>/resources-center/" target="_blank">Resource Center</a></li>
						<li><a href="<?php echo get_option('home'); ?>/about-us/" target="_blank">About Us</a></li>
						<li><a href="<?php echo get_option('home'); ?>/careers/" target="_blank">Careers</a></li>
						<li><a href="<?php echo get_option('home'); ?>/about-us/contact-us-locations/" target="_blank">Contact Us</a></li>
					</ul>
				</div>  <!-- END .section full text -->
			</div>  <!-- END .section twothird -->
			<div class="section onethird right sidebar">
				<div class="full widgets list">
					<div class="widget widget_cta  cta cta1">
						<h2><a href="<?php echo get_option('home'); ?>/sales-and-marketing-tools-resource-center/">Explore resources to improve your marketing and sales teams.</a></h2>
						<a class="button" href="<?php echo get_option('home'); ?>/sales-and-marketing-tools-resource-center/" target="">Resource Center</a>
					</div>
					<div class="widget widget_cta  cta cta2">
						<h2><a href="<?php echo get_option('home'); ?>/discoverorg-sales-intelligence-platform/free-data/">Find the right contact data for your marketing campaign.</a></h2>
						<a class="button" href="<?php echo get_option('home'); ?>/discoverorg-sales-intelligence-platform/free-data/" target="">Request Free Data</a>
					</div>
				</div>  <!-- END .section -->
			</div>  <!-- END .section onethird -->
		</div>  <!-- END .wrapper -->
	</div>  <!-- END #content -->



<!-- End Template: 404.php  -->

<?php include ("footer.php") ?>