<?php get_header()?>
<?php if(have_posts()): ?>
<?php while(have_posts()): the_post() ?>


<!-- Hero image from component -->
<?php
    $background_image = get_field('personal_story_hero'); // ACF Image field (return URL)
    $heading = get_field('personal_story_hero_heading');
    include get_template_directory() . '/template-parts/components/hero.php';
?>

<section class="personal-story-content">
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


<?php if (!empty($paragraphs[0])): //first paragrap and so on ?> 
  <div class="personal-story-paragraph">
    <?php echo wp_kses_post($paragraphs[0]); // wp_kses_post is a good way to output WYSIWYG?>
  </div>
<?php endif; ?>




<?php if (!empty($paragraphs[1])): ?>
  <div class="personal-story-paragraph">
    <?php echo wp_kses_post($paragraphs[1]); ?>
  </div>
<?php endif; ?>

<?php if (!empty($paragraphs[2])): ?>
  <div class="personal-story-paragraph">
    <?php echo wp_kses_post($paragraphs[2]); ?>
  </div>
<?php endif; ?>

<?php if (!empty($paragraphs[3])): ?>
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