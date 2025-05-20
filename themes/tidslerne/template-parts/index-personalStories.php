<section class="front-page-section">
    <a class="section_heading" href="<?php echo esc_url( home_url( '/personalstories/' ) );?>">
        <h2>Personlige historier</h2>
        <i class="fa-solid fa-arrow-right"></i>
    </a>
    Test
    <div class="story-card">
        <div class="story-card-img">
        <?php 
            $image = get_field('preview_image');
            if ($image): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            <?php endif; ?>
        </div>

        
        <div class="story-card-card">
            <div class="story-card-heading">
            <?php 
            $heading = get_field('preview_heading');
            if ($heading): ?>
                <p><?php echo esc_html($heading); ?></p>
            <?php endif; ?>
            </div>

            <div class="story-card-text">
            <?php 
            $text = get_field('preview_text');
            if ($text): ?>
                <p><?php echo esc_html($text); ?></p>
            <?php endif; ?>
            </div>

        </div>

    </div>
</section>