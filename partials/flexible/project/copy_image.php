<section class="img-left-paragraph-right">
	<div class="img-wrapper" data-visible>
		<?php
			switch(get_sub_field('type')) {
				case 'image':
					$imglft = get_sub_field('image');
					$imglink = get_sub_field('image_link'); ?>
					<a href="<?= $imglink['url'];?>" target="<?= $imglink['target'];?>">
					<?php
					print wp_get_attachment_image($imglft['ID'], 'full'); ?>
					</a>
					<?php 
					break;

				case 'video':
					print '<div class="embed-responsive embed-responsive-16by9">'.get_sub_field('video').'</div>';
					break;
			}
		?>
		<figcaption><?= get_sub_field('image_caption');?></figcaption>
	</div>
	<div class="content" data-visible data-visible-delay="300">
		<div class="content-inner">
			<?php the_sub_field('copy'); ?>
		</div>
	</div>
</section>