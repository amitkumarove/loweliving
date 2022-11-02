<section class="land-acq-contact" id="partner-with-us-contact">
    <div class="link">
        <span class="normal-text">Get in touch</span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="contact-intro" data-visible>
                    <?php the_sub_field('intro_content'); ?>
                </div>
            </div>
            <div class="col-xs-12 col-md-6" data-visible data-visible-delay="300">
                <?= do_shortcode(get_sub_field('contact_form_shortcode')); ?>
            </div>
        </div>
        
    </div>
</section>