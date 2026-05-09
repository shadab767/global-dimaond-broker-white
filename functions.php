<?php

function maison_lumiere_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'script', 'style', 'gallery', 'caption', 'search-form', 'navigation-widgets' ) );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'maison-lumiere' ),
	) );
}
add_action( 'after_setup_theme', 'maison_lumiere_setup' );

function maison_lumiere_preconnect() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com" />' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . "\n";
}
add_action( 'wp_head', 'maison_lumiere_preconnect', 1 );

function maison_lumiere_scripts() {
	wp_enqueue_style(
		'maison-lumiere-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Manrope:wght@300;400;500;600&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'maison-lumiere-style',
		get_stylesheet_uri(),
		array( 'maison-lumiere-fonts' ),
		'1.0.0'
	);

	wp_enqueue_script(
		'lenis',
		'https://unpkg.com/lenis@1.1.13/dist/lenis.min.js',
		array(),
		null,
		true
	);

	wp_enqueue_script(
		'maison-lumiere-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'lenis' ),
		'1.0.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'maison_lumiere_scripts' );
