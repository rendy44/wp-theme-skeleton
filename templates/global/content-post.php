<?php
/**
 * Custom template for displaying post content list
 *
 * @author  Rendy
 * @package Components
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div class="col-12 col-sm-6 post-list">
	<div class="card h-100">
		<div class="card-body">
			<?php echo '<a href="' . get_permalink() . '"><h3>' . get_the_title() . '</h3></a>'; // phpcs:ignore ?>
			<p><?php the_excerpt(); ?></p>
		</div>
	</div>
</div>
