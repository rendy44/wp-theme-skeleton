<?php
/**
 * Custom template for displaying top navbar
 *
 * @author  Rendy
 * @package Components
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<div class="container">
        <a class="navbar-brand" href="<?php echo home_url(); // phpcs:ignore ?>"><?php echo $site_name; // phpcs:ignore ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#skeletonNavBar" aria-controls="skeletonNavBar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<?php
		if ( has_nav_menu( 'main_nav' ) ) {
			wp_nav_menu(
				[
					'theme_location'  => 'main_nav',
					'depth'           => 2,
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'skeletonNavBar',
					'menu_class'      => 'navbar-nav mr-auto',
					'walker'          => new Navwalker(),
				]
			);
		}
		?>
	</div>
</nav>
