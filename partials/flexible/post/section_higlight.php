<?php
$number = get_sub_field('number');
$heading = get_sub_field('heading');

$gutter_options = get_sub_field('gutter_options');
$gutter_class = '';
if($gutter_options) {
	$gutter_class = implode(' ', $gutter_options);
}
?>
<section class="section-highlight <?=$gutter_class?>">
	<div class="container">
		<div class="highlights">
			<div class="highlights--heading-wrapper">
				<?php if($number) : ?>
					<h2 class="highlights--number"><?=$number?>.</h2>
				<?php endif; ?>
				<?php if($heading) : ?>
				<h3 class="highlights--heading"><?=$heading?></h3>
				<?php endif; ?>
			</div>
			<div class="highlights--content">
				<?php if(have_rows('content')) :
					while ( have_rows('content') ) : the_row();
						if(get_row_layout() == 'copy_&_image') : 
							$section_copy = get_sub_field('copy');
							$section_img = get_sub_field('image');
							$section_img_caption = get_sub_field('image_caption');

							?>
							<div class="section-highlight-section">
								<div class="container">
									<div class="row">
										<div class="img-right-paragraph-left">
											<div class="col-xs-12 col-md-6">
												<div class="content typography" data-visible>
													<?= get_sub_field('copy'); ?>
												</div>
											</div>
											<div class="col-xs-12 col-md-6">
												<div class="img-wrapper" data-visible data-visible-delay="300">
													<figure>
														<?= wp_get_attachment_image($section_img, 'full'); ?>
														<?php if($section_img_caption) : ?>
															<figcaption><?=$section_img_caption?></figcaption>
														<?php endif; ?>
													</figure>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php elseif(get_row_layout() == 'copy'):
							$section_copy = get_sub_field('copy');

							if($section_copy) : ?>
							<div class="section-highlight-section">
								<div class="regular-paragraph">
									<div class="container">
										<div class="row">
											<div class="content-inner typography" data-visible>
											<?=$section_copy?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endif;
						endif;
					endwhile;
				endif; ?>
			</div>
		</div>
	</div>
</section>