<?php 
	// check/set session var for popup
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	$popupactive = false;
	$showpopup = false;

	date_default_timezone_set('Australia/Melbourne');
    $now = date('d-m-Y H:i:s');

    $enable_on = get_field('popup_enable_date','option');
    $disable_on = get_field('popup_disable_date','option');


	if(get_field('popup_enable','option')){
		$popupactive = true;

		if($enable_on){
		    if(strtotime($now) >= strtotime($enable_on)){
		    	// enable if its passed the enable date
		    	$popupactive = true;

		    	// if disable date is set, and its past that date, disable it
		    	if($disable_on){
		    		if(strtotime($now) >= strtotime($disable_on)){
		    			$popupactive = false;
		    		}
		    	}

		    }else{
		    	// disable if before enable date
		    	$popupactive = false;
		    }
	    }

	}else{
		$popupactive = false;
	}

	if($popupactive){
		if(!isset($_SESSION['ldgshowpopup'])){
			$showpopup = true;
			$_SESSION["ldgshowpopup"] = 1;
		}
	}else{
		if((isset($_SESSION['ldgshowpopup']))){ unset($_SESSION['ldgshowpopup']); }
	}

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">		
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	
	<?php wp_head(); ?>

	<script type="text/javascript">
		var _ajaxurl = '<?php print admin_url("admin-ajax.php"); ?>';
		var _pageid = '<?php print get_the_ID(); ?>';
		var _imagedir = '<?php imageDir(); ?>';
		var _paged = '<?= (get_query_var('paged') < 2 ? 1 : get_query_var('paged')); ?>';
		var _postsperpage = '<?= get_option('posts_per_page'); ?>';
		var _ishome = <?= (is_home() ? 'true' : 'false'); ?>;
		var _queryvars = '<?= json_encode($wp_query->query); ?>';
	</script>

	<script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=xwxxinq8yyl6veqnpx90tq" async="true"></script>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PVKJVGD');</script>

	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5QH8WQ5');</script>
	<!-- End Google Tag Manager -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-77005766-4"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-77005766-4');
	</script>


	<script type="text/javascript">
	var _ss = _ss || [];
	_ss.push(['_setDomain', 'https://koi-3QNKIETR2Y.marketingautomation.services/net']);
	_ss.push(['_setAccount', 'KOI-45ZVHDYY76']);
	_ss.push(['_trackPageView']);
	(function() {
	var ss = document.createElement('script');
	ss.type = 'text/javascript'; ss.async = true;
	ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-3QNKIETR2Y.marketingautomation.services/client/ss.js?ver=2.2.1';
	var scr = document.getElementsByTagName('script')[0];
	scr.parentNode.insertBefore(ss, scr);
	})();
	</script>

</head>
<body <?php body_class(); ?>>


<?php include get_template_directory().'/partials/alamer-popup.php'; ?>
<?php if($popupactive && $showpopup && is_front_page()): ?>
<script type="text/javascript">
	setTimeout(function(){
		jQuery('#alamer-popup').modal();
	}, 1500);
</script>
<?php endif; ?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVKJVGD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QH8WQ5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="top"></div>
<div class="wrapper">
	<header class="top-header collapsed">
		<div class="inner">
			<div class="container min-width">
				<div class="logo">
					<a href="<?= get_site_url(); ?>">
						<img class="logo--sticky" src="<?= imageDir(true); ?>/lowe-living-white.svg" alt="Lowe Living"/>
						<img class="logo--std" src="<?= imageDir(true); ?>/lowe-living-colour.svg" alt="Lowe Living"/>
					</a>
				</div>

				<nav class="header-menu">
					<div class="menu-toggle visible-xs visible-sm visible-md">
						<button type="button" data-toggle="menu" class="burger-trigger">
							<img src="<?= imageDir(true); ?>/hamburger.svg" alt="Menu" class="burger-trigger--open"/>
							<img src="<?= imageDir(true); ?>/hamburger_close.svg" alt="Menu" class="burger-trigger--close" />
						</button>
					</div>

					<?php
						wp_nav_menu(array(
							'theme_location' => 'header-menu',
							'container' => '',
							'depth' => 1,
						));
					?>
				</nav>
			</div>
		</div>
	</header>

	<div class="sideform">
		<div class="sideform__tab">
			KEEP IN TOUCH <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.118 9.488" class="icon"><polyline id="Stroke-1" points="0.578 9.01 7.059 1.177 13.54 9.01" fill="none" stroke="currentColor" stroke-width="1.5"/></svg></i>
		</div>
		<div class="sideform__form">
			<p><?php the_field('newsletter_tagline','options'); ?></p>
			<?php echo do_shortcode('[contact-form-7 id="10" title="Newsletter form"]'); ?>
		</div>
	</div>
	
	<div class="header-spacer"></div>