<?php
/**
 * Put all helpful functions that you may use for multiple times
 *
 * @author Rendy
 * @package Helpers
 */

namespace Skeleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '\Skeleton\Helper' ) ) {
	/**
	 * Class Helper
	 *
	 * @package Skeleton
	 */
	class Helper {

		/**
		 * Custom prefix for postmeta and usermeta.
		 *
		 * @var string
		 */
		private static $metabox_prefix = 'skltn_';

		/**
		 * Get main column bootstrap css class width
		 *
		 * @return int
		 */
		public static function get_main_column_width() {
			return is_active_sidebar( 'sk_sidebar' ) ? 'col-md-8' : 'col-md-12';
		}

		/**
		 * Custom pagination
		 *
		 * @param int $numpages max numpage.
		 * @param int $paged    current page.
		 *
		 * @return string
		 */
		public static function custom_pagination( $numpages, $paged ) {

			/**
			 * This first part of our function is a fallback
			 * for custom pagination inside a regular loop that
			 * uses the global $paged and global $wp_query variables.
			 *
			 * It's good because we can now override default pagination
			 * in our theme, and use this function in default quries
			 * and custom queries.
			 */
			$paged = empty( $paged ) ? 1 : $paged;
			if ( '' === $numpages ) {
				global $wp_query;
				$numpages = $wp_query->max_num_pages;
				if ( ! $numpages ) {
					$numpages = 1;
				}
			}
			/**
			 * We construct the pagination arguments to enter into our paginate_links
			 * function.
			 */
			$pagination_args = [
				'base'         => add_query_arg( 'paged', '%#%' ),
				'total'        => $numpages,
				'current'      => $paged,
				'show_all'     => false,
				'end_size'     => 1,
				'mid_size'     => 2,
				'prev_next'    => true,
				'prev_text'    => __( '<i class="remixicon-arrow-left-s-line"></i>' ),
				'next_text'    => __( '<i class="remixicon-arrow-right-s-line"></i>' ),
				'type'         => 'array',
				'add_args'     => true,
				'add_fragment' => '',
			];
			$result          = '';
			$paginate_links  = paginate_links( $pagination_args );
			if ( $paginate_links ) {
				$result .= '<div class="pagination"><ul class="pagination">';
				foreach ( $paginate_links as $page ) {
					$result .= '<li class="page-item ' . ( strpos( $page, 'current' ) !== false ? 'active' : '' ) . '"> ' . str_replace( 'page-numbers', 'page-link', $page ) . '</li>';
				}
				$result .= '</ul></div>';
			}

			return $result;
		}

		/**
		 * Save multiple post meta
		 *
		 * @param int   $post_id post id.
		 * @param array $options meta_key => meta_value formatted array.
		 */
		public static function save_post_meta( $post_id, $options = [] ) {
			if ( ! empty( $options ) ) {
				foreach ( $options as $option_key => $option_value ) {
					update_post_meta( $post_id, self::$metabox_prefix . $option_key, $option_value );
				}
			}
		}

		/**
		 * Save multiple user meta
		 *
		 * @param string $user_id user id.
		 * @param array  $options meta_key => meta_value formatterd array.
		 */
		public static function save_user_meta( $user_id, $options = [] ) {
			if ( ! empty( $options ) ) {
				foreach ( $options as $option_key => $option_value ) {
					update_user_meta( $user_id, self::$metabox_prefix . $option_key, $option_value );
				}
			}
		}

		/**
		 * Delete user meta
		 *
		 * @param string $user_id user id.
		 * @param string $key     user meta key.
		 */
		public static function delete_user_meta( $user_id, $key ) {
			delete_user_meta( $user_id, self::$metabox_prefix . $key );
		}

		/**
		 * Delete user meta
		 *
		 * @param string $post_id post id.
		 * @param string $key     user meta key.
		 */
		public static function delete_post_meta( $post_id, $key ) {
			delete_post_meta( $post_id, self::$metabox_prefix . $key );
		}

		/**
		 * Get user meta
		 *
		 * @param string $key          user meta key.
		 * @param string $user_id      user id.
		 * @param bool   $single_value whether the meta is single or array.
		 *
		 * @return mixed
		 */
		public static function get_user_meta( $key, $user_id, $single_value = true ) {
			return get_user_meta( $user_id, self::$metabox_prefix . $key, $single_value );
		}

		/**
		 * Get post meta
		 *
		 * @param string      $key          post meta key.
		 * @param bool|string $post_id      post id.
		 * @param bool        $single_value whether the meta is single or array.
		 *
		 * @return mixed
		 */
		public static function get_post_meta( $key, $post_id = false, $single_value = true ) {
			$post_id = ! $post_id ? get_the_ID() : $post_id;

			return get_post_meta( $post_id, self::$metabox_prefix . $key, $single_value );
		}

		/**
		 * Simple $_POST request handler
		 *
		 * @param string $key post key.
		 *
		 * @return bool|mixed
		 */
		public static function post( $key ) {
			return ! empty( $_POST[ $key ] ) ? $_POST[ $key ] : false; // phpcs:ignore
		}

		/**
		 * Simple $_GET request handler
		 *
		 * @param string $key get key.
		 *
		 * @return bool|mixed
		 */
		public static function get( $key ) {
			return ! empty( $_GET[ $key ] ) ? $_GET[ $key ] : false; // phpcs:ignore
		}

		/**
		 * Get array value by its key.
		 *
		 * @param array  $array array object.
		 * @param string $key   array key.
		 *
		 * @return bool|mixed will be returned false once aray does not have key.
		 */
		public static function array_val( array $array, $key ) {
			return ! empty( $array[ $key ] ) ? $array[ $key ] : false;
		}
	}
}
