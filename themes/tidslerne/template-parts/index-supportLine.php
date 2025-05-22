<section class="front-page-section">
    <div class="support-line fade-stagger">

        <?php
        $args = array(
            'name' => 'phone',
            'post_type' => 'phone', 
            'posts_per_page' => 1
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $image_url = get_field('phone_image', $post_id);
            $heading = get_field('phone_heading', $post_id);
            $small_text = get_field('phone_small_text', $post_id);
            $number = get_field('phone_number', $post_id);
        ?>
        <div class="support-line-img card">
            <?php if ($image_url): ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="Et billede af en kvinde som snakker i telefon">
            <?php endif; ?>
        </div>

        <div class="support-line-card card">
            <div class="support-card-text">
                <?php if ($heading): ?>
                <h2 class="support-line-heading"><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>

                <?php if ($small_text): ?>
                <h4 class="support-line-text"><?php echo esc_html($small_text); ?></h4>
                <?php endif; ?>

                <?php if ($number): ?>
                <h3 class="support-line-number"><?php echo esc_html($number); ?></h3>
                <?php endif; ?>
            </div>
        </div>
        <?php
            wp_reset_postdata(); 
        } else {
            echo '<p>Telefon-opslag ikke fundet.</p>';
        }
        ?>

    </div>
</section>