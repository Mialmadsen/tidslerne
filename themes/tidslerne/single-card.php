<?php get_header()?>
<?php if(have_posts()): ?>
<?php while(have_posts()): the_post() ?>

<!-- Hero image from component -->
<?php
    $background_image = get_field('big_hero_image'); // ACF Image field (return URL)
    $heading = get_field('big_hero_title_');
    include get_template_directory() . '/template-parts/components/hero.php';
    ?>


<?php get_template_part("template-parts/index", "newsletter") ?>
<?php get_template_part("template-parts/read", "moreTreatment") ?>
<?php get_template_part("template-parts/read", "moreStories") ?>

<p>Hello world </p>


<?php endwhile ?>
<?php endif ?>





<?php get_footer()?>