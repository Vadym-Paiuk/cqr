<?php
extract( $args );
$posts_per_page = get_option( 'posts_per_page' );
?>
	
	<div class="row">
		<?php
		$args = [
			'post_type'      => 'post',
			'posts_per_page' => $posts_per_page,
			'orderby'        => 'date',
			'order'          => 'DESC',
			'paged'          => $paged,
		];
		
		if ( ! empty( $cat ) ) {
			$args['cat'] = $cat;
		}
		
		if ( ! empty( $s ) ) {
			$args['s'] = $s;
		}
		
		$wp_query = new WP_Query( $args );
		
		if ( $wp_query->have_posts() ) :
			while ( $wp_query->have_posts() ) :
				$wp_query->the_post();
				$template = 'default';
				
				if ( has_category( 'webinars' ) ) {
					$template = 'webinar';
				}
				
				get_template_part( 'parts/preview/post', $template );
			endwhile;
		else :
			echo '<p>No posts found.</p>';
		endif;
		?>
	</div>

<?php show_pagination( $wp_query->found_posts, $posts_per_page, $paged, get_permalink() ); ?>