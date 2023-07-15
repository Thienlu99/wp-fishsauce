<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package THCmedia-company
 */

$categories = wp_get_post_categories(get_the_ID());
$image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'thumbnail');

$custom_logo_id = get_theme_mod( 'custom_logo' );
$placeholder = wp_get_attachment_image_src( $custom_logo_id , 'full' );


if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
