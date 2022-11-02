<section class="intro-section section">
	<div class="motif motif--top-left">
		<div class="motif__wrap">
			<span class="motif__outer motif__outer--white"><b></b></span>
			<span class="motif__inner motif__inner--lightgrey"><b></b></span>
		</div>
	</div>
	<div class="link link--white">
		<?php the_field('intro_title');?>
	</div>
	<div class="container">
		<div class="typography content" data-visible>
			<h3><?php the_field('intro_heading');?></h3>
			<?php the_field('intro_copy');?>
		</div>
		<div class="arrow-down">
			<a data-section-scroll href="#"><img src="<?= imageDir(true); ?>/arrow-down.svg" alt="arrow-down"/></a>
		</div>
	</div>
</section>