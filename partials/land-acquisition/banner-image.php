<?php
	$banner_text = get_sub_field('text');
?>

<section class="landing land-acq-landing">
	<?php if($banner_text){ ?>
	<div class="overlay">
		<div class="container">
			<h1><?= $banner_text; ?></h1>
		</div>
	</div>
	<?php } ?>
	<div class="video-section">
		<div class="video-section__overlay"><img src="<?php echo wp_get_attachment_image_src(get_sub_field('image'), 'fullwidth')[0]; ?>" alt="Lowe Living"/></div>
		<video class="video-block"></video>
	</div>
	<a data-section-scroll href="#" class="arrow-down">
		<img src="<?= imageDir(true); ?>/arrow-down.svg" alt=""/>
	</a>
</section>
<div class="landing-spacer land-acq-landing-spacer"></div>