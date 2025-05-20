<section class="read_more-section">
    <a class="section_heading" href="<?php echo esc_url( home_url( '/personalstories/' ) );?>">
        <h2>Læs om personlige historier</h2>
        <i class="fa-solid fa-arrow-right"></i>
    </a>


    <div class="cards_layout fade-stagger">

        <?php
    $args = array(
    'post_type' => 'personal-storie',
    'posts_per_page' => 3
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