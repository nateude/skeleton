<?php
/**
 * layout section single coloumn
 */
?>

<!-- Begin Template: inc/layout.col-one.php  -->

	<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(__('')); endwhile; else: endif; ?>

<!-- End Template: inc/layout.col-one.php  -->