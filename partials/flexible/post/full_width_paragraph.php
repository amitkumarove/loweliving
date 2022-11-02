<?php
$parafull = get_sub_field('paragraph');
$gutter_options = get_sub_field('gutter_options');
$gutter_class = '';
if($gutter_options) {
	$gutter_class = implode(' ', $gutter_options);
}
?>

<section class="full-width-paragraph <?=$gutter_class?>">
	<div class="container">
		<div class="content typography" data-visible>
			<?= $parafull; ?>
		</div>
	</div>
</section>