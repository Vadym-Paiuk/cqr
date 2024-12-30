<?php
get_header();

$content = get_field( 'content' );

if ( ! empty( $content ) ) {
	foreach ( $content as $section ) {
		get_template_part( 'parts/content/' . $section['acf_fc_layout'], null, $section );
	}
}

get_footer();