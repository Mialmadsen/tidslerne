<?php
/**
 * CTA Button Component
 *
 *  string $text  - Button label (required)
 *  string $url   - Button link (required)
 *  string $style - CSS style class (green, light-green)
 */

$text = $text ?? 'Bliv medlem';
$url = $url ?? '#';
$style = $style ?? 'green'; // default style

?>
<a href="<?php echo esc_url($url); ?>" class="cta-button <?php echo esc_attr($style); ?>">
    <?php echo esc_html($text); ?>
</a>