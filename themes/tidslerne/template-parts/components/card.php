<?php
/**
 * Article Card Component
 * 
 * Props:
 * - $image (string - image URL)
 * - $heading (string)
 * - $text (string)
 * - $link (string - permalink)
 */
?>

<?php if (!empty($link)) : ?>
<a href="<?php echo esc_url($link); ?>" class="article-card card">
    <?php if (!empty($image)) : ?>
    <div class="card-image-wrapper">
        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($heading); ?>">
    </div>
    <?php endif; ?>

    <div class="card-text">
        <?php if (!empty($heading)) : ?>
        <h3><?php echo esc_html($heading); ?></h3>
        <?php endif; ?>
        <?php if (!empty($text)) : ?>
        <p><?php echo wp_trim_words(wp_kses_post($text), 50, '...'); ?></p>
        <?php endif; ?>
    </div>
</a>
<?php endif; ?>