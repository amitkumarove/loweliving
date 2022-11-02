<div class="tile post">
	<div class="image">
		<a href="<?= get_permalink(); ?>">
			<?php if(has_post_thumbnail()) { ?>
				<img src="<?= get_the_post_thumbnail_url(null, $news_size); ?>" class="hidden-xs hidden-sm"/>
				<img src="<?= get_the_post_thumbnail_url(null, 'square-thumbnail-mobile'); ?>" class="hidden-md hidden-lg"/>
			<?php } else { ?>
				<div class="common-img" style="padding-bottom:100%;background:#30343a;"></div>
			<?php } ?>
		</a>
	</div>
	<h6 class="heading">
		<?php
			switch(get_post_type()) {
				case 'post':
					print 'News &bull; '.strtoupper(get_the_date('d M Y'));
					break;

				case 'page':
					print 'Page';
					break;

				case 'project':
					print 'Project';
					break;
			}
		?>
	</h6>		
	<div class="title">
		<h5><a href="<?= get_permalink(); ?>"><?php the_title(); ?></a></h5>
	</div>
	
	<?php if($excerpt = wp_trim_words(get_the_excerpt(), 16)) { ?>
		<p><?= $excerpt; ?></p>
	<?php } ?>

	<a href="<?php the_permalink(); ?>" class="read-more-btn arrow-link__wrapper">Read More<span class="arrow-link arrow-link--wide"></span></a></a>

</div>
