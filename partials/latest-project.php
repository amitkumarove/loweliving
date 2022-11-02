<?php

$status = get_the_terms(get_the_ID(), 'project-status');
$colour = get_the_terms(get_the_ID(), 'project-division');

?>
<a href="<?php the_permalink(); ?>">
	<div class="tile project">
		<div class="image">
			<img class="hidden-xs" src="<?= get_the_post_thumbnail_url(null, 'latest-project'); ?>"/>
			<img class="visible-xs" src="<?= get_the_post_thumbnail_url(null, 'latest-project-mobile'); ?>"/>
		</div>

		<div class="title">
			<h5><?php the_title(); ?>, <br /><?php the_field('suburb'); ?></h5>
		</div>

		<div class="overlay bg-<?= ($colour ? $colour[0]->slug : 'default'); ?>">
			<div>
				<?php if(get_field('notice')) { ?>
					<h6 class="heading"><?php the_field('notice'); ?></h6>
				<?php } ?>
				
				<p><?= wp_trim_words(get_the_excerpt(), 12); ?></p>
			</div>
		</div>
	</div>
</a>