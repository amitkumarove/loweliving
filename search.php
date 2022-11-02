<?php get_header(); ?>

<section class="landing banner search-banner">
	<div class="overlay container">
		<h1>Search <img src="<?= imageDir(true); ?>/search-icon.svg" alt="Lowe Living"/> </h1>
		<form action="<?= get_site_url(); ?>" method="GET">
		<div class="input-group">
			<input type="text" name="s" placeholder="Enter search terms…"/>
			
		</div>
	</form>
	</div>
	<div class="video-section">
		<div class="video-section__overlay"><img src="<?= imageDir(true); ?>/search-banner.png" alt="Lowe Living"/></div>
		<video class="video-block"></video>
	</div>
	
</section>
<div class="landing-spacer"></div>		
<section class="posts search-post bg-light" id="search-result-section">
	<div class="motif motif--top-left">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--white"><b></b></span>
			<span class="motif__outer motif__outer--lightgrey"><b></b></span>
		</div>
	</div>
	<div class="container">
		<section class="header">
			<div class="container">
				<h2>results for: <span>'<?php print get_query_var('s'); ?>'</span></h2>
			</div>
		</section>
		<?php if(have_posts()) { ?>
			<div class="row">
				<div class="wrapper">
				<?php
					$news_size = 'news-thumbnail';
					while(have_posts()) {
						the_post();

						?>
						<div class="latest-article" data-visible>
							<?php include get_template_directory().'/partials/search-result.php'; ?>
						</div>
						<?php
					}
				?>
				</div>
			</div>

			<div class="pagination">
				<?php
					print paginate_links(array(
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'total'        => $wp_query->max_num_pages,
						'prev_text'    => '<i class="fa fa-angle-left" aria-hidden="true"></i><span class="sr-only">Previous</span>',
						'next_text'    => '<i class="fa fa-angle-right" aria-hidden="true"></i><span class="sr-only">Next</span>',
						'type'         => 'list',
						'end_size'     => 3,
						'mid_size'     => 3
					));
				?>
			</div>
		<?php } else { ?>
			<div class="no-posts">
				<p>No results were found</p>
			</div>
		<?php } ?>
	</div>
</section>

<?php get_footer(); ?>
