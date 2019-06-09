<?php
/**
 * Template for displaying sidebar
 *
 * @author  Rendy
 * @package Template Part
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_active_sidebar( 'sk_sidebar' ) ) {
	echo '<div class="col-md-4">';
	dynamic_sidebar( 'sk_sidebar' );
	echo '</div>';
}
