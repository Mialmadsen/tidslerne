<?php get_header()?>
<?php if(have_posts()): ?>
<?php while(have_posts()): the_post() ?>

<!-- Hero image from component -->
<?php
    $background_image = get_field('personal_story_hero'); // ACF Image field (return URL)
    $heading = get_field('personal_story_heading');
    include get_template_directory() . '/template-parts/components/hero.php';
    ?>




<section class="front-page-section">


    <div class="cards_layout_page fade-stagger">

        <?php
    $args = array(
    'post_type' => 'personal-storie',
    'posts_per_page' => -1
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        $image = get_field('preview_image'); // image URL
        $heading = get_field('preview_heading');
        $text = get_field('preview_text');
        $link = get_permalink();

        include get_template_directory() . '/template-parts/components/card.php';
    endwhile;
    wp_reset_postdata();
    endif;
    ?>


    </div>
</section>

<?php get_template_part("template-parts/index", "newsletter") ?>
<?php get_template_part("template-parts/read", "moreTreatment") ?>




<?php endwhile ?>
<?php endif ?>





<?php get_footer()?>