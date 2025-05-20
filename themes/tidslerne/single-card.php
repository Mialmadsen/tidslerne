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
        get_field('content_image_1'),
        get_field('content_image_2'),
        get_field('content_image_3'),
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

    <!-- Indhold -->
    <?php
    $image_index = 0;
    foreach ($paragraphs as $index => $para) :
        if (!$para) continue;

        $has_image = isset($images[$image_index]) && $images[$image_index];
        ?>

        <div class="article-section<?php echo $has_image ? ' with-image' : ''; ?>">
          <div class="text">
            <?php echo wp_kses_post($para); ?>
          </div>

          <?php if ($has_image): ?>
            <div class="image">
              <img src="<?php echo esc_url($images[$image_index]['url']); ?>"
                   alt="<?php echo esc_attr($images[$image_index]['alt']); ?>">
            </div>
            <?php $image_index++; ?>
          <?php endif; ?>
        </div>

    <?php endforeach; ?>

  </div>
</section>


<?php get_template_part("template-parts/index", "newsletter") ?>
<?php get_template_part("template-parts/read", "moreTreatment") ?>
<?php get_template_part("template-parts/read", "moreStories") ?>




<?php endwhile ?>
<?php endif ?>





<?php get_footer()?>