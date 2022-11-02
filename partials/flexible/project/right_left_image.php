<section class="right-left-image">
	<div class="img-wrapper left-image" data-visible>
		<?php
			switch(get_sub_field('left_type')) {
				case 'image':
					$imgright = get_sub_field('left_image_1');
					$left_image_link = get_sub_field('left_image_link'); ?>
					<a href="<?= $left_image_link['url'];?>" target="<?= $left_image_link['target'];?>">
					<?php
					print wp_get_attachment_image($imgright['ID'], 'full');?></a>
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
					$imgright = get_sub_field('right_image_1');
					$right_image_link = get_sub_field('right_image_link'); ?>
					<a href="<?= $right_image_link['url'];?>" target="<?= $right_image_link['target'];?>">
					<?php
					print wp_get_attachment_image($imgright['ID'], 'full');?> </a>
					<?php
					break;

				case 'video':
					print '<div class="embed-responsive embed-responsive-16by9">'.get_sub_field('right_video').'</div>';
					break;
			}
		?>
	</div>
</section>
