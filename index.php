<?php
get_header();
?>

<section class="landing banner">
	<div class="overlay">
		<div class="container container-strict">
			<h1>Our News</h1>
		</div>
	</div>
	<div class="video-section">
		<div class="video-section__overlay"><img src="<?= imageDir(true); ?>/news-banner.jpg" alt="Lowe Living"/></div>
		<video class="video-block"></video>
	</div>
</section>
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
				<h6>POSTS FROM</h6>
				<select onchange="window.location.href=this.value;" autocomplete="off">
					<option value="<?=get_permalink(get_option('page_for_posts'))?>">All</option>
					<?php
						wp_get_archives(array(
							'type' => 'monthly',
							'format' => 'option',
						));
					?>
				</select>
			</div>


			<div class="filter">
				<h6>CATEGORY</h6>
				<?php
					wp_dropdown_categories(array(
						'show_option_all' => 'Insights',
						'hide_if_empty' => false,
						'exclude' => '1'
					));
				?>
				<script>
					document.getElementById('cat').onchange = function(){
						if(this.value !== '-1'){
							if(this.value == '0') {
								window.location='<?=get_permalink(get_option('page_for_posts'))?>';
							}
							else {
								window.location='<?=get_option('home')?>/?cat='+this.value
							}
						}
					}
				</script>
			</div>
	</div>
</section>


<?php 
$i = 0;

if(get_field('featured_article', 'blog') && get_post_status(get_field('featured_article', 'blog')) == 'publish' && is_home() && get_query_var('paged') < 2) {
	$featured = new WP_Query(array(
		'p' => get_field('featured_article', 'blog'),
	));
	//print_r($featured);
	$news_size = 'latest-news';
	$featured->the_post();

	?>
	<!-- <div class="col-xxs-12 col-xs-6 col-sm-4 col-md-6 featured-article">
		<div data-visible data-trigger="#posts" data-visible-delay="<?= 100 * $i++; ?>"> -->
			<section class="project featured-post-wrapper">
				<section class="featured-project featured-post half-left-bleed orientation-landscape">
					<div class="container">
						<div class="content-wrapper">
							<div class="link">
								<span class="normal-text">OUR News</span>
							</div>
							<div class="motif motif--single motif--top-left">
								<div class="motif__wrap">
									<span class="motif--single__inner motif__inner--xlightgrey"><b></b></span>
								</div>
							</div>
							<div class="content" data-visible>
								<h3 class="subtitle">FEATURED — <?= strtoupper(get_the_date('d M Y')); ?></h3>
								<h2 class="title"><?php the_title();?></h2>
								<p class="copy"><?= wp_trim_words(get_the_excerpt(), 16); ?></p>
								<a class="view-btn arrow-link__wrapper" href="<?php the_permalink(); ?>">Read more<span class="arrow-link"></span></a>
							</div>
						</div>
					</div>
					<?php if(has_post_thumbnail()) { ?>
						<div class="img-wrapper" data-visible>
							<img class="full-bleed-img" src="<?= get_the_post_thumbnail_url(null ,'post-featured'); ?>" alt="banner"/>
						</div>
					<?php } ?>
				</section>
			</section>
	<!-- 	</div>
	</div> -->
	<?php

	wp_reset_postdata();
}
?>
<section id="posts" class="posts latest-news">
	<div class="link">
		<span class="normal-text">OUR News</span>
	</div>
	<div class="motif motif--single motif--top-left">
		<div class="motif__wrap">
			<span class="motif--single__inner motif__inner--xlightgrey"><b></b></span>
		</div>
	</div>
	<div class="motif motif--single motif--bottom-right">
		<div class="motif__wrap">
			<span class="motif--single__inner motif__inner--orange"><b></b></span>
		</div>
	</div>
	<div class="container">
		<?php if(have_posts() || get_field('featured_article', 'blog')) { ?>
			<div class="row">
				<div class="wrapper-latestnews wrapper">
				<?php
					$i = 0;

					$news_size = 'news-thumbnail';
					while(have_posts()) {
						the_post();

						?>
						<div class="latest-article" data-visible>
							<?php include get_template_directory().'/partials/post.php'; ?>
						</div>
						<?php
					}
				?>
				</div>
			</div>
		<?php } else { ?>
			<div class="no-posts">
				<p>There are no posts</p>
			</div>
		<?php } ?>
	</div>
	<?php

	$printed_posts = get_option('posts_per_page') - (get_field('featured_article', 'blog') && is_home() && get_query_var('paged') < 2 ? 2 : 0);

	if($wp_query->found_posts > $printed_posts) {
		?>
		<section class="loadmore">
			<button class="button load-more arrow-link__wrapper">View more articles<span class="arrow-link arrow-link--wide"></span></button>
		</section>
		<?php
	}

	?>
</section>



<?php get_footer(); ?>
