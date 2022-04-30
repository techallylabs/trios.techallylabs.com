<?php

function monolit_child_enqueue_styles() {
    $parent_style = 'monolit-style'; // This is 'monolit-style' for the Anakual theme.
    wp_enqueue_style( 
        $parent_style, 
        get_template_directory_uri() . '/style.css', 
        array(
            'monolit-css-plugins', 
            'monolit-fonts', 
        ), 
        null 
    );
    wp_enqueue_style( 'monolit-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style, 'monolit-custom-style' ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'monolit_child_enqueue_styles' );
