<?php
function facebook_social_button() {
	$article_url = get_the_permalink(); // Psuedo-code method to retrieve the article's URL.
	$article_url .= '#utm_source=facebook&utm_medium=social&utm_campaign=social_buttons';
	$title       = html_entity_decode( get_the_title() ); // Psuedo-code method to retrieve the og_title.
	$description = html_entity_decode( get_the_excerpt() ); // Psuedo-code method to retrieve the og_description.
	$images      = get_the_post_thumbnail_url();
	$url         = 'http://www.facebook.com/sharer/sharer.php?s=100';
	$url         .= '&p[url]=' . urlencode( $article_url );
	$url         .= '&p[title]=' . urlencode( $title );
	$url         .= '&p[images][0]=' . urlencode( $images[0] );
	$url         .= '&p[summary]=' . urlencode( $description );
	$url         .= '&u=' . urlencode( $article_url );
	$url         .= '&t=' . urlencode( $title );
	
	echo esc_attr( $url );
}

function x_social_button() {
	$article_url = get_the_permalink();
	$article_url .= '#utm_source=twitter&utm_medium=social&utm_campaign=social_buttons';
	
	$title       = html_entity_decode( get_the_title() );      // Retrieve the post title.
	$description = html_entity_decode( get_the_excerpt() );    // Retrieve the post excerpt.
	$images      = get_the_post_thumbnail_url();               // Retrieve the post thumbnail URL.
	
	// Build Twitter share link
	$url = 'https://twitter.com/intent/tweet?';
	$url .= 'text=' . urlencode( $title );
	$url .= '&url=' . urlencode( $article_url );
	
	// Optional: if you want to include hashtags, you can add:
	// $url .= '&hashtags=' . urlencode( 'example,hashtags' );
	
	echo esc_attr( $url );
}

function linkedin_social_button() {
	$article_url = get_the_permalink();
	$article_url .= '#utm_source=linkedin&utm_medium=social&utm_campaign=social_buttons';
	
	$title       = html_entity_decode( get_the_title() );      // Retrieve the post title.
	$description = html_entity_decode( get_the_excerpt() );    // Retrieve the post excerpt.
	$images      = get_the_post_thumbnail_url();               // Retrieve the post thumbnail URL.
	
	// LinkedIn allows for a summary and source parameter
	$source = get_bloginfo( 'name' ); // Example source: your site name
	
	// Build LinkedIn share link
	$url = 'https://www.linkedin.com/shareArticle?mini=true';
	$url .= '&url=' . urlencode( $article_url );
	$url .= '&title=' . urlencode( $title );
	$url .= '&summary=' . urlencode( $description );
	$url .= '&source=' . urlencode( $source );
	
	echo esc_attr( $url );
}