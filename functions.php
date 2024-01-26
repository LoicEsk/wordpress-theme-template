<?php
add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_slug_setup() {
    
    /**
     * Theme suport
     */
	add_theme_support( 'wp-block-styles' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'               => 100,
        'width'                => 100,
        // 'flex-height'          => true,
        // 'flex-width'           => true,
        // 'header-text'          => array( 'site-title', 'site-description' ),
        // 'unlink-homepage-logo' => true,
    ) );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}