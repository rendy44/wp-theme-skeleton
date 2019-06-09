<?php
/**
 * Default template for displaying page content
 *
 * @author  Rendy
 * @package Pages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

set_query_var( 'column-size', 'col-lg-12' );
// We want to make it simple, our default page will be identical with single page, so we `render` single page directly in our default page.
get_template_part( 'single' );
