<?php
$imgright = get_sub_field('image');
$imglink = get_sub_field('image_link');
$imgsize = get_sub_field('image_size');
$imgcaption = get_sub_field('image_caption');
$content = get_sub_field('paragraph');

$gutter_options = get_sub_field('gutter_options');
$gutter_class = '';
if($gutter_options) {
	$gutter_class = implode(' ', $gutter_options);
}
?>
<section class="img-right-paragraph-left <?=$gutter_class?>">
	<div class="container">
		<div class="row">
			<?php if($imgsize == 'small'){ ?>
			<div class="col-md-7">
			<?php }else{ ?>
				<div class="col-md-6">
				<?php } ?>
				<div class="content typography" data-visible>
					<?= $content; ?>
				</div>
			</div>
			<?php if($imgsize == 'small'){ ?>
			<div class="col-md-5">
				<?php }else{ ?>
			<div class="col-md-6">
				<?php } ?>
				<div class="img-wrapper <?= $imgsize; ?>" data-visible data-visible-delay="300">
					<figure>
						<a href="<?= $imglink['url'];?>" target="<?= $imglink['target'];?>">
							<?= wp_get_attachment_image($imgright['ID'], 'full'); ?>
						</a>
						<?php if($imgcaption) : ?>
							<figcaption><?=$imgcaption?></figcaption>
						<?php endif; ?>
					</figure>
				</div>
			</div>
			
		</div>
	</div>
</section>