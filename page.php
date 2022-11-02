<?php 
the_post();
get_header(); 
?>

<section class="header">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>
</section>

<section class="copy">
	<div class="container">
		<div class="typography">
			<?php the_content(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>