<section class="left-right-image">
	<div class="img-wrapper left-image" data-visible>
		<?php
			switch(get_sub_field('left_type')) {
				case 'image':
					$imgright = get_sub_field('left_image');
					$imglinkleft = get_sub_field('left_image_link'); ?>
					<a href="<?= $imglinkleft['url'];?>" target="<?= $imglinkleft['target'];?>">
					<?php
					print wp_get_attachment_image($imgright['ID'], 'full'); ?></a>
					<?php
					break;

				case 'video':
					print '<div class="embed-responsive embed-responsive-16by9">'.get_sub_field('left_video').'</div>';
					break;
			}
		?>
	</div>

	<div class="img-wrapper right-image" data-visible>
		<?php
			switch(get_sub_field('right_type')) {
				case 'image':
					$imgright = get_sub_field('right_image');
					$imglinkright = get_sub_field('right_image_link'); ?>
					<a href="<?= $imglinkright['url'];?>" target="<?= $imglinkright['target'];?>">
					<?php
					print wp_get_attachment_image($imgright['ID'], 'full');?></a>
					<?php
					break;

				case 'video':
					print '<div class="embed-responsive embed-responsive-16by9">'.get_sub_field('right_video').'</div>';
					break;
			}
		?>
	</div>
</section>
