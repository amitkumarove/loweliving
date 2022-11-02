<?php
$quote = get_sub_field('quote');
$gutter_options = get_sub_field('gutter_options');
$gutter_class = '';
if($gutter_options) {
	$gutter_class = implode(' ', $gutter_options);
}
?>

<section class="blockquote <?=$gutter_class?>">
	<div class="container">
		<div class="content" data-visible>
		<?= $quote ; ?>
		</div>
	<div>
</section>