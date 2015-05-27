<?php
/**
 * javascript functions file
 */
?>

<!-- Begin Template: libs/scripts.php  -->
<script type="text/javascript">
jQuery(document).ready(function($) {
	//main scripts inc

	//global funtion to get repeated heights and widths for window & header
	function wd(v){
		var ww = jQuery(window).width();
		var wh = jQuery(window).height();
		var n = jQuery('#header').height();
		var win = {'w':ww, 'h':wh, 'n':n}
		return win;
	}

	function stickySidebar(tg, tt){
		var h = jQuery(tg).outerHeight();
		var t = jQuery(window).scrollTop();
		console.log('h: '+h);
		var o = t-tt+60;
		var mh = t+h;
		var bh = jQuery('#content').height();
		if (t > tt && h < wd().h && mh < bh && wd().w > 1023){
			jQuery(tg).addClass('stuck');
			jQuery(tg).css('top', o);
		} else if(t > tt && h < wd().h && mh > bh && wd().w > 1023){
		}else{
			jQuery(tg).removeClass('stuck');
			jQuery(tg).css('top', 0);
		}
	}

	function stickyHeader(tg, tt){
		if(wd().w > 1100){
			var  tt = tt;
			var  h = tt+100;
			var t = jQuery(window).scrollTop();
			if (t > tt && t < h && wd().w > 1023){
				jQuery('#header').addClass('stuck stage');
				jQuery('#header #logosmall').attr('src', '<?php echo get_bloginfo("template_url"); ?>/img/firm58-logo-white.png');
				//jQuery('#content').css('margin-top', tt);
			} else if (t > h && wd().w > 1023){
				jQuery('#header').addClass('stuck').removeClass('stage');
				jQuery('#header #logosmall').attr('src', '<?php echo get_bloginfo("template_url"); ?>/img/firm58-logo-white.png');
				//jQuery('#content').css('margin-top', tt);
			}else{
				jQuery('#header').removeClass('stuck').removeClass('stage');
				jQuery('#header #logosmall').attr('src', '<?php echo get_bloginfo("template_url"); ?>/img/firm58-logo.png');
				//jQuery('#content').css('margin-top', 0);
			}
		}else{
			jQuery('#header').removeClass('stuck').removeClass('stage');
				jQuery('#header #logosmall').attr('src', '<?php echo get_bloginfo("template_url"); ?>/img/firm58-logo.png');
				//jQuery('#content').css('margin-top', 0);
		}
	}
	function responCatmenu(){
		// global sidebar fix for small screens
		var category = jQuery('.sidebar .categorymenu').html();
		if(typeof category !== 'undefined'){
			var menu = '<div class="right categorymenu">'+category+'</div>';
			jQuery('.sidebar .categorymenu').remove();
			if(wd().w < 768){ jQuery('.sidebar').append(menu); }
			else{ jQuery('.sidebar').prepend(menu); }
		}
	}

	//check positions on load
	if(jQuery('.sidebar.sticky').length){
		var sm = jQuery('.sidebar.sticky').offset().top;
		stickySidebar('.sidebar.sticky');
		stickyHeader('#header', hh);
	}
	responCatmenu();

	var hh = wd().n
	jQuery(window).scroll(function() {
		stickySidebar('.sidebar.sticky', sm);
		stickyHeader('#header', hh);
	});

	jQuery(window).resize(function() {
		stickySidebar('.sidebar.sticky', sm);
		responCatmenu();
	});

	//main menu scripts
	$('li.menu-item-has-children a').not('ul.sub-menu a').addClass('has-child');

	$('li.menu-item-has-children').each(function(index, el) {
		var a = $(el).find('a.has-child').html();
		var u = $(el).find('a.has-child').attr('href');
		if(typeof a !== "undefined"){
			$(el).find('ul.sub-menu').not('ul.sub-menu ul.sub-menu').prepend('<li class="overview"><a href="'+u+'">'+a+' Overview</a></li>');
		}
	});

	$('.masthead ul.menu li').each(function(index, el) {
		var a = $(el).find('a').html();
		var u = $(el).find('a').attr('href');
		if(typeof a !== "undefined"){
			$('.menu-main-menu-container ul.menu').append('<li class="overview"><a href="'+u+'">'+a+'</a></li>');
		}
	});

	$(document).on('click', '.mobilebutton', function(event) {
		event.preventDefault();
		/* Act on the event */
		$('.menu-main-menu-container').toggleClass('mobile');
	});
	$(document).on('click', '.mobile a.has-child', function(event) {
		event.preventDefault();
		/* Act on the event */
		$(this).toggleClass('active').siblings('ul.sub-menu').toggleClass('active');
	});

	//global get check

	<?php if($_GET){
		foreach ($_GET as $key => $value) {
			if((substr($key, 0, 3) === 'sf_')) echo "$('#".$key."').val('".$value."');";
		}
	} ?>


});

</script>

<!-- end Template: libs/scripts.php  -->
