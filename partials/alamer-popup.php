<div class="modal fade alamer-popup" id="alamer-popup" tabindex="-1" role="dialog" aria-labelledby="alamerpopup" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="alamer-modal-content">
				<div class="modal-links">
					<div class="modal-links__close" data-dismiss="modal">
						<?php echo file_get_contents(get_template_directory() . '/images/alamer-close.svg'); ?>
					</div>
				</div>
				<div class="alamer-modal-content-wrapper">
					<div class="alamer-modal-content__head">
						<?php echo wp_get_attachment_image(get_field('popup_image', 'option'), 'fullwidth', false, array('class' => 'hide-mobile')); ?>
						<?php echo wp_get_attachment_image(get_field('popup_image_mobile', 'option'), 'fullwidth', false, array('class' => 'show-mobile')); ?>
					</div>
					<div class="alamer-modal-content__copy">
						<p><?php the_field('popup_content', 'option'); ?></p>

						<?php if (get_field('popup_button_url', 'option')) : ?>
							<p>
								<a href="<?php the_field('popup_button_url', 'option'); ?>" class="modal--text--button" target="_blank"> <?php the_field('popup_button_text', 'option'); ?>
								</a>
							</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$button_color = get_field('popup_btn_color', 'option');
$button_text_color = get_field('popup_btn_text_color', 'option');
$close_color = get_field('popup_close_color', 'option');
$bg_color = get_field('popup_background_color', 'option');
$text_color = get_field('popup_text_color', 'option');
?>
<style>
	#alamer-popup .modal-links__close svg * {
		fill: <?= $close_color; ?>;
		stroke: <?= $close_color; ?>;
	}

	#alamer-popup .alamer-modal-content__copy .modal--text--button {
		color: <?= $button_text_color; ?>;
		border-color: <?= $button_color; ?>;
	}

	#alamer-popup .alamer-modal-content__copy .modal--text--button:hover,
	#alamer-popup .alamer-modal-content__copy .modal--text--button:focus {
		color: <?= $button_text_color; ?>;
		background-color: <?= $button_color; ?>;
	}

	#alamer-popup.alamer-popup .modal-content {
		background: <?= $bg_color; ?>;
	}

	#alamer-popup.alamer-popup .modal-content .alamer-modal-content__copy p {
		color: <?= $text_color; ?>;
	}
</style>