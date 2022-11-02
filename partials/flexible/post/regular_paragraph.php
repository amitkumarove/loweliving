<?php
$para = get_sub_field('paragraph');
$bg	= get_sub_field('select_bg');

$gutter_options = get_sub_field('gutter_options');
$gutter_class = '';
if($gutter_options) {
	$gutter_class = implode(' ', $gutter_options);
}
?>
<section class="regular-paragraph bg-<?php if($bg == 'True'){echo 'light';}?> <?=$gutter_class?>">
	<div class="container">
		<div class="content typography" data-visible>
			<?=$para;?>
		</div>
	</div>
</section>