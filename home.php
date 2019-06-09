<?php
/**
 * Template for displaying blog post
 *
 * @author  Rendy
 * @package Pages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// We want to make it simple, our post list page will be identical with archive page, so we `render` archive page directly in our post list page.
get_template_part( 'archive' );
