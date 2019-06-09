<?php
/**
 * Simple helper class to render php file into output buffer
 *
 * @author  Rendy
 * @package Helpers
 */

namespace Skeleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '\Skeleton\Template' ) ) {

	/**
	 * Class Template
	 *
	 * @package Skeleton
	 */
	class Template {

		/**
		 * Folder name variable
		 *
		 * @var string
		 */
		private static $folder = '';

		/**
		 * Set template folder
		 */
		private static function set_folder() {
			$folder = TEMP_PATH . '/templates';
			if ( $folder ) {
				// normalize the internal folder value by removing any final slashes.
				self::$folder = rtrim( $folder, '/' );
			}
		}

		/**
		 * Check template file existence
		 *
		 * @param string $file_name template file name.
		 *
		 * @return bool|string
		 */
		private static function find_template( $file_name ) {
			self::set_folder();
			$found = false;
			$file  = self::$folder . "/{$file_name}.php";
			if ( file_exists( $file ) ) {
				$found = $file;
			}

			return $found;
		}

		/**
		 * @param string $template  template file path.
		 * @param array  $variables variables that will be injected into template file.
		 *
		 * @return string
		 */
		private static function render_template( $template, $variables = [] ) {
			ob_start();
			foreach ( $variables as $key => $value ) {
				${$key} = $value;
			}
			include $template;

			return ob_get_clean();
		}

		/**
		 * Render the template
		 *
		 * @param string $file_name template file name.
		 * @param array  $variables variables that will be injected into template file.
		 *
		 * @return string
		 */
		public static function render( $file_name, $variables = [] ) {
			$template = self::find_template( $file_name );
			$output   = '';
			if ( $template ) {
				$output = self::render_template( $template, $variables );
			}

			return $output;
		}
	}
}
