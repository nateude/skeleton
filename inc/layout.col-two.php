<?php
/**
 * layout section two coloumn
 */
?>

<!-- Begin Template: inc/layout.col-two.php  -->

<div class="section full">
	<div class="wrapper">
		<div class="left">
			<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(__('')); endwhile; else: endif; ?>
		</div>  <!-- END .right -->
	</div>  <!-- END .wrapper -->
</div>  <!-- END .section full -->

<!-- End Template: inc/layout.col-two.php  -->