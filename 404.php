<?php get_header(); ?>

<section class="copy">
	<div class="container">
		<div class="typography">
			<?php the_field('404_message', 'options'); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>