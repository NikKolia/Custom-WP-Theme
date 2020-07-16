<?php

add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_js' );

function theme_styles() {
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css' );
}

function theme_js() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), null, true );
}

add_theme_support( 'title-tag' );
