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

// Ajout du script JS principal du thème
add_action('wp_enqueue_scripts', 'esk_theme_scripts');

function esk_theme_scripts() {
    $entrypoints_path = get_template_directory() . '/build/entrypoints.json';
    if ( file_exists( $entrypoints_path ) ) {
        $entrypoints_content = file_get_contents( $entrypoints_path );
        $entrypoints = json_decode( $entrypoints_content, true );
        
        // Enqueue JS files
        if( !isset( $entrypoints['entrypoints']['app']['js'] ) || ! is_array( $entrypoints['entrypoints']['app']['js'] ) ) {
            return;
        }
        foreach ( $entrypoints['entrypoints']['app']['js'] as $script ) {
            wp_enqueue_script(
                'theme-' . basename( $script, '.js' ),
                $script,
                array(),
                null,
                false // Charger dans le header
            );
        }
    }
}