<?php
// Enqueue styles
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

    // Custom Fonts
    wp_enqueue_style(
        'custom-fonts',
        'https://fonts.googleapis.com/css2?family=Trebuchet+MS:wght@700&family=Verdana&display=swap',
        array(),
        null
    );

    // Main Stylesheet
    wp_enqueue_style('main-css', get_stylesheet_uri(), array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'tidslerne_enqueue_assets');

// Disable Gutenberg for pages
function tidslerne_disable_gutenberg_on_pages() {
    remove_post_type_support("page", "editor");
}
add_action("init", "tidslerne_disable_gutenberg_on_pages");

// Enqueue Search Toggle Script
function enqueue_search_toggle_script() {
    wp_enqueue_script(
        'search-toggle',
        get_template_directory_uri() . '/JS/search-toggle.js',
        array(),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_search_toggle_script');

// Render CTA Button Function
function render_cta_from_post($post_id) {
    $text = get_field('cta_text', $post_id);
    $url = get_field('cta_link', $post_id);
    $style = get_field('cta_style', $post_id);

    if ($text && $url) {
        include get_template_directory() . '/template-parts/components/button.php';
    }
}

// Enqueue GSAP and animation scripts
function tidslerne_enqueue_scripts() {
    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js',
        [],
        null,
        true
    );

    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js',
        ['gsap'],
        null,
        true
    );

    wp_enqueue_script(
        'tidslerne-hero-animation',
        get_template_directory_uri() . '/JS/hero-animation.js',
        ['gsap'],
        null,
        true
    );

    wp_enqueue_script(
        'tidslerne-scroll-animations',
        get_template_directory_uri() . '/JS/scroll-animations.js',
        ['gsap', 'gsap-scrolltrigger'],
        null,
        true
    );

    wp_enqueue_script(
        'hidden-menu-js',
        get_template_directory_uri() . '/JS/hidden-menu.js',
        ['gsap'],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'tidslerne_enqueue_scripts');

// Enqueue Newsletter Script
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

// Include custom post types in search
function tidslerne_include_custom_post_types_in_search($query) {
    if ($query->is_search && $query->is_main_query()) {
        $query->set('post_type', [
            'post', 'page', 'card', 'event', 'gallery', 'personal-storie'
        ]);
    }
}
add_action('pre_get_posts', 'tidslerne_include_custom_post_types_in_search');

// Register taxonomy for card CPT
function register_behandling_category_taxonomy() {
    register_taxonomy('behandling_category', 'card', array(
        'label' => 'Behandling Kategorier',
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'behandling-kategori'),
    ));
}
add_action('init', 'register_behandling_category_taxonomy');

// Load more cards via AJAX
function enqueue_card_scroll_script() {
    wp_enqueue_script(
        'card-scroll',
        get_template_directory_uri() . '/JS/card-scroll.js',
        ['jquery'],
        null,
        true
    );

    wp_localize_script('card-scroll', 'cardScrollAjax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_card_scroll_script');

function load_more_cards_ajax() {
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 6;

    $args = array(
        'post_type' => 'card',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
    );

    $query = new WP_Query($args);
    $html = '';

    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) : $query->the_post();
            include get_template_directory() . '/template-parts/components/card.php';
        endwhile;
        wp_reset_postdata();
        $html = ob_get_clean();
    }

    $has_more = $query->found_posts > $paged * $posts_per_page;

    wp_send_json([
        'html' => $html,
        'has_more' => $has_more,
    ]);
}
add_action('wp_ajax_load_more_cards', 'load_more_cards_ajax');
add_action('wp_ajax_nopriv_load_more_cards', 'load_more_cards_ajax');

// Fancybox assets
function enqueue_fancybox_assets() {
    wp_enqueue_style('fancybox-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css');
    wp_enqueue_script('fancybox-js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_fancybox_assets');