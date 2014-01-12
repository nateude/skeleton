skeleton
================================================================

skeleton is a basic starter theme has only the basic theme templates with very few html elements. Includes a simple resposnisce tempalte set up with the base html elements(headers, p, ul, a, etc) with _vars.scss and compass reset pre set.

WordPress templates use a basic layout element include structure with a few base include files pre created in the inc folder.

Functions file include via WordPress jQuery, cycle 2 & cycle 2 carousel are included in libs file and set up in functions.

Responsive CSS Layout base on a small, medium, large  style sheet set up wth media queries in the include and a screen .scss for gloabl styles, plus ie.scss for IE fix styles.


Template Section Options
-----------------------------------------------------------
the following are pre created tempalte sections that can be use on any template page, all files are located in inc/.

head.php
	base html head section with css setup, and basic PHP user agent tester
*body.header.php
	Basic header layout section for logo, contact info etc
*body.footer.php
	basic footer element with menu, widget section and info with copyright

layout.col-one.php
	one coloumn full width content section
layout.col-two.php
	two coloumn full width content section use [col-2] shortcode to break in content
layout.posts.php
	full width post section # of posts based on default WP setting. use "categories" custom field to add or remove  categories from posts section, comma seperated list use negative to hid, postive to restrict. E.G. "-3" would remove category 3 from posts while "3" would show only category 3
*layout.sidebar.php
	sidebar with widgets
*layout.widget.php
	in page content section (add new widget code to functions)

*visual.slider.php
	basic cycle 2 responsive slider, option to show text. Banner defualts to "banner" category and max of 5 posts.
*visual.slider-carousel.php
	cycle 2 responsive slider with caruousel image pager
*visual.slider-static.php
	static image banner, option to show text


Template Scripts
-----------------------------------------------------------
*Responsive Banner image resize
*Animated hover menu (with CSS hover back up)
*Mobile/Tablet tap menu

Download from http://jquery.malsup.com/cycle2/
	libs/jquery.cycle2.min.js
	libs/jquery.cycle2.carousel.min.js

CSS Files
-----------------------------------------------------------
basic compass command script pre installed w compas & sass installed run "compass watch" for css out put visit compass-style.org for more infomation or to update. Comapss reset pre set in screen.scss

screen.scss
large.scss
medium.scss
small.scss
ie.scss
_vars.scss

Images
-----------------------------------------------------------
pre set img/ for image libraries


================================================================
*items not completed or not yet created
