<?php
	$title = get_the_title();
	$suburb = get_field('suburb');

	if($suburb) {
		$title = $title . ',<br/>' . $suburb;
	}
?>


<div class="motif motif--single">
	<div class="motif__wrap">
		<span class="motif--single__inner motif__inner--xlightgrey"><b></b></span>
	</div>
</div>
<div class="container">
	<div class="content-wrapper">
		<div class="content" data-visible>
				<h3 class="subtitle">
					<?php
						if($notice = get_field('notice')) {
							print $notice;
						}
						else if($status = get_field('project_status')) {
							print $status;
						}
					?>
				</h3>
			<h2 class="title"><?=$title?></h2>
			<p class="copy"><?= wp_trim_words(get_the_excerpt(), 16); ?></p>
			<a class="view-btn arrow-link__wrapper" href="<?php the_permalink(); ?>">View project<span class="arrow-link"></span></a>
		</div>
	</div>
</div>
<?php if($image_override = get_field('feature_image_override')) { ?>
	<div class="img-wrapper" data-visible>
		<img class="full-bleed-img" src="<?= wp_get_attachment_image_url($image_override, 'full'); ?>" alt="banner"/>
	</div>
<?php } else if(has_post_thumbnail()) { ?>
	<div class="img-wrapper" data-visible>
		<img class="full-bleed-img" src="<?= get_the_post_thumbnail_url(null ,'full'); ?>" alt="banner"/>
	</div>
<?php } ?>

	