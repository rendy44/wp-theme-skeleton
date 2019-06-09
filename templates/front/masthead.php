<?php
/**
 * Custom template for displaying masthead in front page
 *
 * @author  Rendy
 * @package Components
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<header class="masthead">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12 text-center">
                <h1 class="font-weight-light"><?php echo $title; // phpcs:ignore ?></h1>
                <h2 class="font-weight-light"><?php echo $description; // phpcs:ignore ?></h2>
                <a href="<?php echo $download_url; // phpcs:ignore ?>" class="mt-5 btn btn-primary btn-lg text-uppercase" target="_blank">Download Now</a>
			</div>
		</div>
	</div>
</header>
