<section class="single-col-text bg-dark">
	<?php if( get_sub_field('side_label') == 'true' ){?>
	<div class="link">
		<a href="<?= get_post_type_archive_link('post'); ?>" class="">
			<span class="normal-text">OUR SUCCESSES</span>
		</a>
	</div><?php }?>
	<div class="land-acq-link--title link link--motif-offset link--white">
		Partner with us
	</div>
	<div class="motif motif--top-left">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--lightgrey"><b></b></span>
			<span class="motif__outer motif__outer--white"><b></b></span>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-6" data-visible>
				<h3><?php the_sub_field('heading'); ?></h3>
				<?php the_sub_field('content'); ?>
			</div>
		</div>
	</div>
</section>