<?php
add_filter( 'wp_nav_menu', 'add_title_for_menu', 10, 2 );

function add_title_for_menu( $nav_menu, $args ) {
	$title = get_field( 'title', $args->menu );
	
	if ( empty( $title ) ) {
		return $nav_menu;
	}
	
	$format = '<h6>%s</h6>';
	$title  = sprintf( $format, $title );
	
	$nav_menu = $title . $nav_menu;
	
	return $nav_menu;
}