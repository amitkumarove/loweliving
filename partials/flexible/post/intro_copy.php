<?php
$intro = get_sub_field('intro');
$bg	= get_sub_field('select_bg');

$gutter_options = get_sub_field('gutter_options');
$gutter_class = '';
if($gutter_options) {
	$gutter_class = implode(' ', $gutter_options);
}
?>
<section class="intro-copy bg-<?php if($bg == 'True'){echo 'light';}?> <?=$gutter_class?>">
	<div class="container">
		<h2><?= $intro; ?></h2>
	</div>
</section>