<?php
get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		
		if ( has_category( 'webinars' ) ) {
			get_template_part( 'parts/single/content', 'webinar' );
		} else {
			get_template_part( 'parts/single/content', 'default' );
		}
	}
}

get_footer();