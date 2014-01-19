<?php
/**
 * layout section two coloumn
 */
?>

<!-- Begin Template: inc/layout.col-two.php  -->

	<div class="section left half">
		<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(__('')); endwhile; else: endif; ?>
	</div>  <!-- END .right -->

<!-- End Template: inc/layout.col-two.php  -->