<?php
/**
 * Custom template for displaying feature section in front page
 *
 * @author  Rendy
 * @package Components
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<section class="bg-white feature">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto text-center">
                <h2 class="font-weight-light"><?php echo $title; // phpcs:ignore ?></h2>
				<hr class="divider"/>
                <p class="lead"><?php echo $content; // phpcs:ignore ?></p>
			</div>
		</div>
		<div class="row mt-5">
			<?php
			if ( ! empty( $items ) ) {
				foreach ( $items as $item ) {
					?>
					<div class="col-lg-3 col-md-4 col-sm-6 col-12 text-center feature-item">
                        <i class="remixicon-<?php echo $item['icon']; // phpcs:ignore ?>"></i>
                        <h4 class="font-weight-light"><?php echo $item['title']; // phpcs:ignore ?></h4>
                        <p class="text-justify"><?php echo $item['desc']; // phpcs:ignore ?></p>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</section>
