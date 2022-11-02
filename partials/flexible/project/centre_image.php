<?php
$size = get_sub_field('size');
?>

<section class="img-centre img-centre--<?=$size?>">
	<div class="container">
		<div class="img-wrapper" data-visible>
			<?php
				switch(get_sub_field('type')) {
					case 'image':
						$imgcent = get_sub_field('cent_image'); 
						$imglink = get_sub_field('image_link');
						?>
						<a href="<?= $imglink['url'];?>" target="<?= $imglink['target'];?>">
						<?php 
						print wp_get_attachment_image($imgcent['ID'], 'full'); ?>
						</a>

						<?php
						break;

					case 'video':
						print '<div class="embed-responsive embed-responsive-16by9">'.get_sub_field('cent_video').'</div>';
						break;
				}
			?>
		</div>
	</div>
</section>

