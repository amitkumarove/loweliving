<section id="testimonial-section" class="land-acq" data-aos="fade-up" data-aos-easing="ease-in" data-aos-duration="700" data-aos-delay="200" data-aos-once="true">
	<div class="testimonial-section-padding">
        <div id="testimonials" class="container" data-visible>

            <div class="slick" data-slick='{"slidesToShow": 1, "arrows": false, "adaptiveHeight": true}'>
                <?php 
                    if( have_rows('testimonials') ): 
                        while ( have_rows('testimonials') ) : the_row();

                        $video = get_sub_field('video');
                        $image_overlay = get_sub_field('video_overlay'); 
                        $video_caption = get_sub_field('video_caption');        
                            ?>
                <div class="content">
                    <?php if ($video) :
                            //$vid_css = ($video_mobile || !empty($carousel)) ? 'hidden-xs' : '';
                            ?>
                        <div class="video-section" <?php if (! get_sub_field('quote')) : ?> style="margin: auto"<?php endif; ?>>
                            <?php if ($video) :
                                //$vid_css = ($video_mobile || !empty($carousel)) ? 'hidden-xs' : '';
                                ?>
                                <div class="iframe-wrap">
                                    <?=$video?>
                                  
                                    <?php if($image_overlay){ ?>
                                    <div class="video-section__overlay">
                                        <?= wp_get_attachment_image( $image_overlay['ID'], 'full-width', false ); ?>
                                    </div>
                                	<?php } ?>
                                </div>
                            <?php endif; ?>
                              <p class="partner_caption"><?= $video_caption; ?></p>
                        </div>
                    <?php endif; ?>
					<?php if (get_sub_field('quote')) : ?>
                        <div class="content-section"  <?php if (!$video) : ?>style="margin:auto;max-width: 80%"<?php endif; ?>> 
                            <p  <?php if (!$video) :?> style="text-align: center" <?php endif; ?>>“<?php the_sub_field('quote'); ?>”</p>
                            <div class="name" <?php if (!$video) :?> style="margin: auto" <?php endif; ?>>— <?php the_sub_field('author'); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php 
                        endwhile;
                    endif;
                ?>
            </div>
        </div>
        <div class="motif motif--bottom-right">
            <div class="motif__wrap">
                <span class="motif__inner motif__inner--lightgrey"><b></b></span>
                <span class="motif__outer motif__outer--xlightgrey"><b></b></span>
            </div>
        </div>
    </div>
</section>