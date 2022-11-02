<?php
// Template Name: Services

the_post();
get_header();
?>


<?php
    if (get_field('content_modules')) {
        while (have_rows('content_modules')) : the_row();
            include get_template_directory() . '/partials/flexible/' . get_row_layout() . '.php';
        endwhile;
    }
    ?>
<div class="landing-spacer"></div>
<section class="two-col-text our-services--intro bg-light">
	<div class="link link--motif-offset">
		Our Services
	</div>

	<div class="motif motif--top-left">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--lightgrey"><b></b></span>
			<span class="motif__outer motif__outer--white"><b></b></span>
		</div>
	</div>
	<div class="container">
		<div class="link">
			<a href="<?= get_post_type_archive_link('post'); ?>" class="">
				<span class="normal-text"><?php the_field('title');?></span>
			</a>
		</div>
		<div class="row">
			<?php while( have_rows('who_we_are') ): the_row(); ?>
			<div class="col-md-6">
				<div class="content-item content-wrapper typography">
					<?= wp_get_attachment_image(get_sub_field('image')['ID'], 'full'); ?>
					<?= the_sub_field('content');?>
				</div>
			</div>
		<?php endwhile;?>
		</div>
	</div>
</section>

<section class="services-image-copy services-image-copy--image-right">
    <div class="img-wrapper" data-visible>
		<?= wp_get_attachment_image(get_field('main_image')['ID'], 'full'); ?>
		<div class="motif motif--bottom-right">
			<div class="motif__wrap">
				<span class="motif__inner motif__inner--white"><b></b></span>
				<span class="motif__outer motif__outer--orange"><b></b></span>
			</div>
		</div>
    </div>
    <div class="container services-image-copy__copy-section">
        <div class="link">
			<a href="<?= get_post_type_archive_link('post'); ?>" class="">
				<span class="normal-text"><?php the_field('our_service_title'); ?></span>
			</a>
        </div>
        <div class="inner">
	        <div class="row">
	            <div class="col-xs-12 col-md-6">
	                <div class="services-image-copy__copy typography" data-visible>
						<?php the_field('our_service_content'); ?>

	                </div>
	            </div>
	        </div>
	    </div>
    </div>
</section>


<!-- <section class="single-img-section single-img-section--offset-left">
	<?= wp_get_attachment_image(get_field('main_image')['ID'], 'full'); ?>
	<div class="motif motif--bottom-right">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--white"><b></b></span>
			<span class="motif__outer motif__outer--orange"><b></b></span>
		</div>
	</div>
</section>

<section class="single-col-text single-col-text--no-bottom-gutter bg-dark">
	<div class="link">
		<a href="<?= get_post_type_archive_link('post'); ?>" class="">
			<span class="normal-text"><?php the_field('our_service_title'); ?></span>
		</a>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-6">
				<?php the_field('our_service_content'); ?>
			</div>
		</div>
	</div>
</section>
 -->
<section class="two-col-text our-services--sub-content bg-dark">
	<div class="container">
		<?php while( have_rows('our_services_container') ): the_row(); ?>
			<div class="content-item content-wrapper typography" data-visible>
				<?= wp_get_attachment_image(get_sub_field('image')['ID'], 'full'); ?>
				<div class="content-item__copy">
					<?php the_sub_field('content');?>
				</div>
			</div>
		<?php endwhile;?>
	</div>
</section>
<?php get_footer(); ?>