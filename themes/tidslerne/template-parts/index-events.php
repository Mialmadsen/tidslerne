<section class="front-page-section" id="events">
    <a class="section_heading" href="https://tidslerne.nemtilmeld.dk/">
        <h2>Events</h2>
        <i class="fa-solid fa-arrow-right"></i>
    </a>

    <div class="events-wrapper fade-stagger">
        <?php
  $events = new WP_Query([
    'post_type' => 'event',
    'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'meta_key' => 'event_date',
    'order' => 'ASC',
  ]);

  if ($events->have_posts()) :
    while ($events->have_posts()) : $events->the_post();
      $event_date = get_field('event_date'); // ACF date picker (format: Y-m-d)

if ($event_date) {
    // Create a DateTime object from the ACF date
    $date_obj = DateTime::createFromFormat('Ymd', $event_date);
    
    // Danish short month array
    $months_dk = [
        '01' => 'jan', '02' => 'feb', '03' => 'mar', '04' => 'apr',
        '05' => 'maj', '06' => 'jun', '07' => 'jul', '08' => 'aug',
        '09' => 'sep', '10' => 'okt', '11' => 'nov', '12' => 'dec',
    ];
    
    $day = $date_obj->format('j'); // no leading zero
    $month_number = $date_obj->format('m');
    $month_dk = $months_dk[$month_number];
}
$location = get_field('event_location');
        $heading = get_field('event_heading');
        $intro = get_field('event_intro');
        $link = get_field('nem_tilmeld_link') ?: get_permalink(); // fallback
        ?>




        <a class="event-card card" href="<?php echo esc_url($link); ?>">
            <div class="event_top">
                <div class="event-date">
                    <div><?php echo esc_html($day); ?>.</div>
                    <div><?php echo esc_html($month_dk); ?></div>
                </div>
                <div class="event-location">
                    <i class="fas fa-map-marker-alt"></i>
                    <div><?php echo wp_kses_post($location); ?></div>
                </div>
            </div>

            <div class="event-title"><?php echo esc_html($heading); ?></div>
            <div class="event-description"><?php echo esc_html($intro); ?></div>
        </a>
        <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
</section>