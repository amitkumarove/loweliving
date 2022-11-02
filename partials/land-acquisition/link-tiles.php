<section class="land-acq-services">
    <div class="container">
        <div class="intro-wrapper">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <div class="land-acq-services__intro typography">
                        <?php the_sub_field('intro_content') ?>
                    </div>  
                </div>
            </div>
        </div>
        <div class="tiles-wrapper">
            <div class="row">

                <?php 
                    if( have_rows('links') ): 
                        while ( have_rows('links') ) : the_row();
                ?>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="la-tile">
                        <a href="<?php the_sub_field('link'); ?>">
                            <div class="image" style="background:#30343a url(<?php echo wp_get_attachment_image_src(get_sub_field('image'), 'xs_width')[0]; ?>) center/cover;">
                            </div>
                            <div class="title">
                                <h5><?php the_sub_field('text'); ?></h5>
                            </div>
                        </a>
                    </div>
                </div>

                <?php 
                        endwhile;
                    endif;
                ?>
            </div>
        </div>
    </div>
</section>