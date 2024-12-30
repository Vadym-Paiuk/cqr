<?php

register_nav_menus( array(
	'top'     => 'Top Menu',
	'bottom'  => 'Bottom Menu',
	'privacy' => 'Privacy Menu',
) );

add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );

set_post_thumbnail_size( 300, 200 );

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

add_filter( 'upload_mimes', 'svg_upload_allow' );
function svg_upload_allow( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	
	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ) {
	if ( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ) {
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	} else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, - 4 ) ) );
	}
	
	if ( $dosvg ) {
		if ( current_user_can( 'manage_options' ) ) {
			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		} else {
			$data['ext'] = $type_and_ext['type'] = false;
		}
		
	}
	
	return $data;
}

add_filter( 'use_block_editor_for_post', 'my_disable_gutenberg', 10, 2 );
function my_disable_gutenberg( $can_edit, $post ) {
	
	// Only target the default 'post' post type.
	if ( 'post' === $post->post_type ) {
		// If the post does NOT have the 'webinars' category, disable Gutenberg.
		if ( has_category( 'webinars', $post ) ) {
			return false; // Disable the block editor for this post.
		}
	}
	
	// Otherwise, retain the default (allow Gutenberg).
	return $can_edit;
}

function get_related_posts( $post = null, $num_posts = 3 ) {
	$post = get_post( $post );
	
	$categories = wp_get_post_categories( $post->ID );
	$tags       = wp_get_post_tags( $post->ID );
	
	$args = array(
		'category__in'   => $categories,
		'tag__in'        => $tags,
		'post__not_in'   => array( $post->ID ),
		'posts_per_page' => $num_posts,
		'orderby'        => 'rand', // You can change the ordering method
	);
	
	$related_posts = new WP_Query( $args );
	
	return $related_posts->have_posts() ? $related_posts : false;
}

add_filter( 'wpcf7_autop_or_not', '__return_false' );

add_filter( 'excerpt_length', 'custom_excerpt_length' );
function custom_excerpt_length( $length ) {
	return 30;
}

add_filter( 'excerpt_more', fn() => '...' );

add_filter( 'ai1wm_exclude_themes_from_export', function ( $exclude_filters ) {
	$exclude_filters[] = 'cqr/assets/node_modules';
	
	return $exclude_filters;
} );