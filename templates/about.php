<?php

// Template Name: About

the_post();
get_header();
?>

<?php
    if (get_field('content_modules')) {
        while (have_rows('content_modules')) : the_row();
            include get_template_directory() . '/partials/flexible/' . get_row_layout() . '.php';
        endwhile;
    }
    ?>

<div class="landing-spacer"></div>

<section class="intro-section section">
	<div class="link link--motif-offset link--white">
		Our Team
	</div>

	<div class="motif motif--top-left">
		<div class="motif__wrap">
			<span class="motif__outer motif__outer--white"><b></b></span>
			<span class="motif__inner motif__inner--lightgrey"><b></b></span>
		</div>
	</div>

	<div class="link link--white link--bottom-label visible-sm visible-xs">
		Our Philosophy
	</div>

	<div class="container">
		<div class="typography content" data-visible>
			<h3><?php the_field('intro_heading');?></h3>
			<p><?php the_field('intro_copy');?></p>
		</div>
		<div class="arrow-down visible-sm visible-xs">
			<a data-section-scroll href="#"><img src="<?= imageDir(true); ?>/arrow-down.svg" alt="arrow-down"/></a>
		</div>
	</div>
	<div class="motif motif--bottom-right">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--orange"><b></b></span>
			<span class="motif__outer motif__outer--orange"><b></b></span>
		</div>
	</div>

</section>



<section id="directors" class="directors">
	<div class="team-section-content">
		<div class="container">
			<div class="typography">
				<h2>Our Team</h2>
				<h3>Directors</h3>
			</div>
		</div>
	</div>
	<div class="profile-tiles">
		<?php foreach(get_field('directors') as $i => $profile) {
			$mod_4 = floor($i/4);
			$mod_3 = floor($i/3);
			$mod_2 = floor($i/2);
			$order_4 = (4 * ($mod_4 + 1)) + 1;
			$order_3 = (3 * ($mod_3 + 1)) + 1;
			$order_2 = (2 * ($mod_2 + 1)) + 1;

			$css_style = '--data-order:' . $order_4 . ';--data-order-md:' . $order_3 . ';--data-order-sm:' . $order_2 . ';';
			?>
			<div class="tile profile profile-tile" style="order: <?=($i+1)?>" data-visible data-visible-delay="<?= 100 * $i; ?>">
				<div class="photo">
					<img src="<?= $profile['photo']['sizes']['staff-photo-square']; ?>"/>
				</div>

				<div class="overlay typography">
					<div class="profile-label-wrapper">
						<p class="profile-name"><?= $profile['name']; ?></p>
						<p class="profile-role"><?= $profile['role']; ?></p>
					</div>
				</div>

				<svg class="plus" viewBox="0 0 31 30" xmlns="http://www.w3.org/2000/svg"><g stroke-width="1.2" stroke="currentColor" fill="none" fill-rule="evenodd"><path d="M15.5.65v29.047M30.023 15.174H.977"/></g></svg>
			</div>
			<div class="profile-tile--details" style="<?=$css_style?>" ie-style="<?=$css_style?>">
				<div class="profile-tile--details--inner">
					<div class="container">
						<div class="row">
							<div class="col-md-4 typography">
								<h3 class="profile-tile--details--name"><?= $profile['name']; ?></h3>
								<h4 class="profile-tile--details--role"><?= $profile['role']; ?></h4>
							</div>
							<div class="col-md-8 typography profile-tile--details--copy">
								<?= $profile['copy']; ?>
							</div>
						</div>
					</div>
					<a class="close-trigger">
						<svg class="icon" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"><g stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd"><path d="M1 1l34.231 34.231M35.231 1L1 35.231"/></g></svg>
					</a>
				</div>
			</div>
		<?php } ?>
	</div>
</section>


<section class="profiles">
		<?php foreach(get_field('team') as $team_index => $team) { ?>
			<?php
			$team_label = $team['name'];
			$team_logo = $team['team_section_image'];
			$team_copy = $team['team_section_copy'];
			?>

			<section class="img-left-paragraph-right">
				<div class="motif motif--top-left">
					<div class="motif__wrap">
						<span class="motif__inner motif__inner--white"><b></b></span>
						<span class="motif__outer motif__inner--white"><b></b></span>
					</div>
				</div>
				<div class="link">
					<?=$team_label?>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="img-wrapper" data-visible>
							<?= wp_get_attachment_image($team_logo, 'full'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="content typography" data-visible data-visible-delay="300">
								<?= $team_copy; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="profile-tiles">
				<?php foreach($team['profiles'] as $i => $profile) {
					$mod_4 = floor($i/4);
					$mod_3 = floor($i/3);
					$mod_2 = floor($i/2);
					$order_4 = (4 * ($mod_4 + 1)) + 1;
					$order_3 = (3 * ($mod_3 + 1)) + 1;
					$order_2 = (2 * ($mod_2 + 1)) + 1;

					$css_style = '--data-order:' . $order_4 . ';--data-order-md:' . $order_3 . ';--data-order-sm:' . $order_2 . ';';
					?>
					<div class="tile profile profile-tile" style="order: <?=($i+1)?>" data-visible data-visible-delay="<?= 100 * $i; ?>">
						<div class="photo">
							<img src="<?= $profile['photo']['sizes']['staff-photo-square']; ?>"/>
						</div>

						<div class="overlay typography">
							<div class="profile-label-wrapper">
								<p class="profile-name"><?= $profile['name']; ?></p>
								<p class="profile-role"><?= $profile['role']; ?></p>
							</div>
						</div>

						<svg class="plus" viewBox="0 0 31 30" xmlns="http://www.w3.org/2000/svg"><g stroke-width="1.2" stroke="currentColor" fill="none" fill-rule="evenodd"><path d="M15.5.65v29.047M30.023 15.174H.977"/></g></svg>
					</div>
					<div class="profile-tile--details" style="<?=$css_style?>" ie-style="<?=$css_style?>">
						<div class="profile-tile--details--inner">
							<div class="container">
								<div class="row">
									<div class="col-md-4 typography">
										<h3 class="profile-tile--details--name"><?= $profile['name']; ?></h3>
										<h4 class="profile-tile--details--role"><?= $profile['role']; ?></h4>
									</div>
									<div class="col-md-8 typography profile-tile--details--copy">
										<?= $profile['copy']; ?>
									</div>
								</div>
							</div>
							<a class="close-trigger">
								<svg class="icon" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"><g stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd"><path d="M1 1l34.231 34.231M35.231 1L1 35.231"/></g></svg>
							</a>
						</div>
					</div>

				<?php } ?>
			</div>
		<?php } ?>
	</div>
</section>


<section class="our-partners">
	<div class="team-section-content">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2 class="title-left" data-visible>
						<?= get_field('partners_title');?>
					</h2>
				</div>
				<div class="col-md-6">
					<div class="content-right" data-visible data-visible-delay="300">
						<?= get_field('partners_copy');?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="profile-tiles">
		<?php foreach(get_field('partners') as $i => $profile) {
			$mod_4 = floor($i/4);
			$mod_3 = floor($i/3);
			$mod_2 = floor($i/2);
			$order_4 = (4 * ($mod_4 + 1)) + 1;
			$order_3 = (3 * ($mod_3 + 1)) + 1;
			$order_2 = (2 * ($mod_2 + 1)) + 1;

			$css_style = '--data-order:' . $order_4 . ';--data-order-md:' . $order_3 . ';--data-order-sm:' . $order_2 . ';';
			?>
			<div class="tile profile profile-tile" style="order: <?=($i+1)?>" data-visible data-visible-delay="<?= 100 * $i; ?>">
				<div class="photo">
					<img src="<?= $profile['image']['sizes']['partner-photo-square']; ?>"/>
				</div>

				<div class="overlay typography">
					<div class="profile-label-wrapper">
						<p class="profile-name"><?= $profile['name']; ?></p>
						<p class="profile-role"><?= $profile['role']; ?></p>
					</div>
				</div>

				<svg class="plus" viewBox="0 0 31 30" xmlns="http://www.w3.org/2000/svg"><g stroke-width="1.2" stroke="currentColor" fill="none" fill-rule="evenodd"><path d="M15.5.65v29.047M30.023 15.174H.977"/></g></svg>
			</div>
			<div class="profile-tile--details" style="<?=$css_style?>" ie-style="<?=$css_style?>">
				<div class="profile-tile--details--inner">
					<div class="container">
						<div class="row">
							<div class="col-md-4 typography">
								<h3 class="profile-tile--details--name"><?= $profile['name']; ?></h3>
								<h4 class="profile-tile--details--role"><?= $profile['role']; ?></h4>
							</div>
							<div class="col-md-8 typography profile-tile--details--copy">
								<?= $profile['copy']; ?>
							</div>
						</div>
					</div>
					<a class="close-trigger">
						<svg class="icon" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"><g stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd"><path d="M1 1l34.231 34.231M35.231 1L1 35.231"/></g></svg>
					</a>
				</div>
			</div>

		<?php } ?>
	</div>
</section>

<?php get_footer(); ?>
