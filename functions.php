<?php
/**
 * Yoga Studio Theme - Funktioner
 */

function yogastudio_enqueue_assets() {
    // Laddar in din riktiga design från main.css som ligger direkt i rotmappen
    wp_enqueue_style(
        'yogastudio-main-style', 
        get_template_directory_uri() . '/main.css', 
        array(), 
        '1.0'
    );

    // Laddar in ditt JavaScript från js-mappen
    wp_enqueue_script(
        'yogastudio-main-script', 
        get_template_directory_uri() . '/js/script.js', 
        array(), 
        '1.0', 
        true
    );
}
add_action('wp_enqueue_scripts', 'yogastudio_enqueue_assets');

function yogastudio_theme_setup() {
    // Aktivera stöd för utvalda bilder (Featured Images)
    add_theme_support('post-thumbnails');

    // Aktivera stöd för menyer
    register_nav_menus(array(
        'main-menu' => __('Huvudmeny', 'yogastudiotheme'),
    ));
}
add_action('after_setup_theme', 'yogastudio_theme_setup');


// Ändra standardlängden för alla utdrag (excerpts) till 18 ord
function yogastudio_custom_excerpt_length($length) {
    return 18;
}
add_filter('excerpt_length', 'yogastudio_custom_excerpt_length', 999);

// Ändra det tråkiga textslutet från [...] till bara ...
function yogastudio_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'yogastudio_excerpt_more');