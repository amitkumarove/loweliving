<?php
// Template Name: Thank You

the_post();
get_header();
?>
<section class="landing">
    <div class="overlay">
        <div class="container container-strict">
            <h1><?php the_title();?></h1>
        </div>
    </div>
    <div class="video-section">
        <div class="video-section__overlay">
            <?=get_the_post_thumbnail( null, 'full-width')?>
        </div>
        <video class="video-block"></video>
    </div>
</section>
<div class="landing-spacer"></div>
<section class="thanks-content bg-light col-gap">
    <div class="motif motif--top-left">
        <div class="motif__wrap">
    		<span class="motif__inner motif__inner--white"><b></b></span>
            <span class="motif__outer motif__outer--lightgrey"><b></b></span>
        </div>
	</div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="left-copy">
                    <?php the_field("left_copy");?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-copy">
                    <?php the_field("right_copy");?>
                </div>
                <ul>
                    <?php if($facebook_link = get_field('facebook_link')) { ?>
                        <li><a href="<?= $facebook_link; ?>" target="_blank">Facebook</a></li>
                    <?php } ?>
                    <?php if($instagram_link = get_field('instagram_link')) { ?>
                        <li><a href="<?= $instagram_link; ?>" target="_blank">Instagram</a></li>
                    <?php } ?>
                    <?php if($linkedin_link = get_field('linkedin_link')) { ?>
                        <li><a href="<?= $linkedin_link; ?>" target="_blank">LinkedIn</a></li>
                    <?php } ?>
                </ul>
                <div class="home-button">
                    <a class="btn" href="<?= get_home_url(); ?>">Return To Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>