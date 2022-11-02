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
			if($notice = get_field('notice')) {
				print $notice;
			}
			else if($status = get_field('project_status')) {
				print $status;
			}
		?>
	</h6>		
	<div class="title">
		<h5>
			<a href="<?= get_permalink(); ?>">
				<?php
					$title = get_the_title();
					$suburb = get_field('suburb');

					if($suburb) {
						$title = $title . ', ' . $suburb;
					}

					print $title;
				?>
			</a>
		</h5>
	</div>
	
	<p><?= wp_trim_words(get_the_excerpt(), 16); ?></p>

	<a href="<?php the_permalink(); ?>" class="read-more-btn arrow-link__wrapper">View project<span class="arrow-link arrow-link--wide"></span></a></a>

</div>
