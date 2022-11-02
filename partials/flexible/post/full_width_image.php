<?php
$fullimg = get_sub_field('image');
$imgcaption = get_sub_field('image_caption');
$bg	= get_sub_field('select_bg');
$gutter_options = get_sub_field('gutter_options');
$gutter_class = '';
if($gutter_options) {
	$gutter_class = implode(' ', $gutter_options);
}
?>
<section class="full-width-image bg-<?php if($bg == 'True'){echo 'light';}?> <?=$gutter_class?>">
	<div class="container">
		<div class="row">
			<figure>
				<?= wp_get_attachment_image($fullimg['ID'], 'full'); ?>
				<?php if($imgcaption) : ?>
					<figcaption><?=$imgcaption?></figcaption>
				<?php endif; ?>
			</figure>
		</div>
	</div>
</section>