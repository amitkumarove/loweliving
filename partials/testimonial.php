<section id="testimonial-section" data-aos="fade-up" data-aos-easing="ease-in" data-aos-duration="700" data-aos-delay="200" data-aos-once="true">
	<div class="testimonial-section-padding">
		<div class="link">
			<a href="<?= get_post_type_archive_link('post'); ?>" class="">
				<span class="normal-text"><?php the_field('testimonial_heading');?></span>
			</a>
		</div>
		<div class="motif motif--bottom-left">
			<div class="motif__wrap">
				<span class="motif__inner motif__inner--white"><b></b></span>
				<span class="motif__outer motif__outer--xlightgrey"><b></b></span>
			</div>
		</div>
		<div id="testimonials" class="container">
			<div class="slick" data-slick='{"slidesToShow": 1, "arrows": false,, "adaptiveHeight": true}'>
				<?php while( have_rows('testimonals') ): the_row(); 
					$content = get_sub_field('content');
					$name = get_sub_field('name');
					$video = get_sub_field('video');
					$image_overlay = get_sub_field('video_overlay');
					$video_caption = get_sub_field('video_caption');
					?>

				<div class="content">
					<?php if ($video) :
							//$vid_css = ($video_mobile || !empty($carousel)) ? 'hidden-xs' : '';
							?>
						<div class="video-section" <?php if (!$content) : ?> style="margin: auto"<?php endif; ?>>
							<?php if ($video) :
								//$vid_css = ($video_mobile || !empty($carousel)) ? 'hidden-xs' : '';
								?>
								<div class="iframe-wrap">
									<?=$video?>

									<?php if($image_overlay){ ?>
										<div class="video-section__overlay" >
											<?= wp_get_attachment_image( $image_overlay['ID'], 'full-width', false ); ?>
										</div>
									<?php } ?>
								</div>
							<?php endif; ?>
							<p><?= $video_caption; ?></p>
						</div>
					<?php endif; ?>
					<?php if ($content) : ?>
						<div class="content-section"  <?php if (!$video) : ?>style="margin:auto;max-width: 80%"<?php endif; ?>>
							<?php if (!$video) :?> <div class="text-center-p"> <?php endif; ?>

								<?=$content?>
							
							<?php if (!$video) :?> </div> <?php endif; ?>
							<?php if($name) : ?>
								<div class="name" <?php if (!$video) :?> style="margin: auto" <?php endif; ?>><?=str_replace(',', ',<br class="visible-sm" />', $name)?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endwhile;?>
			</div>
		</div>
	</div>
</section>