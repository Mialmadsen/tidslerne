<?php get_header()?>
<?php if(have_posts()): ?>
<?php while(have_posts()): the_post() ?>


<!-- Hero image from component -->
<?php
    $background_image = get_field('behandling_hero'); // ACF Image field (return URL)
    $heading = get_field('behandling_hero_heading');
    include get_template_directory() . '/template-parts/components/hero.php';
    ?>




<section class="front-page-section">
    <!-- Filter Dropdown -->
    <form method="get" class="filter-form">
        <label for="filter">Filtrér efter kategori:</label>
        <select name="filter" id="filter" onchange="this.form.submit()">
            <option value="">Alle kategorier</option>
            <?php
        $terms = get_terms(array(
            'taxonomy' => 'behandling_category',
            'hide_empty' => false
        ));

        foreach ($terms as $term) {
            $selected = (isset($_GET['filter']) && $_GET['filter'] === $term->slug) ? 'selected' : '';
            echo '<option value="' . esc_attr($term->slug) . '" ' . $selected . '>' . esc_html($term->name) . '</option>';
        }
        ?>
        </select>
    </form>


    <div class="cards_layout_page fade-stagger">
        <?php

    $filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

$args = array(
    'post_type' => 'card',
    'posts_per_page' => -1,
);

if (!empty($filter)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'behandling_category',
            'field' => 'slug',
            'terms' => $filter
        )
    );
}



    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $image = get_field('card_image');
            $heading = get_field('card_heading');
            $text = get_field('card_text');
            $link = get_permalink();

            include get_template_directory() . '/template-parts/components/card.php';
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>Ingen kort fundet i denne kategori.</p>';
    endif;
    ?>
    </div>
</section>

<?php get_template_part("template-parts/index", "newsletter") ?>
<?php get_template_part("template-parts/read", "moreStories") ?>



<?php endwhile ?>
<?php endif ?>





<?php get_footer()?>