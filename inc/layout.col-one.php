<?php
/**
 * layout section single coloumn
 */
?>

<!-- Begin Template: inc/layout.col-one.php  -->

<div class="section full">
	<div class="wrapper">
		<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(__('')); endwhile; else: endif; ?>
	</div>  <!-- END .wrapper -->
</div>  <!-- END .section full -->

<!-- End Template: inc/layout.col-one.php  -->