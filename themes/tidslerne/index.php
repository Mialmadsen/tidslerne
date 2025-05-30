<?php get_header()?>


<?php if(have_posts()): ?>
<?php while(have_posts()): the_post() ?>

<section class="hero-wrapper">
    <!-- Hero image from component -->
    <?php
    $background_image = get_field('index_hero_image'); // ACF Image field (return URL)
    // $heading = get_field('introduction_heading');
    include get_template_directory() . '/template-parts/components/hero.php';
    ?>
    <!-- Button box  -->

    <div class="hero-buttons-box">
        <a href="<?php echo esc_url( home_url( '/treatments/' ) );?>" class="hero-button">Behandlinger</a>
        <a href="<?php echo esc_url( home_url( '/personalstories/' ) );?>" class="hero-button">Personlige historier</a>
        <a href="#events" class="hero-button">Events</a>
    </div>


</section>

<?php
$introHeading=get_field('introduction_heading');
$introText=get_field('introduction_text');?>

<section class="front-page-section">

    <div class="introduction ">
        <div class="intro-text ">
            <h3><?php echo esc_html($introHeading);?></h3>
            <?php echo wp_kses_post($introText);?>

        </div>


        <div class="visitor_type_buttons fade-stagger">
            <a class="card" href="<?php echo esc_url( home_url( '/havecancer/' ) );?>">
                <h4>Er du ramt af kræft?</h4>
            </a>
            <a class="card" href="<?php echo esc_url( home_url( '/family/' ) );?>">
                <h4>Er du pårørende?</h4>
            </a>
        </div>


    </div>




</section>





<?php get_template_part("template-parts/index", "treatments") ?>
<?php get_template_part("template-parts/index", "newsletter") ?>
<?php get_template_part("template-parts/index", "personalStories") ?>
<?php get_template_part("template-parts/index", "supportLine") ?>
<?php get_template_part("template-parts/index", "events") ?>
<?php get_template_part("template-parts/index", "gallery") ?>



<?php endwhile ?>
<?php endif ?>





<?php get_footer()?>