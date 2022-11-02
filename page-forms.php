<?php 
the_post();
get_header(); 
?>

<section class="header">
	<div class="container">
		<h2><?php the_title(); ?></h2>
	</div>
</section>


<?php 


?>
<section class="copy">
	<div class="container page-forms">
		<div class="row">

		<?php if( have_rows('logos') ): ?>
 
		

		<?php while( have_rows('logos') ): the_row(); ?>

			<div class="col-sm-4">

			<a href="<?php the_sub_field('link'); ?>"><img class="logo-image" src="<?php the_sub_field('logo'); ?>" alt=""></a>
		

			</div>
		<?php endwhile; ?>

		

		<?php endif; ?>


		
		</div>
	</div>
</section>

<?php get_footer(); ?>