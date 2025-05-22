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

// Search
function enqueue_search_toggle_script() {
    wp_enqueue_script(
        'search-toggle',
        get_template_directory_uri(). '/JS/search-toggle.js',
        array(), 
        null,    
        true     
    );
}
add_action('wp_enqueue_scripts', 'enqueue_search_toggle_script');

// Button
function render_cta_from_post($post_id) {
    $text = get_field('cta_text', $post_id);
    $url = get_field('cta_link', $post_id);
    $style = get_field('cta_style', $post_id);

    if ($text && $url) {
        include get_template_directory() . '/template-parts/components/button.php';
    }
}

function tidslerne_enqueue_scripts() {
    // GSAP CDN
    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js',
        [],
        null,
        true
    );

    // Buttons appear on the hero image
    wp_enqueue_script(
        'tidslerne-hero-animation',
        get_template_directory_uri() . '/JS/hero-animation.js',
        ['gsap'],
        null,
        true
    );
// ScrollTrigger plugin
    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js',
        ['gsap'],
        null,
        true
    );

    // Animation 
    wp_enqueue_script(
        'tidslerne-scroll-animations',
        get_template_directory_uri() . '/JS/scroll-animations.js',
        ['gsap', 'gsap-scrolltrigger'],
        null,
        true
    );


}
add_action('wp_enqueue_scripts', 'tidslerne_enqueue_scripts');

// Newsletter

function enqueue_newsletter_script() {
    
    wp_enqueue_script('jquery');

    
    wp_enqueue_script(
        'newsletter-script',
        get_template_directory_uri() . '/JS/newsletter.js',
        array('jquery'), 
        filemtime(get_template_directory() . '/JS/newsletter.js'), 
        true 
    );
}
add_action('wp_enqueue_scripts', 'enqueue_newsletter_script');
function tidslerne_include_custom_post_types_in_search($query) {
    if ($query->is_search && $query->is_main_query()) {
        $query->set('post_type', [
            'post', 'page', 
            'card',
            
            'event',
            'gallery',
            
            'personal-storie',
            
        ]);
    }
}
add_action('pre_get_posts', 'tidslerne_include_custom_post_types_in_search');

function register_behandling_category_taxonomy() {
    register_taxonomy('behandling_category', 'card', array(
        'label' => 'Behandling Kategorier',
        'hierarchical' => true, // Like categories
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'behandling-kategori'),
    ));
}
add_action('init', 'register_behandling_category_taxonomy');