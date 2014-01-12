<?php
/**
 * @package WordPress
 * @subpackage nateude_skeleton
 * Template Name: Search Form
 */
?>

<!-- Begin Template: searchform.php  -->
<form class="search" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<input type="text" value="" name="s" id="s" placeholder=" Search" />
    <input type="submit" id="searchsubmit" value="Search" />
</form>
<!-- End Template: searchform.php  -->