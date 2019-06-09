<?php
/**
 * Template for displaying search result
 *
 * @author  Rendy
 * @package Pages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// We want to make it simple, our search result page will be identical with archive page, so we `render` archive page directly in our search result page.
get_template_part( 'archive' );
