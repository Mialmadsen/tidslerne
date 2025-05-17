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
    wp_enqueue_style('main-css', get_stylesheet_uri(), array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'tidslerne_enqueue_assets');

function tidslerne_disable_gutenberg_on_pages() {
    remove_post_type_support("page", "editor");
}
add_action("init", "tidslerne_disable_gutenberg_on_pages");

function enqueue_search_toggle_script() {
    wp_enqueue_script(
        'search-toggle',
        get_template_directory_uri(). '/JS/search-toggle.js',
        array(), // dependencies
        null,    // version
        true     // load in footer
    );
}
add_action('wp_enqueue_scripts', 'enqueue_search_toggle_script');

function render_cta_from_post($post_id) {
    $text = get_field('cta_text', $post_id);
    $url = get_field('cta_link', $post_id);
    $style = get_field('cta_style', $post_id);

    if ($text && $url) {
        include get_template_directory() . '/template-parts/components/button.php';
    }
}