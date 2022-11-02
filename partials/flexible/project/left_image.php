<?php
$size = get_sub_field('size');
?>

<section class="left-image left-image--<?=$size?>">
	<div class="img-wrapper" data-visible>
		<?php
			switch(get_sub_field('type')) {
				case 'image':
					$imgleft = get_sub_field('image');
					$imglink = get_sub_field('image_link'); ?>
					<a href="<?= $imglink['url'];?>" target="<?= $imglink['target'];?>">
					<?php
					print wp_get_attachment_image($imgleft['ID'], 'full'); ?> </a>
					<?php 
					break;

				case 'video':
					print '<div class="embed-responsive embed-responsive-16by9">'.get_sub_field('video').'</div>';
					break;
			}
		?>
	</div>
</section>
