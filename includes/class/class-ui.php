<?php
/**
 * Use this class to define default layout, such as header and footer
 *
 * @author  Rendy
 * @package Includes
 */

namespace Skeleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '\Skeleton\UI' ) ) {

	/**
	 * Class UI
	 *
	 * @package Skeleton
	 */
	class UI {

		/**
		 * Instance variable
		 *
		 * @var null
		 */
		private static $instance = null;

		/**
		 * Singleton
		 *
		 * @return null|\Skeleton\UI
		 */
		public static function init() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * UI constructor.
		 */
		private function __construct() {
			add_action( 'sk_header_content', [ $this, 'header_open_tag_callback' ], 10 );
			add_action( 'sk_header_content', [ $this, 'maybe_small_header_callback' ], 15 );
			add_action( 'sk_header_content', [ $this, 'header_navbar_callback' ], 20 );
			add_action( 'sk_footer_content', [ $this, 'footer_close_tag_callback' ], 50 );
		}

		/**
		 * Render header open tag
		 */
		public function header_open_tag_callback() {
			echo Template::render( 'global/header' ); // phpcs:ignore
		}

		/**
		 * Render small header
		 */
		public function maybe_small_header_callback() {
			if ( ! is_front_page() ) { // we don't need small header in front page, since front page already has a full-page header.
				/* translators: %s: search term */
				if ( ! isset( $header_title ) ) {
					if ( is_archive() ) {
						$header_title = get_the_archive_title();
					} elseif ( is_search() ) {
						// translators: %s: search term.
						$header_title = sprintf( __( 'Search Results for "%s"', 'masjid' ), get_search_query() );
					} elseif ( is_404() ) {
						$header_title = __( 'Not Found', 'masjid' );
					} else {
						$header_title = single_post_title( '', false );
					}
				}
				echo Template::render( 'global/header-small', [ 'title' => $header_title ] ); // phpcs:ignore
			}
		}

		/**
		 * Render header navbar
		 */
		public function header_navbar_callback() {
			echo Template::render( 'global/navbar', [ 'site_name' => get_bloginfo( 'name' ) ] ); // phpcs:ignore
		}

		/**
		 * Render footer close tag
		 */
		public function footer_close_tag_callback() {
			echo Template::render( 'global/footer', [ 'content' => '&copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) ] ); // phpcs:ignore
		}
	}
}

UI::init();
