<?php
the_post();
get_header();
// Template Name: Subscription Options

require get_stylesheet_directory().'/lib/cm_lists.php';

	

if(isset($_GET['comm'])){
	$comm = $_GET['comm'];
	$lists[$comm]['active'] = true; // flag the current list as active so we know what to opt out of
}else{
	$comm = 'none';
}

if($comm != 'none') {
	$activeproj = $lists[$comm];

	$activelabel = $lists[$comm]['label'];

	unset($lists['projects']);

	if($comm !== 'lowe'){
		unset($lists[$comm]);
		unset($lists['lowe']); // remove lowe from proj list too
	}else{
		$lists = array(); // empty out proj lists if its a lowe group subscriber
	}
}

?>
<section class="landing">
	<div class="overlay">
		<div class="container container-strict">
			<h1><?php the_title();?></h1>
		</div>
	</div>
	<div class="video-section">
		<div class="video-section__overlay"><img src="<?= imageDir(true); ?>/get-in-touch-hero.jpg" alt="Lowe Living"/></div>
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
                	<?php if($comm !== 'none') { ?>
                		<p>You have requested to unsubscribe from <?= $activelabel; ?>.</p>
                	<?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-copy">
                    <div class="thank-you">
						<p>
							Thank you, your preferences have been updated.
						</p>
					</div>
					<div class="form-wrap">
						
						<?php if($comm !== 'none'): ?>

							<form id="subscription-options" autocomplete="off">
								<div class="check-input">
									<input autocomplete="off" type="hidden" value="unsubscribe" name="<?= $comm; ?>" id="<?= $comm; ?>"/>

									<?php if($comm !== 'lowe'): ?>
										<div class="form-block">
											<p>
												Alternatively, you can still hear about other Lowe Living projects:
											</p>

											<div class="form-block__inputs">
												<?php foreach($lists as $key => $value): ?>
													<p>
														<input autocomplete="off" type="checkbox" value="subscribe" name="<?= $key; ?>" id="<?= $key; ?>" checked/>
														<label for="<?= $key; ?>">
															<span></span><?= $value['label']; ?>
														</label>
													</p>
												<?php endforeach; ?>
											</div>

											<p class="small"><i>Not interested in any of the projects above? <br/>
											Deselect any project by un-ticking the checkbox.</i></p>
										</div>
									<?php endif; ?>

									<div class="form-block">
										<p>
											If you would like to unsubscribe from all Lowe Living communication, including company and project news, please select checkbox below:
										</p>

										<p class="form-field">
											<input autocomplete="off" type="checkbox" value="unsubscribe" name="unsuball" id="unsuball"/>

											<label for="unsuball">
												<span></span>Unsubscribe from all Lowe Living communication 
											</label>
										</p>
									</div>

								</div>
								<button id="submit-btn" type="submit">Update Preferences</button>
							</form>

							<p class="sub-error">
								Error trying to update subscription preferences. <br/>
								You may already be unsubscribed. <br/>
								Please wait a few minutes and try again.
							</p>

						<?php else: ?>

							<p>
								An error occurred while trying to retrieve subscription options. <br/>
								Please try again or <a style="text-decoration:underline;" href="/get-in-touch">Contact us</a>.
							</p>

						<?php endif; ?>
					</div>

					<img src="<?php imageDir(); ?>/loading.gif" class="loading-gif"/>
					
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>