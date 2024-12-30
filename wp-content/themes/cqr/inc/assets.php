<?php
add_action( 'wp_enqueue_scripts', 'theme_assets' );

function theme_assets() {
	//CSS
	wp_enqueue_style( 'theme', get_template_directory_uri() . '/assets/build/css/style.min.css' );
	
	//JS
	wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/build/js/aos.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/build/js/swiper-bundle.min.js', [ 'jquery' ], false, true );
	wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/build/js/main.js', [ 'jquery' ], false, true );
	
	$args = [
		'wp_ajax' => admin_url( 'admin-ajax.php' ),
	];
	wp_localize_script( 'theme', 'args_object', $args );
}