<?php get_header()?>
<?php if(have_posts()): ?>
<?php while(have_posts()): the_post() ?>

<!-- Hero image from component -->
<?php
    $background_image = get_field('big_hero_image'); // ACF Image field (return URL)
    $heading = get_field('big_hero_title_');
    include get_template_directory() . '/template-parts/components/hero.php';
    ?>

<section class="article-content">
  <div class="container">

    <?php
    $author = get_field('article_author_');
    $date = get_field('article_date');

    $paragraphs = [
        get_field('paragraph_1'),
        get_field('paragraph_2'),
        get_field('paragraph_3'),
        get_field('paragraph_4'),
        get_field('paragraph_5'),
        get_field('paragraph_6'),
        get_field('paragraph_7'),
        get_field('paragraph_8'),
    ];

    $images = [
        get_field('content_image_1'), // til højre for tekst
        get_field('content_image_2'), // ved siden af image_3
        get_field('content_image_3'), // ved siden af image_2
    ];
    ?>

    <!-- Dato og forfatter -->
    <?php if ($date || $author): ?>
      <div class="article-meta">
        <p>
          <?php if ($date) echo date_i18n('d/m/Y', strtotime($date)); ?>
          <?php if ($author) echo ' – Af ' . esc_html($author); ?>
        </p>
      </div>
    <?php endif; ?>

    <?php foreach ($paragraphs as $index => $para): ?>
  <?php if (!$para) continue; ?>

  <div class="article-section">
    <div class="text">

      <?php
      // Når vi er ved paragraph_2 (index 1), wrap image inde i teksten
      if ($index === 1 && $images[0]):
      ?>
        <img class="image-wrapped" src="<?php echo esc_url($images[0]['url']); ?>" alt="<?php echo esc_attr($images[0]['alt']); ?>">
      <?php endif; ?>

      <?php echo wp_kses_post($para); ?>
    </div>
  </div>

  <?php
  // Efter paragraph_4 (index 3), vis to billeder side om side
  if ($index === 3 && $images[1] && $images[2]): ?>
    <div class="article-image-row">
      <div class="image-half">
        <img src="<?php echo esc_url($images[1]['url']); ?>" alt="<?php echo esc_attr($images[1]['alt']); ?>">
      </div>
      <div class="image-half">
        <img src="<?php echo esc_url($images[2]['url']); ?>" alt="<?php echo esc_attr($images[2]['alt']); ?>">
      </div>
    </div>
  <?php endif; ?>
<?php endforeach; ?>

  </div>
</section>


<?php get_template_part("template-parts/index", "newsletter") ?>
<?php get_template_part("template-parts/read", "moreTreatment") ?>
<?php get_template_part("template-parts/read", "moreStories") ?>




<?php endwhile ?>
<?php endif ?>





<?php get_footer()?>