<section class="front-page-section" id="personlige-historier">
    <a class="section_heading" href="<?php echo esc_url( home_url( '/personalstories/' ) );?>">
        <h2>Personlige historier</h2>
        <i class="fa-solid fa-arrow-right"></i>
    </a>
    <?php
    $args = array(
    'post_type' => 'personal-storie',
    'posts_per_page' => 1
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        $image = get_field('preview_image'); // image URL
        $heading = get_field('preview_heading');
        $text = get_field('preview_text');
        $link = get_permalink();
    ?>

    <div class="story-card">
        <?php if (!empty($image)) : ?>
        <div class="story-card-img">
            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($heading); ?>">
        </div>
        <?php endif; ?>

        <div class="story-card-card">
            <div class="story-card-heading">
                <?php if (!empty($heading)) : ?>
                <h3><?php echo esc_html($heading); ?></h3>
                <?php endif; ?>
            </div>

            <div class="story-card-text">
                <?php if (!empty($text)) : ?>
                <p><?php echo wp_trim_words(wp_kses_post($text), 150, '...'); ?></p>
                <?php endif; ?>
            </div>

            <a href="<?php echo get_permalink(); ?>" class="cta-button light-green">
                Læs mere
            </a>



        </div>






    </div>

    <?php
    endwhile;
    wp_reset_postdata();
    endif;
    ?>


</section>