<?php
add_action( 'wp_ajax_update_blog', 'update_blog' );
add_action( 'wp_ajax_nopriv_update_blog', 'update_blog' );
function update_blog(): void {
	$cat   = ( $_POST['cat'] !== 'all' ) ? $_POST['cat'] : false;
	$s     = ( $_POST['s'] !== '' ) ? $_POST['s'] : false;
	$paged = ( ! empty( $_POST['paged'] ) ) ? $_POST['paged'] : 1;
	
	$args = [
		'cat'   => $cat,
		's'     => $s,
		'paged' => $paged,
	];
	
	ob_start();
	get_template_part( 'parts/ajax/blog', 'results', $args );
	$response = ob_get_clean();
	
	wp_send_json_success( $response );
}