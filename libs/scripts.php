<?php
/**
 * javascript functions file
 */
?>

<!-- Begin Template: libs/scripts.php  -->
<script type="text/javascript">

	//global funtion to get repeated heights and widths for window & header
	function wd(v){
		var ww = jQuery(window).width();
		var wh = jQuery(window).height();
		var win = {'w':ww, 'h':wh}
		return win;
	}

	function stickySidebar(tg, tt){
		var h = jQuery(tg).outerHeight();
		var t = jQuery(window).scrollTop();
		var o = t-tt+60;
		var mh = t+h;
		var bh = jQuery('#content').height();

		if (jQuery('.section.tagged').length){
			bh =  bh - jQuery('.section.tagged').outerHeight();
		}

		if (t > tt && h < wd().h && mh < bh && wd().w > 1023){
			jQuery(tg).addClass('stuck');
			jQuery(tg).css('top', o);
		} else if(t > tt && h < wd().h && mh > bh && wd().w > 1023){
		}else{
			jQuery(tg).removeClass('stuck');
			jQuery(tg).css('top', 0);
		}
	}
	<?php if ( is_page_template( 'front-page.php' ) ) {$val = 300;}else{ $val = 100;} ?>

	function stickyHeader(tg, tt){
		if(wd().w > 1100){
			var tt = parseInt(tt)+<?=$val?>;
			var h = parseInt(tt)+100;
			var t = jQuery(window).scrollTop();
			if (t > tt && t < h && wd().w > 1023){
				jQuery(tg).addClass('stuck stage');
			} else if (t > h && wd().w > 1023){
				jQuery(tg).addClass('stuck').removeClass('stage');
			}else{
				jQuery(tg).removeClass('stuck').removeClass('stage');
			}
		}else{
			jQuery(tg).removeClass('stuck').removeClass('stage');
		}
	}

jQuery(document).ready(function($) {
	//main scripts inc

	//check positions on load
	if(jQuery('.sidebar').length){
		var sm = jQuery('.sidebar').offset().top;
		stickySidebar('.sidebar');
		stickyHeader('.menu.main', hh);
	}
	// responCatmenu();

	var hh = jQuery('.main.menu').offset().top;
	jQuery(window).scroll(function() {
		stickySidebar('.sidebar', sm);
		stickyHeader('.menu.main', hh);
	});

	jQuery(window).resize(function() {
		stickySidebar('.sidebar', sm);
		// responCatmenu();
	});

	$('li.menu-item-has-children a').not('ul.sub-menu a').addClass('has-child');


	// aml
		// 1 - mobile menu
	$(function(){
		$('ul.menu').find('li').has('ul').addClass('menu-item-has-children');
		$('ul.menu').find('ul').addClass('sub-menu').before('<div class="click"></div>');
		$('ul#menu-main-menu').find('ul li ul').addClass('decendant');

		$(document).on('click', '.click', function(event) {
			event.preventDefault();
			$(this).toggleClass('active').siblings('ul.sub-menu').toggleClass('active').slideToggle();
		})
	})
		// 2 - resource slider height match
	$(function() {
		var byRow = $('.resource-slider').hasClass('height-match');
		$('.resource-slider').each(function() {
            $(this).children('.post').matchHeight({
            	byRow: byRow
            });
        });
	});
// end aml




	$(document).on('click', '.menubttn.mobilebutton', function(event) {
		event.preventDefault();
		/* Act on the event */
		$('.menu-main-menu-container').toggleClass('mobile');
		$(this).toggleClass('active');
	});
	$(document).on('click', '.mobile a.has-child', function(event) {
		event.preventDefault();
		/* Act on the event */
		$(this).toggleClass('active').siblings('ul.sub-menu').toggleClass('active');
	});
});

</script>

<!-- end Template: libs/scripts.php  -->
