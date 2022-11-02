
<section class="land-acq-livingpartnership">
    
    <div class="img-wrapper" data-visible>
        <?php $banner = get_sub_field('right_image');?>
        <img src="<?php echo wp_get_attachment_image_src(get_sub_field('right_image'), 'fullwidth')[0]; ?>">
        <div class="link">
            <a href="<?= get_post_type_archive_link('post'); ?>" class="">
                <span class="normal-text"><?php the_sub_field('side_label_text'); ?></span>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-6">
                <div class="partnership-intro typography" data-visible>
                    <h2><span class="intro-h2"><?php the_sub_field('heading'); ?></span></h2>
                </div>
                <div class="partnership-items-wrapper">

                <?php 
                    if( have_rows('list_items') ): 
                        while ( have_rows('list_items') ) : the_row();
                ?>

                <div class="partnership-item" data-visible>
                    <div class="partnership-item__number">
                        <span class="numeral"><?= get_row_index(); ?>.</span>
                        <span class="list-title"><?php the_sub_field('list_title');?></span>
                    </div>
                    <div class="partnership-item__copy typography">
                        <?php the_sub_field('content'); ?>
                    </div>
                </div>

                <?php 
                        endwhile;
                    endif;
                ?>

                <div class="arrow-bounce-link-area partnership-items-wrapper__button">
                    <a class="arrow-bounce-link arrow-bounce-link--grey" href="#partner-with-us-contact">Get In Touch
                        <div><img src="<?= imageDir(true); ?>/arrow-down-grey.svg" alt="arrow"/></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>