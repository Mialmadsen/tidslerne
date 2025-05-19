<?php
/**
 * Hero Section Component
 * 
 * Required fields:
 * - $background_image (URL)
 * - $heading (string, optional)
 */

$background_image = $background_image ?? '';
$heading = $heading ?? '';
?>

<?php if ($background_image) : ?>
<section class="hero-section" style="background-image: url('<?php echo esc_url($background_image); ?>');">
    <div class="hero-content">
        <?php if ($heading) : ?>
        <h1><?php echo esc_html($heading); ?></h1>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>