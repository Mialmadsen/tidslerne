<section class="front-page-section" id="behandlinger">
    <a class="section_heading" href="<?php echo esc_url( home_url( '/treatments/' ) );?>">
        <h2>Behandlinger</h2>
        <i class="fa-solid fa-arrow-right"></i>
    </a>
    <div class="arrow-wrapper">

        <button class="carousel-arrow arrow left" onclick="scrollCarousel(-1)"><i
                class="fa-solid fa-circle-arrow-left"></i></button>
        <button class="carousel-arrow arrow right" onclick="scrollCarousel(1)"><i
                class="fa-solid fa-circle-arrow-right"></i></button>
        <div class="card-carousel-wrapper">


            <div class="cards_layout card-carousel fade-stagger " id="cardCarousel">

                <?php
                $paged = 1; // Initial page
                $posts_per_page = 6;

                $args = array(
                'post_type' => 'card',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $image = get_field('card_image');
                    $heading = get_field('card_heading');
                    $text = get_field('card_text');
                    $link = get_permalink();

                    include get_template_directory() . '/template-parts/components/card.php';
                endwhile;
                wp_reset_postdata();
                endif;
                ?>


            </div>
        </div>


    </div>


</section>