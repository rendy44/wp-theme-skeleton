<?php
/**
 * Template for displaying archive page
 *
 * @author  Rendy
 * @package Pages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wp_query;
$column_size = \Skeleton\Helper::get_main_column_width();
$post_paged  = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

get_header();
?>

	<div class="container">
		<div class="row py-5">
            <div class="<?php echo \Skeleton\Helper::get_main_column_width(); // phpcs:ignore ?>">
				<?php
				if ( have_posts() ) {
					?>
					<div class="row mb-5">
						<?php
						while ( have_posts() ) {
							the_post();
							get_template_part( '/templates/global/content', 'post' );
						}
						?>
					</div>
					<?php
					echo \Skeleton\Helper::custom_pagination( $wp_query->max_num_pages, $post_paged ); // phpcs:ignore
				} else {
					get_template_part( '/templates/global/404', 'post' );
				}
				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php
get_footer();
