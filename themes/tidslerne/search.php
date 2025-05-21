<?php get_header(); ?>

<section class="search-results">
    <h1>Søgeresultater for: <?php echo get_search_query(); ?></h1>

    <?php if (have_posts()) : ?>
    <ul class="search-list">
        <?php while (have_posts()) : the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <p><?php the_excerpt(); ?></p>
        </li>
        <?php endwhile; ?>
    </ul>
    <?php else : ?>
    <p>Ingen resultater fundet. Prøv en anden søgning.</p>
    <?php endif; ?>
</section>

<?php get_template_part("template-parts/index", "newsletter") ?>
<?php get_template_part("template-parts/read", "moreTreatment") ?>
<?php get_template_part("template-parts/read", "moreStories") ?>



<?php get_footer(); ?>