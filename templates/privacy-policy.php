<?php
// Template Name: Privacy Policy

the_post();
get_header();
?>
<section class="landing banner">
	<div class="overlay">
		<h1><?php the_title();?></h1>
	</div>
	<div class="video-section">
		<div class="video-section__overlay"><img src="<?= imageDir(true); ?>/privacy-policy-hero.jpg" alt="Lowe Living"/></div>
		<video class="video-block"></video>
	</div>
	
</section>
<div class="landing-spacer"></div>
<section class="privacy-content bg-dark white">
    <div class="motif motif--top-left">
    	<div class="motif__wrap">
			<span class="motif__inner motif__inner--orange"><b></b></span>
			<span class="motif__outer motif__outer--grey"><b></b></span>
		</div>
	</div>
    <div class="container">
        <div class="row">
            <div class="typography">
            <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>