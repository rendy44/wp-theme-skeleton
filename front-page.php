<?php
/**
 * Template for displaying front page
 *
 * @author  Rendy
 * @package Pages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Render masthead.
echo \Skeleton\Template::render( // phpcs:ignore
	'front/masthead',
	[
		'title'        => get_bloginfo( 'name' ),
		'description'  => get_bloginfo( 'description' ),
		'download_url' => 'https://github.com/rendy44/wp-theme-skeleton',
	]
);

// Render feature section.
echo \Skeleton\Template::render( // phpcs:ignore 
	'front/feature',
	[
		'title'   => __( 'Why WP Theme Skeleton?', 'rendy' ),
		'content' => __( 'Ahh nothing special, just a skeleton theme for developing WordPress theme with bootstrap 4. That`s it.!', 'rendy' ),
		'items'   => [
			[
				'title' => __( 'WPCS Compliant', 'rendy' ),
				'icon'  => 'checkbox-circle-line',
				'desc'  => __( 'Written in beautiful and easy to read code structure by passing WordPress Coding Standards.', 'rendy' ),
			],
			[
				'title' => __( 'Easy Template', 'rendy' ),
				'icon'  => 'file-copy-2-line',
				'desc'  => __( 'Provided with a super simple template system to help you gain easier maintainability.', 'rendy' ),
			],
			[
				'title' => __( 'No Charge', 'rendy' ),
				'icon'  => 'money-dollar-circle-line',
				'desc'  => __( 'This is not a one man show, this is open source under MIT license which means everyone can use it.', 'rendy' ),
			],
			[
				'title' => __( 'Crafted With Love', 'rendy' ),
				'icon'  => 'heart-line',
				'desc'  => __( 'Last but not least, no need further explanation tho, you already know this means :).', 'rendy' ),
			],
		],
	]
);

get_footer();
