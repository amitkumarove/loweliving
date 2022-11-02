<?php 
$post_object = get_field('featured_project');

if( $post_object ): 

	// override $post
	$post = $post_object;
	setup_postdata( $post ); 

	$title = get_the_title();
	$suburb = get_field('suburb');

	if($suburb) {
		$title = $title . ', ' . $suburb;
	}
	?>

<section class="featured-project full-bleed">
	<div class="link">
			<span class="normal-text">OUR PROJECTS</span>
	</div>	
		<?php if($image_override = get_field('feature_image_override')) { ?>
			<img class="full-bleed-img" src="<?= wp_get_attachment_image_url($image_override, 'full'); ?>" alt="banner"/>
		<?php } else if(has_post_thumbnail()) { ?>
			<img class="full-bleed-img" src="<?= get_the_post_thumbnail_url(null ,'full'); ?>" alt="banner"/>
		<?php } ?>
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
	</section>
   <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

 