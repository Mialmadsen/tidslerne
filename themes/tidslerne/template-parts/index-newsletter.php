<section class="newsletter">
    <div class="newsletter-content">
        <div class="letter-icon">
            <!-- SVG-ikon for kuvert -->
            <i class="fa-regular fa-envelope" style="color: #55a646;"></i>
        </div>
        <div class="text">
            <h2>Nyhedsbrev</h2>
            <p>Tilmeld dig vores nyhedsbrev og få besked om nye artikler og events, direkte i din indbakke</p>
        </div>
        <div class="button-container">
            <?php
                // Calling button from component
                $cta_post_id = 308;                 
                $button = get_field('button_reference', $cta_post_id); 
                if ($button) {
                    render_cta_from_post($button->ID);
                }             

               
                ?>
        </div>

        <div id="newsletter-popup" class="newsletter-modal" style="display: none;">
            <div class="modal-content">
                <span class="close-button">&times;</span>

                <?php echo do_shortcode('[mailpoet_form id="1"]'); ?>
            </div>
        </div>
    </div>
</section>