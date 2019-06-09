<?php
/**
 * Main file to write custom php codes
 *
 * @author  Rendy
 * @package Includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define the constanta.
defined( 'TEMP_DIR' ) || define( 'TEMP_DIR', get_template_directory() );
defined( 'TEMP_URI' ) || define( 'TEMP_URI', get_template_directory_uri() );
defined( 'TEMP_PATH' ) || define( 'TEMP_PATH', get_theme_file_path() );

// Require our main class.
require_once TEMP_PATH . '/includes/class/class-skeleton.php';
