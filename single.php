<?php 
the_post();
get_header(); 
?>
<?php
$url = get_the_permalink();
$share_url = $url;
$title = get_the_title();
?>
<section class="landing banner blog-banner">
    <div class="link">
    	Our News
    </div>
	<div class="overlay">
		<div class="container container-strict">
			<div class="row">
				<div class="col-md-9">
					<h2><?php the_title(); ?></h2>
				</div>
				<div class="col-md-3">
					<div class="blog-data">
						<p class="title"> Posted </p>
						<h6><?= get_the_date('d F Y'); ?></h6>
					</div>
					<div class="blog-data">
						<p class="title"> Category </p>
						<?php the_category();?>
					</div>
					<div class="blog-data">
						<p class="title"> Share </p>
						<ul>
							<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=$share_url?>">Facebook</a></li>
							<li><a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?=$share_url?>">Linkedin</a></li>
							<li><a target="_blank" href="mailto:?subject=Check%20out%20this%20article%20on%20Lowe%20Living&body=<?=$title?>%0A<?=$share_url?>">Email</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php if(has_post_thumbnail()) { ?>
<section class="post-featured-image">
	<div class="motif motif--top-left">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--orange"><b></b></span>
			<span class="motif__outer motif__outer--orange"><b></b></span>
		</div>
	</div>
	<div class="container">
		<a href="<?= get_field('featured_image_link')['url']; ?>">
			<img class="post-featured-image--img" src="<?= get_the_post_thumbnail_url(null ,'post-featured'); ?>" alt="" />
		</a>
	</div>
</section>
<?php } ?>


<div class="post-copy-wrapper">
<?php
	ob_start();
	the_content();
	$content = ob_get_clean();
	if($content) {
?>

	<section class="copy std-copy">
		<div class="container">
			<div class="typography" data-visible>
				<?=$content?>
			</div>
		</div>
	</section>
<?php
	}
    if (get_field('post_modules')) {
        while (have_rows('post_modules')) : the_row();
            include get_template_directory() . '/partials/flexible/post/' . get_row_layout() . '.php';
        endwhile;
    }
    ?>
</div>

<section id="latestnews" class="latest-news bg-light">
	<div class="link">
		<a href="<?= get_post_type_archive_link('post'); ?>" class="">
			<span class="normal-text">OUR NEWS</span>
		</a>
	</div>
	<div class="motif motif--top-left">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--lightgrey"><b></b></span>
			<span class="motif__outer motif__outer--xlightgrey"><b></b></span>
		</div>
	</div>
	<div class="motif motif--single motif--bottom-right">
		<div class="motif__wrap">
			<span class="motif--single__inner motif__inner--xlightgrey"><b></b></span>
		</div>
	</div>
	<div class="container">
		
		<h1>Related Articles</h1>
		<div class="wrapper-latestnews">
			<?php
			$news_size = 'latest-news';
			$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 
				'numberposts' => 2,
				'post__not_in' => array($post->ID) ) );
				if( $related ) foreach( $related as $post ) { 

				setup_postdata($post);
					?>
					<div class="latest-article" data-visible>
						<?php include get_template_directory().'/partials/post.php'; ?>
					</div>
					<?php
				}
				wp_reset_postdata();
			?>
		</div>
		<div class="common-home-btn"><a href="<?= get_post_type_archive_link('post'); ?>" class="arrow-link__wrapper">View more articles<span class="arrow-link arrow-link--wide"></span></a></a></div>
	</div>
</section>

<section class="nextprev">
	<div class="container">
		<ul>
			<?php
				if(get_the_ID() == get_field('featured_article', 'blog')) {
					// If this is the featured article, only have a next link that goes to the latest post
					$first = get_posts(array(
						'posts_per_page' => 1,
						'exclude' => get_field('featured_article', 'blog'),
					));
					$first = ($first && !empty($first) ? $first[0] : false);

					?>
					<li class="visible-xs"><a href="<?= get_permalink(get_option('page_for_posts')); ?>" class="archive">BACK TO <?= strtoupper(get_field('title', 'blog')); ?></a></li>
					<li></li>
					<li class="hidden-xs"><a href="<?= get_permalink(get_option('page_for_posts')); ?>" class="archive">BACK TO <?= strtoupper(get_field('title', 'blog')); ?></a></li>
					<li>
						<?php if($first) { ?>
							<a href="<?= get_permalink($first); ?>" class="next">NEXT <img src="<?= imageDir(true); ?>/arrow-right.png"/></a>
							<span class="hover"></span>
						<?php } ?>
					</li>
					<?php
				}
				else {
					$prev = get_next_post();
					$next = get_previous_post();

					if(!$prev && get_field('featured_article', 'blog')) {
						// No prev means this is the latest post, try to use the featured article
						$prev = get_post(get_field('featured_article', 'blog'));
					}
					else if($prev && $prev->ID == get_field('featured_article', 'blog')) {
						// Prev is the featured article, skip over it
						$old_post = $post;
						$post = get_post(get_field('featured_article', 'blog'));
						$prev = get_next_post();
						$post = $old_post;
					}

					if($next && $next->ID == get_field('featured_article', 'blog')) {
						// Next is the featured article, skip over it
						$old_post = $post;
						$post = get_post(get_field('featured_article', 'blog'));
						$next = get_previous_post();
						$post = $old_post;
					}

					?>
					<li class="visible-xs"><a href="<?= get_permalink(get_option('page_for_posts')); ?>" class="archive">BACK TO <?= strtoupper(get_field('title', 'blog')); ?></a></li>
					<li>
						<?php if($prev) { ?>
							<a href="<?= get_permalink($prev); ?>" class="prev"><img src="<?= imageDir(true); ?>/arrow-left.png"/> PREV</a>
							<span class="hover"></span>
						<?php } ?>
					</li>
					<li class="hidden-xs"><a href="<?= get_permalink(get_option('page_for_posts')); ?>" class="archive">BACK TO <?= strtoupper(get_field('title', 'blog')); ?></a></li>
					<li>
						<?php if($next) { ?>
							<a href="<?= get_permalink($next); ?>" class="next">NEXT <img src="<?= imageDir(true); ?>/arrow-right.png"/></a>
							<span class="hover"></span>
						<?php } ?>
					</li>
					<?php
				}
			?>
		</ul>
	</div>
</section>

<?php get_footer(); ?>