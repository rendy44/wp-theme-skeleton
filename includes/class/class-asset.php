<?php
/**
 * Use this class to enqueuing assets both in front-end and back-end
 *
 * @author  Rendy
 * @package Includes
 */

namespace Skeleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '\Skeleton\Asset' ) ) {
	/**
	 * Class Asset
	 *
	 * @package Skeleton
	 */
	class Asset {

		/**
		 * Instance variable
		 *
		 * @var null
		 */
		private static $instance = null;
		/**
		 * Theme version variable.
		 *
		 * @var string
		 */
		private $version = '';
		/**
		 * Variable to map all css in front-end
		 *
		 * @var array
		 */
		private $front_css = [];
		/**
		 * Variable to map all js in front-end
		 *
		 * @var array
		 */
		private $front_js = [];

		/**
		 * Singleton
		 *
		 * @return null|\Skeleton\Asset
		 */
		public static function init() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Asset constructor.
		 */
		private function __construct() {
			$theme_object  = wp_get_theme();
			$this->version = $theme_object->get( 'Version' );
			$this->load_front_asset();
		}

		/**
		 * Mapp all assets that will be loaded in front end
		 */
		private function map_front_asset() {
			// CSS files.
			$this->front_css = [
				'bootstrap' => [
					'url' => TEMP_URI . '/assets/vendor/bootstrap/dist/css/bootstrap.min.css',
				],
				'remixicon' => [
					'url' => TEMP_URI . '/assets/vendor/remixicon/remixicon.css',
				],
				'app'       => [
					'url' => TEMP_URI . '/assets/css/app.css',
				],
			];

			// JS files.
			$this->front_js = [
				'bootstrap' => [
					'url' => TEMP_URI . '/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
				],
				'app'       => [
					'url'   => TEMP_URI . '/assets/js/app.js',
					'vars'  => [
						'ajax_url' => admin_url( 'admin-ajax.php' ),
					],
					'depth' => [ 'jquery' ],
				],
			];
		}

		/**
		 * Load all assets in front-end
		 */
		private function load_front_asset() {
			$this->map_front_asset();
			add_action( 'wp_enqueue_scripts', [ $this, 'front_asset_callback' ] );
		}

		/**
		 * Callback for loading front end assets
		 */
		public function front_asset_callback() {
			// Load all css files.
			foreach ( $this->front_css as $css_name => $css_obj ) {
				wp_enqueue_style( $css_name, $css_obj['url'], [], $this->version );
			}

			// Load all js files.
			foreach ( $this->front_js as $js_name => $js_obj ) {
				$depth = ! empty( $js_obj['depth'] ) ? $js_obj['depth'] : [];
				wp_enqueue_script( $js_name, $js_obj['url'], $depth, $this->version, true );
				if ( isset( $js_obj['vars'] ) ) {
					wp_localize_script( $js_name, 'obj', $js_obj['vars'] );
				}
			}
		}
	}
}

Asset::init();
