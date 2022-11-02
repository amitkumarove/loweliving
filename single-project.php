<?php

the_post();
get_header();

$division = get_the_terms(get_the_ID(), 'project-division');
$status = get_the_terms(get_the_ID(), 'project-status');

$major_image = get_field('major_image');
$major_video = get_field('major_video');

?>

<section class="landing">
	<div class="overlay">
		<div class="container">
			<h1>
				<?php
					$title = get_the_title();
					$suburb = get_field('suburb');

					if($suburb) {
						$title = $title . ',<br/>' . $suburb;
					}

					print $title;
				?>
			</h1>
		</div>
	</div>
	<div class="link">
		<a href="<?= get_post_type_archive_link('project'); ?>">
			<span class="normal-text">Our Projects</span>
		</a>
	</div>
	<div class="video-section">
		<div class="video-section__overlay">
			<img src="<?= get_the_post_thumbnail_url(null ,'full'); ?>" alt="Lowe Living"/></div>
		<video class="video-block"></video>
	</div>
	<a data-section-scroll href="#" class="arrow-down">
		<img src="<?= imageDir(true); ?>/arrow-down.svg" alt=""/>
	</a>
</section>
<div class="landing-spacer"></div>

<?php
$project_details_css = 'project-details--no-gutter';

if($major_image || $major_video) {
	$project_details_css = '';
}
?>

<section class="project-details <?=$project_details_css?>">
	<div class="motif motif--top-left">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--white"><b></b></span>
			<span class="motif__outer motif__outer--white"><b></b></span>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-6 logo-website">
				<?php if(get_field('project_logo')) { ?>
					<img class="logo" src="<?= get_field('project_logo')['sizes']['project-logo']; ?>"/>
				<?php } ?>

				<?php if(get_field('project_website')) { ?>
					<a href="<?php the_field('project_website'); ?>" class="button bg-default" target="_blank">View project website <img class="icon" src="<?= imageDir(true); ?>/arrow-right-grey.png"/></a>
				<?php } ?>
				<?php if(!get_field('disable_enquiries')) { ?>
					<a href="#enquire" class="button bg-<?= $division[0]->slug; ?>" data-toggle="modal">Enquire now <img class="icon" src="<?= imageDir(true); ?>/arrow-right.png"/></a>
				<?php } ?>
			</div>

			<div class="col-xs-12 col-md-6 col-lg-6">
				<h6 class="notice">
					<?php the_field('project_status'); ?>
				</h6>
				<ul class="data">
					<li>
						<label>Location</label>
						<?= (get_field('address') ? get_field('address') : get_field('suburb')); ?>
					</li>

					<?php /*if($division) { ?>
						<li>
							<label>Project Delivery:</label>
							<?php
								print implode(', ', array_map(function($d) {
									return '<span class="clr-'.$d->slug.'">'.$d->name.'</span>';
								}, $division));
							?>
						</li>
					<?php }*/ ?>

					<?php
						if(get_field('metadata')) {
							foreach(get_field('metadata') as $data) {
								?>
								<li>
									<label><?= $data['label']; ?></label>
									<?= $data['value']; ?>
								</li>
								<?php
							}
						}
					?>
				</ul>

				
			</div>


		</div>
	</div>
</section>

<?php
if($major_image || $major_video) :
?>

<section class="post-image">
	<div class="img-cover">
		<?php
			switch(get_field('major_media_type')) {
				case 'image':
					if($major_image) {
						print wp_get_attachment_image($major_image['ID'], 'full');
					}
					break;

				case 'video':
					if($major_video) {
						print '<div class="embed-responsive embed-responsive-16by9">'.$major_video.'</div>';
					}
					break;
			}
		?>
	</div>
</section> 
<?php endif; ?>

<?php
    if (get_field('project_modules')) {
        while (have_rows('project_modules')) : the_row();
            include get_template_directory() . '/partials/flexible/project/' . get_row_layout() . '.php';
        endwhile;
    }
?>

<?php
$related_projects = get_field('related_projects');

if($related_projects) : ?>
<section id="latestnews" class="latest-news related-projects-section">
	<div class="motif motif--top-left">
		<div class="motif__wrap">
			<span class="motif__inner motif__inner--lightgrey"><b></b></span>
			<span class="motif__outer motif__outer--xlightgrey"><b></b></span>
		</div>
	</div>
	<div class="link">
		<a href="<?= get_post_type_archive_link('project'); ?>">
			<span class="normal-text">Our Projects</span>
		</a>
	</div>
	<div class="container">

		<h1>Related <br/>Projects</h1>
		<div class="wrapper-latestnews">
			<?php foreach($related_projects as $post): 
				setup_postdata($post); ?>
				<div class="latest-article" data-visible>
					<?php include get_template_directory().'/partials/project.php'; ?>
				</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<div class="common-home-btn"><a href="<?= get_post_type_archive_link('project'); ?>" class="arrow-link__wrapper">View all projects<span class="arrow-link arrow-link--wide"></span></a></a></div>
	</div>
</section>
<?php endif; ?>

<div id="enquire" class="modal fade">
	<div class="modal-dialog">
		<button type="button" class="close" data-dismiss="modal"><img src="<?= imageDir(true); ?>/close.png" alt="Close"/></button>

		<div class="modal-content">
			<form id="projectEnquiry" action="" method="post">
				<h4>Enquire Now</h4>

				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<input type="text" name="first_name" placeholder="First Name*"/>
					</div>

					<div class="col-xs-12 col-sm-6">
						<input type="text" name="last_name" placeholder="Last Name*"/>
					</div>
					
					<div class="col-xs-12 col-sm-6">
						<input type="email" name="email" placeholder="Email Address*"/>
					</div>
					
					<div class="col-xs-12 col-sm-6">
						<input type="text" name="mobile" placeholder="Phone Number*"/>
					</div>
				</div>

				<div class="flex">
					<span>Interested in:</span>
					<div class="select-container">
						<select name="project" autocomplete="off" class="has-placeholder" style="width:100%">
							<option value="">Select a project</option>
							<?php
								$projects = get_posts(array(
									'post_type' => 'project',
									'posts_per_page' => -1,
									'orderby' => 'title',
									'order' => 'ASC',
									'meta_query' => array(
										'relation' => 'OR',
										array(
											'key' => 'disable_enquiries',
											'compare' => 'NOT EXISTS',
										),
										array(
											'key' => 'disable_enquiries',
											'value' => '0',
											'compare' => '=',
										),
									),
									/*'meta_query' => array(
										'relation' => 'OR',
										array(
											'relation' => 'AND',
											array(
												'key' => 'salesforce_id',
												'compare' => 'EXISTS',
											),
											array(
												'key' => 'salesforce_id',
												'value' => '',
												'compare' => '!=',
											),
										),
										array(
											'relation' => 'AND',
											array(
												'key' => 'agent_emails',
												'compare' => 'EXISTS',
											),
											array(
												'key' => 'agent_emails',
												'value' => '0',
												'compare' => '>',
											),
										),
									),*/
								));

								foreach($projects as $project) {
									print '<option';
									if($project->ID == get_the_ID()) {
										print ' selected';
									}
									print ' value="'.$project->ID.'">'.$project->post_title.'</option>';
								}
							?>
						</select>
					</div>
				</div>

				<div class="sub-disclaimer">
					<input type="checkbox" value="1" checked="true" id="sub-disclaimer" name="sub-disclaimer"/>
					<label for="sub-disclaimer">
						Sign up for the latest Lowe Living company & project news
					</label>
				</div>

				<button type="submit">SUBMIT</button>

				<div class="response-output" style="display:none">
					Thank you for your enquiry. We will be in contact soon.
				</div>
			</form>
		</div>
	</div>
</div>

<?php get_footer(); ?>