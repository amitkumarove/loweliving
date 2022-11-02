
<footer class="standard">
	<div class="link visible-xs visible-sm">
		<span class="normal-text">Contact</span>
	</div>
	<div class="container">
		<div class="flex">
			<div class="copy typography">
				<?php the_field('footer_left_copy', 'options'); ?>
			</div>
			<!--<div class="copy typography">
				<?php the_field('footer_right_copy', 'options'); ?>
			</div>-->
			<div class="social typography">
				<?php if(get_field('social_profiles', 'options')) { ?>
					<h6>Connect</h6>
					<ul class="social-menu">
						<?php foreach(get_field('social_profiles', 'options') as $profile) { ?>
							<li><a href="<?= $profile['url']; ?>" target="_blank"><?= $profile['type']['label']; ?></a></li>
						<?php } ?>
					</ul>
				<?php } ?>
			</div>
			<div class="taglines-menu typography">
				<h6><?php the_field('newsletter_title', 'options'); ?></h6>
				<div class="content-wrap">
					<p><?php the_field('newsletter_tagline', 'options'); ?></p>
					<span class="arrow-link"></span>
				</div>
			</div>
			<div class="newsletter">
				<?= do_shortcode('[contact-form-7 id="'.get_field('newsletter_form', 'options').'"]'); ?>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="copy-right">&copy;<?=date('Y')?> Lowe Living</div>
			<div class="footer-menu">
				<?php
					wp_nav_menu(array(
						'theme_location' => 'footer-menu',
						'container' => '',
						'depth' => 1,
					));
				?>
			</div>
		</p>
	</div>
</footer>
</div> <!-- end wrapper -->
<?php wp_footer(); ?>
</body>
</html>