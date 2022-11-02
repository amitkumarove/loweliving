<section class="full-width-image">
	<?php
		switch(get_sub_field('type')) {
			case 'image':
				$fullimg = get_sub_field('image');
				$imglink = get_sub_field('image_link'); ?>
					<a href="<?= $imglink['url'];?>" target="<?= $imglink['target'];?>">
					<?php
				print wp_get_attachment_image($fullimg['ID'], 'full'); ?> </a>
				<?php 
				break;

			case 'video':
				print '<div class="embed-responsive embed-responsive-16by9">'.get_sub_field('video').'</div>';
				break;
		}
	?>
</section>