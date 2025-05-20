<?php get_header()?>
<?php if(have_posts()): ?>
<?php while(have_posts()): the_post() ?>


<!-- Hero image from component -->
<?php
    $background_image = get_field('personal_story_hero'); // ACF Image field (return URL)
    $heading = get_field('personal_story_hero_heading');
    include get_template_directory() . '/template-parts/components/hero.php';
?>

<section class="article-content">
  <div class="main-container">

    <?php
    $author = get_field('personal_story_author');
    $date = get_field('personal_story_date');

    $paragraphs = [
        get_field('ps_paragraph_1'),
        get_field('ps_paragraph_2'),
        get_field('ps_paragraph_3'),
        get_field('ps_paragraph_4'),
    ];

    $images = [
        get_field('ps_image_1'), // image 1 and 2 are next to eachother
        get_field('ps_image_2'), // image 2 and 1 are next to eachother
        get_field('ps_image_3'), 
    ];
    ?>

<?php if ($date || $author): ?>
  <div class="article-meta">
    <p>
      <?php if ($date) echo date_i18n('d/m/Y', strtotime($date)); ?>
      <?php if ($date && $author) echo ' – '; ?>
      <?php if ($author) echo 'Af ' . esc_html($author); ?>
    </p>
  </div>
<?php endif; ?>


<?php if (!empty($paragraphs[0])): //first paragrap and so on?> 
  <div class="personal-story-paragraph">
    <?php echo wp_kses_post($paragraphs[0]); ?>
  </div>

  <?php if (!empty($images[0]) || !empty($images[1])): ?>
    <div class="personal-story-images">
      <?php if (!empty($images[0])): ?>
        <div class="personal-story-image">
          <img src="<?php echo esc_url($images[0]); ?>" alt="Image 1" />
        </div>
      <?php endif; ?>
      
      <?php if (!empty($images[1])): ?>
        <div class="personal-story-image">
          <img src="<?php echo esc_url($images[1]); ?>" alt="Image 2" />
        </div>
      <?php endif; ?>

    </div>
  <?php endif; ?>
<?php endif; ?>



<?php if (!empty($paragraphs[1])): //second paragrap and so on?>
  <div class="personal-story-paragraph">
    <?php echo wp_kses_post($paragraphs[1]); ?>
  </div>
<?php endif; ?>


<?php if (!empty($paragraphs[2]) || !empty($images[2])): ?>
  <div class="personal-story-row">
    <?php if (!empty($paragraphs[2])): ?>
      <div class="personal-story-paragraph">
        <?php echo wp_kses_post($paragraphs[2]); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($images[2])): ?>
      <div class="personal-story-image-right">
        <img src="<?php echo esc_url($images[2]); ?>" alt="Image 3" />
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>


<?php if (!empty($paragraphs[3])): //fourth paragrap?>
  <div class="personal-story-paragraph">
    <?php echo wp_kses_post($paragraphs[3]); ?>
  </div>
<?php endif; ?>

  </div>
</section>



<?php get_template_part("template-parts/index", "newsletter") ?>
<?php get_template_part("template-parts/read", "moreTreatments") ?>
<?php get_template_part("template-parts/read", "moreStories") ?>




<?php endwhile ?>
<?php endif ?>





<?php get_footer()?>