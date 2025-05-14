<?php get_header()?>
 <?php if(have_posts()): ?>
  <?php while(have_posts()): the_post() ?>

  
    
   <?php get_template_part("template-parts/index", "personaStories") ?>
   <?php get_template_part("template-parts/index", "events") ?>
   <?php get_template_part("template-parts/index", "newsletter") ?>
    <?php get_template_part("template-parts/index", "supportLine") ?>   
   

   

  <?php endwhile ?>
 <?php endif ?>





<?php get_footer()?>