<?php 
	$image = get_sub_field('image');
	$title = get_sub_field('title');
?>
<section class="landing banner">
	<?php if($title){ ?><div class="overlay">
		<h1><?= $title; ?></h1> 
	</div>
	<?php }?>
	<?php if($image){?>
	<div class="video-section">
		<div class="video-section__overlay">
			<?= wp_get_attachment_image($image['ID'], 'full'); ?>
		</div>
		<video class="video-block"></video>
	</div>
	<?php } ?>
	
</section>