<section class="front-page-section" id="gallery">
    <a class="section_heading" href="<?php echo esc_url( home_url( '/gallery/' ) );?>">
        <h2>Galleri</h2>
        <i class="fa-solid fa-arrow-right"></i>
    </a>

    <div class="gallery-grid fade-stagger">
        <?php
        $gallery_query = new WP_Query([
            'post_type' => 'gallery',
            'posts_per_page' => 3
        ]);

        if ($gallery_query->have_posts()) :
            while ($gallery_query->have_posts()) : $gallery_query->the_post();
                $image = get_field('gallery_image');
                if ($image) :
                                echo '<div class="gallery-item card">';
                echo '<a data-fancybox="gallery" href="' . esc_url($image['url']) . '">';
                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
                echo '</a>';
                echo '</div>';
                endif;
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>