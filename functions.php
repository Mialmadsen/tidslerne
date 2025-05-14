<?php
function tidslerne_enqueue_assets() {
    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        array(),
        '6.5.0'
    );

    // Google Material Icons
    wp_enqueue_style(
        'material-icons',
        'https://fonts.googleapis.com/icon?family=Material+Icons',
        array(),
        null
    );

    // Fonts
    wp_enqueue_style(
        'custom-fonts',
        'https://fonts.googleapis.com/css2?family=Trebuchet+MS:wght@700&family=Verdana&display=swap',
        array(),
        null
    );

    // Main CSS
    wp_enqueue_style('main-css', get_stylesheet_uri().'/style.css', array(), '1.0.0');
}
function tidslerne_disable_gutenberg_on_pages() {
    remove_post_type_support("page", "editor");
}
add_action("init", "tidslerne_disable_gutenberg_on_pages");