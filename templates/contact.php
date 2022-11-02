<?php
// Template Name: Contact

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
		<div class="video-section__overlay"><img src="<?= imageDir(true); ?>/get-in-touch-hero.jpg" alt="Lowe Living"/></div>
		<video class="video-block"></video>
		<!-- <div class="arrow-down"><img src="<?= imageDir(true); ?>/arrow-down.svg" alt=""/></div> -->
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
				<?php if(get_field('get_in_touch_content')){ ?><p><?php the_field('get_in_touch_content');?></p><?php }?>
			</div>
		</div>
	</div>
</section>
<section class="locations">
	<div class="link">
		<?php if(get_field('locations_heading')){ ?><span class="normal-text"><?php the_field('locations_heading');?> </span><?php }?>
	</div>
	<div class="container container--right-50">
		<div class="row">
			<div class="col-accurate col-xs-12 col-sm-4 col-md-3">
				<div id="location" class="tile location">
					<div class="typography" data-visible>
						<?php if(get_field('connect_us_heading')){?><h2 class="heading"><?php the_field('connect_us_heading');?></h2><?php }?>
						<?php if(get_field('address')){?><p class="address"><?php the_field('address');?></p><?php }?>
						<?php if(get_field('phone')){?>
							<a class="phone" href="tel:<?php the_field('phone');?>"><?php the_field('phone');?></a><br />
						<?php }?>
						<?php if(get_field('email')){?><a class="email" href="mailto:<?php the_field('email');?>"><?php the_field('email');?>
						</a><br />
						<?php }?>
						<?php if(get_field('second_email')){?>
							<a class="email" href="mailto:<?php the_field('second_email');?>"><?php the_field('second_email');?></a><br />
						<?php }?>
						<div>
							<?php if(get_field('connect_heading')){?>
								<h2 class="social-link-heading"><?php the_field('connect_heading');?>
								</h2>
							<?php }?>
							<ul class="social">
								<li><a href="<?php the_field('facebook');?>" target="_blank">Facebook</a></li>
								<li><a href="<?php the_field('instagram');?>" target="_blank">Instagram</a></li>
								<li><a href="<?php the_field('linkedin');?>" target="_blank">Linkedin</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-expand col-xs-12 col-sm-8 col-md-8 col-md-offset-1">
				<a class="temp-map-link" href="https://goo.gl/maps/AhdDiHjS2Fr7Xubu9" target="_blank">
					<img class="hidden-xs hidden-sm" src="<?= imageDir(true).'/map.jpg'; ?>" alt="" />
					<img class="visible-xs visible-sm" src="<?= imageDir(true).'/map-mobile.jpg'; ?>" alt="" />
				</a>
					<?php /*
				<div class="map-wrapper" data-visible data-visible-delay="100">
					<div id="map">
						<?php foreach(get_field('locations') as $index => $l) { ?>
							<div class="map-pin" data-parent="#location-<?= $index; ?>" data-latitude="<?= $l['map_location']['lat']; ?>" data-longitude="<?= $l['map_location']['lng']; ?>" data-pin="<?= imageDir(true).'/map-pin-default.png'; ?>"></div>
						<?php } ?>
					</div>
				</div>
					*/ ?>
			</div>
		</div>
	</div>

	<div class="scroll-section">
		<a href="#contact">Contact Us
			<div><img src="<?= imageDir(true); ?>/arrow-down-pink.svg" alt="arrow"/></div>
		</a>
	</div>
</section>
<section class="contact-section" id="contact">
	<div class="link">
		<span class="normal-text">Get in touch</span>
	</div>
	<div class="motif motif--top-right hidden-xs">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--lightgrey"><b></b></span>
			<span class="motif__outer motif__outer--xlightgrey"><b></b></span>
		</div>
	</div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-6">
                <div class="contact-intro">
                    <h2 class="text-left"><span class="intro-h2"><?php echo get_field('contact_section_content');?><span></h2>
                </div>
            </div>
            <div class="col-xs-12 col-md-8 col-lg-6">
				<?= do_shortcode('[contact-form-7 id="'.get_field('contact_form').'"]'); ?>
            </div>
        </div>
        
    </div>
</section>
<?php get_footer(); ?>