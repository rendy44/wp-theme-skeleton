<?php
/**
 * Custom template for displaying html opening tag
 *
 * @author  Rendy
 * @package Components
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta name="author" content="<?php bloginfo( 'name' ); ?>">
		<?php wp_head(); ?>
	</head>
	<main>
