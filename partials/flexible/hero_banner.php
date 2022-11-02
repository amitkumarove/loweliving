<?php
	$banner_logo = get_sub_field('banner_logo');
	$banner_image = get_sub_field('banner_image');
	$banner_text = get_sub_field('banner_text');

	$video = get_video_embed_html(get_sub_field('video'));
	$video_mobile = get_video_embed_html(get_sub_field('video_mobile'));

	$carousel = get_sub_field('carousel');
?>
<section class="landing">
	<?php if(! $banner_text){?>
	<div class="overlay">
		<div class="container">
			<?= wp_get_attachment_image($banner_logo['ID'], 'full'); ?>
		</div>
	</div>
<?php } ?>
	<?php if($banner_text){ ?>
	<div class="overlay">
		<div class="container">
			<h1><?= $banner_text; ?></h1>
		</div>
	</div>
<?php } ?>
	<?php if($link_text = get_sub_field('link_text')) { ?>
		<div class="link">
			<?php if($link_url = get_sub_field('link_url')) { ?><a href="<?= get_post_type_archive_link('project'); ?>"><?php } ?>
				<span class="normal-text"><?= $link_text; ?></span>
			<?php if($link_url) { ?></a><?php }?>
		</div>
	<?php } ?>
	<div class="video-section">
		<div class="video-section__overlay">
			<?= wp_get_attachment_image( $banner_image['ID'], 'full-width', false ); ?>
		</div>
		<?php if ($video) :
			$vid_css = ($video_mobile || !empty($carousel)) ? 'hidden-xs' : '';
			?>
			<div class="iframe-wrap <?=$vid_css?>">
				<?=$video?>
			</div>
			<?php
			if($video_mobile) :
			?>
			<div class="iframe-wrap visible-xs">
				<?=$video_mobile?>
			</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if(!$video_mobile && !empty($carousel)) { ?>
			<div class="carousel-wrap">
				<?php
					foreach($carousel as $image) {
						print wp_get_attachment_image($image['ID'], 'full-width');
					}
				?>
			</div>
		<?php } ?>

		<a data-section-scroll href="#" class="arrow-down">
			<?php if(is_front_page()) { ?><span>Discover</span><?php } ?>
			<img src="<?= imageDir(true); ?>/arrow-down.svg" alt=""/>
		</a>
	</div>
</section>
