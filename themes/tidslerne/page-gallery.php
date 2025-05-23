<?php get_header()?>






<?php if(have_posts()): ?>
<?php while(have_posts()): the_post() ?>
<div class="gallery-grid_page fade-stagger">
    <?php
        $gallery_query = new WP_Query([
            'post_type' => 'gallery',
            'posts_per_page' => -1
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

<?php get_template_part("template-parts/index", "newsletter") ?>




<?php endwhile ?>
<?php endif ?>





<?php get_footer()?>