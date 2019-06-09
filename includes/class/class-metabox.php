<?php
/**
 * Use this class to config metaboxes and its custom fields using CMB2 library
 * Please refer to CMB2 official documentation for further details
 *
 * @author  Rendy
 * @package Includes
 * @see     https://github.com/CMB2/CMB2/wiki
 */

namespace Skeleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Skeleton\Metabox' ) ) {
	/**
	 * Class Metabox
	 *
	 * @package Skeleton
	 */
	class Metabox {

		/**
		 * Instance variable
		 *
		 * @var null
		 */
		private static $instance = null;

		/**
		 * Singleton
		 *
		 * @return null|\Skeleton\Metabox
		 */
		public static function init() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Metabox constructor.
		 */
		private function __construct() {
			add_action( 'cmb2_admin_init', [ $this, 'sample_post_metabox_callback' ] );
		}

		/**
		 * Sample metabox configuration
		 */
		public function sample_post_metabox_callback() {
			$cmb2_args = [
				'id'           => 'sample_post_metabox',
				'title'        => __( 'Sample Metabox', 'rendy' ),
				'object_types' => [ 'post' ], // Post type.
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true, // Show field names on the left.
			];
			$cmb2      = new_cmb2_box( $cmb2_args );
			$cmb2->add_field(
				[
					'name' => __( 'Sample Field', 'rendy' ),
					'id'   => 'sample_field',
					'type' => 'text',
				]
			);
		}
	}
}

Metabox::init();
