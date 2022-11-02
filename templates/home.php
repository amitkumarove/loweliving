<?php
// Template Name: Home
the_post();
get_header();
$page_id = get_queried_object_id();
//$position = get_field('select_project_bleed', $page_id);
?>

<?php
    if (get_field('content_modules')) {
        while (have_rows('content_modules')) : the_row();
            include get_template_directory() . '/partials/flexible/' . get_row_layout() . '.php';
        endwhile;
    }
    ?>

<div class="landing-spacer"></div>
<!-- Intro section Starts !-->
<?php include get_template_directory().'/partials/home/intro.php'; ?>
<!-- Intro section Ends !-->
<!-- Feautred Project Starts !-->

<?php
$featured_project = get_field('featured_project');

$projects_css = '';
if(!$featured_project) {
	$projects_css .= ' project--no-featured';
}
?>

<section class="project project--home <?=$projects_css?>">
	<div class="motif motif--top-right">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--white"><b></b></span>
			<span class="motif__outer motif__outer--orange"><b></b></span>
		</div>
	</div>

	<?php if(!$featured_project) { ?>
	<div class="link">
		Our Projects
	</div>
	<?php } ?>

	<?php include get_template_directory().'/partials/flexible/project-full-bleed.php'; ?>

		<?php if(have_rows('featured_projects')) {
			while(have_rows('featured_projects')) {
				the_row();
				$i = get_row_index();
				$post = get_sub_field('project');
				if($featured_project) {
					$side = ($i % 2 ? 'right' : 'left');
				}
				else {
					$side = ($i % 2 ? 'left' : 'right');
				}
				if($post) {
					setup_postdata($post); ?>

					<section class="featured-project <?= 'half-'.$side.'-bleed'; ?> <?= 'orientation-'.get_field('image_orientation'); ?>">

						<?php include get_template_directory().'/partials/flexible/project-half-bleed.php'; ?>

					</section>

				<?php
					wp_reset_postdata();
				}
			}
		} ?>

	<?php // ?>	
	<div class="view-btn-wrapper text-center"><a href="<?= get_post_type_archive_link('project'); ?>" class="arrow-link__wrapper">View all projects<span class="arrow-link"></span></a></div>
</section>
<!-- Feautred Project Ends !-->
<!-- Testimonial Starts !-->
<?php if( have_rows('testimonals') ): ?>
<?php include get_template_directory().'/partials/testimonial.php'; ?>
<?php endif;?>

<!-- Testimonial Ends !-->
<!-- Latest News Section !-->
<section id="latestnews" class="latest-news">
	<div class="link">
		<a href="<?= get_post_type_archive_link('post'); ?>" class="">
			<span class="normal-text">OUR NEWS</span>
		</a>
	</div>
	<div class="container">
		
		<h1>The Latest</h1>
		<div class="wrapper-latestnews">
			<?php
				$news_size = 'latest-news';
				$news = new WP_Query(array(
					'post_type' => 'post',
					//'post__not_in' => array($featured_id),
					'posts_per_page' => 2,
				));
				$i = 0;
				while($news->have_posts()) {
					$news->the_post();

					?>
					<div class="latest-article" data-visible data-visible-delay="<?= $i * 100; ?>">
						<?php include get_template_directory().'/partials/post.php'; ?>
					</div>
					<?php
					$i++;
				}
				wp_reset_postdata();
			?>
		</div>
		<div class="common-home-btn"><a href="<?= get_post_type_archive_link('post'); ?>" class="arrow-link__wrapper">View more articles<span class="arrow-link arrow-link--wide"></span></a></a></div>
	</div>
</section>
<?php get_footer(); ?>

