<?php
function generate_toc_html( $content ) {
	
	// 1. Extract headings (h1..h6) via regex
	$pattern = '/<h([1-6])(.*?)>(.*?)<\/h[1-6]>/i';
	preg_match_all( $pattern, $content, $matches, PREG_SET_ORDER );
	
	// If no headings found, return empty string
	if ( empty( $matches ) ) {
		return '';
	}
	
	$toc_headings = array();
	
	// 2. Loop through each heading match
	foreach ( $matches as $match ) {
		// $match[0] = full matched heading (e.g. <h2>My Heading</h2>)
		// $match[1] = heading level (e.g. 2)
		// $match[2] = any extra attributes within the heading tag
		// $match[3] = inner text of the heading (e.g. My Heading)
		
		$heading_level = $match[1];
		$heading_text  = strip_tags( $match[3] );
		
		// Create a slug-like ID from heading text (optional if you also inject IDs in your content)
		$id = sanitize_title_with_dashes( $heading_text );
		
		$toc_headings[] = array(
			'level' => (int) $heading_level,
			'title' => $heading_text,
			'id'    => $id,
		);
	}
	
	// 3. Build the TOC HTML
	$toc_html = '<nav class="sidebar-nav">';
	$toc_html .= '  <strong>Table of Contents</strong>';
	
	foreach ( $toc_headings as $heading ) {
		$toc_html .= sprintf(
			'<a href="#%2$s">%3$s</a>',
			$heading['level'],
			esc_attr( $heading['id'] ),
			esc_html( $heading['title'] )
		);
	}
	
	$toc_html .= '</nav>';
	
	return $toc_html;
}

function inject_heading_ids( $content ) {
	$pattern = '/<h([1-6])(.*?)>(.*?)<\/h[1-6]>/i';
	
	return preg_replace_callback( $pattern, function ( $match ) {
		$heading_level = $match[1];
		$heading_attrs = $match[2];
		$heading_text  = $match[3];
		
		$id = sanitize_title_with_dashes( strip_tags( $heading_text ) );
		
		// Insert the id attribute into the heading's opening tag
		return sprintf(
			'<h%s id="%s"%s>%s</h%s>',
			$heading_level,
			esc_attr( $id ),
			$heading_attrs,
			$heading_text,
			$heading_level
		);
	}, $content );
}