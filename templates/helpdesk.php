<?php
// Template Name: Helpdesk

the_post();
get_header();
?>

<section class="banner landing">
	<div class="overlay">
		<div class="container container-strict">
			<h1><?php the_title();?></h1>
		</div>
	</div>
	<div class="video-section">
		<div class="video-section__overlay"><img src="<?= imageDir(true); ?>/helpdesk-hero.jpg" alt="Lowe Living"/></div>
		<video class="video-block"></video>
	</div>
	
</section>
<div class="landing-spacer"></div>
<section class="single-col-text bg-dark">
	<div class="motif motif--top-left">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--lightgrey"><b></b></span>
			<span class="motif__outer motif__outer--xlightgrey"><b></b></span>
		</div>
	</div>
	<div class="container container-strict">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-6" data-visible>
				<?php if(get_field('intro_text')){ ?><p><?php the_field('intro_text');?></p><?php }?>
			</div>
		</div>
	</div>
</section>
<section class="contact-section helpdesk" id="helpdesk-form">
	<div class="link">
		<span class="normal-text">Helpdesk</span>
	</div>
	<div class="motif motif--top-left hidden-xs">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--xlightgrey"><b></b></span>
		</div>
	</div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
				<?= do_shortcode('[contact-form-7 id="'.get_field('helpdesk_form').'"]'); ?>
            </div>
        </div>
        
    </div>
</section>
<?php get_footer(); ?>