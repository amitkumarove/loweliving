<?php
$text = get_sub_field('text');
$gutter_options = get_sub_field('gutter_options');
$gutter_class = '';
if($gutter_options) {
	$gutter_class = implode(' ', $gutter_options);
}

if($text) :
?>

<section class="blockquote call-out-feature <?=$gutter_class?>">
	<div class="container">
		<div class="content bg-light" data-visible>
			<?=$text?>
		</div>
	</div>
</section>

<?php endif; ?>