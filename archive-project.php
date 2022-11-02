<?php

get_header();


$divisions = get_terms(array(
	'taxonomy' => 'project-division',
	'hide_empty' => false,
));

$statuses = get_terms(array(
	'taxonomy' => 'project-status',
	'hide_empty' => false,
));

$current_division = (!empty($_GET['division']) ? $_GET['division'] : false);
$current_status = (!empty($_GET['status']) ? $_GET['status'] : false);

?>

<?php
    if (get_field('content_modules','projects')) {
        while (have_rows('content_modules','projects')) : the_row();
            include get_template_directory() . '/partials/flexible/' . get_row_layout() . '.php';
        endwhile;
    }
    ?>
<div class="landing-spacer"></div>

<section class="posts-filter">
	<div class="motif motif--top-left">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--white"><b></b></span>
			<span class="motif__outer motif__outer--white"><b></b></span>
		</div>
	</div>
	<div class="link">
		<span class="normal-text">Filter</span>
	</div>
	<div class="container">
		<div class="filters">
	

			<div class="filter">
				<h6>DIVISION</h6>
				<select onchange="window.location.href=this.value;" autocomplete="off">
					<option value="<?= remove_query_arg('division'); ?>">All</option>
					<?php
						foreach($divisions as $div) {
							print '<option value="'.add_query_arg('division', $div->slug).'"';
							if($current_division && $div->slug == $current_division) {
								print ' selected';
							}
							print '>'.$div->name.'</option>';
						}
					?>
				</select>
			</div>


			<div class="filter">
				<h6>STATUS</h6>
				<select onchange="window.location.href=this.value;" autocomplete="off">
					<option value="<?= remove_query_arg('status'); ?>">All</option>
					<?php
						foreach($statuses as $status) {
							print '<option value="'.add_query_arg('status', $status->slug).'"';
							if($current_status && $status->slug == $current_status) {
								print ' selected';
							}
							print '>'.$status->name.'</option>';
						}
					?>
				</select>
			</div>
	</div>
</section>


			


<section class="project">
				<?php 
			$post_object = get_field('featured_project','projects');
			$post_object = (!$current_division && !$current_status ? $post_object : false);

			if( $post_object ): 

				// override $post
				$post = $post_object;
				setup_postdata( $post ); ?>

			<section class="featured-project full-bleed">
				<?php if(has_post_thumbnail()) { ?>
					<img class="full-bleed-img" src="<?= get_the_post_thumbnail_url(null ,'full'); ?>" alt="banner"/>
					<?php } ?>
					<div class="content">
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
						<h2 class="title">
							<?php
								$title = get_the_title();
								$suburb = get_field('suburb');

								if($suburb) {
									$title = $title . ', ' . $suburb;
								}

								print $title;
							?>
						</h2>
						<p class="copy"><?= wp_trim_words(get_the_excerpt(), 16); ?></p>
						<a class="view-btn arrow-link__wrapper" href="<?php the_permalink(); ?>">View project<span class="arrow-link"></span></a>
					</div>
					
				</section>
			   <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>	
				<?php
				$args = array(
					'post_type' => 'project',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'tax_query' => array(
						'relation' => 'AND',
					),
				);

				if($post_object) {
					$args['post__not_in'] = array($post_object->ID);
				}

				if($current_division) {
					$args['tax_query'][] = array(
						'taxonomy' => 'project-division',
						'terms' => array($current_division),
						'field' => 'slug',
					);
				}

				if($current_status) {
					$args['tax_query'][] = array(
						'taxonomy' => 'project-status',
						'terms' => array($current_status),
						'field' => 'slug',
					);
				}

				$projects = new WP_Query($args);
			
				$i = 1;
				while($projects->have_posts()) {
					
					$projects->the_post();

					?>
					<section class="featured-project <?= 'half-'.($i % 2 ? 'right' : 'left').'-bleed'; ?> <?= 'orientation-'.get_field('image_orientation'); ?>">

				 <?php include get_template_directory().'/partials/flexible/project-half-bleed.php'; ?>

				</section>

				<?php 
				$i = $i+1;			
				}
				wp_reset_postdata();
				?>

	<?php // ?>	
	<div class="view-btn-wrapper text-center">
		<a href="#top" class="arrow-link__wrapper">Back to top<span class="arrow-link arrow-link--up"></span></a>
		<div class="motif motif--single">
			<div class="motif__wrap">
				<span class="motif--single__inner motif__inner--orange"><b></b></span>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>