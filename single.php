<?php
/**
 * Default template for displaying single post
 *
 * @author  Rendy
 * @package Pages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$column_size = get_query_var( 'column-size', 'col-lg-8' );
get_header();

while ( have_posts() ) {
	the_post();
	?>

	<div class="container main">
		<div class="row">
            <div class="<?php echo $column_size; // phpcs:ignore ?> mx-auto py-5">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

	<?php
}

get_footer();
