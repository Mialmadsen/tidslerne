<section class="front-page-section">
    <div class="cards_layout--scaled">
        <a class="section_heading" href="<?php echo esc_url( home_url( '/treatments/' ) );?>">
            <h2>Læs om flere behandlinger</h2>
            <i class="fa-solid fa-arrow-right"></i>
        </a>

        <div class="cards_layout_page fade-stagger">

            <?php
    $args = array(
    'post_type' => 'card',
    'posts_per_page' => 6
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        $image = get_field('card_image'); // image URL
        $heading = get_field('card_heading');
        $text = get_field('card_text');
        $link = get_permalink();

        include get_template_directory() . '/template-parts/components/card.php';
    endwhile;
    wp_reset_postdata();
    endif;
    ?>


        </div>
    </div>

</section>