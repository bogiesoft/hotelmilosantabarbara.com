<?php 

	require_once bloginfo('template_url').'/library/mobile-detect.php';
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();

	$check = $detect->isMobile(); 

?>
<!DOCTYPE HTML>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="p:domain_verify" content="b064c45724dfd80702c16b1d08c28d8a"/>
	<meta name="google-site-verification" content="PLMRblpH5jD6eiEzVXnTlu33LL379Jk97ncPlPQ4d_A" />
	<title>
		<?php global $page, $paged; the_title( '|', true, 'right' ); bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'cebolang' ), max( $paged, $page ) );
		?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if (get_option('cebo_custom_favicon') == '') { ?>
	
	<link rel="icon" href="<?php bloginfo ('template_url'); ?>/cebo_options/<?php bloginfo ('template_url'); ?>/images/admin_sidebar_icon.png" type="image/x-ico"/>
	
	<? } else { ?>
	
	<link rel="icon" href="<?php echo get_option('cebo_custom_favicon'); ?>" type="image/x-ico"/>
	
	<? } ?>
	
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('cebo_feedburner_url') <> "" ) { echo get_option('cebo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
	
	<!-- favicon -->

	<link rel="shortcut icon" href="<?php bloginfo ('template_url'); ?>/icfavicon.png" type="image/png">
	<link rel="icon" href="icfavicon.png" type="image/png">
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo ('template_url'); ?>/css/custom.css">

	<!-- Fonts -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic,700' rel='stylesheet' type='text/css'>

	<!-- Jquery -->
	<?php include(TEMPLATEPATH. "/library/jquery.php"); ?>	

	<script type="text/javascript">
		
		
		function createURL() {
	var checkin = jQuery("#arrival_date").val();
	var checkout = jQuery("#departure_date").val();
	var adults = jQuery("#adults").val();
	var children = jQuery("#children").val();
	
	var bookinglink = "<?php echo get_option('cebo_genbooklink'); ?>/search?" + 
										"&arrival_date=" + checkin + 
										"&departure_date=" + checkout + 
										"&adults[]=" + adults + 
										"&children[]=" + children;

	return bookinglink;
	
	}
	
	$(document).ready(function() {

		<?php if( !$check ) { ?>

			$('.imagegal ul li').toggle(function() {

				$(this).children('.hover-effect').addClass('hover-effect-mobile');

			}, function() {
				$(this).children('.hover-effect').removeClass('hover-effect-mobile');
			});
				
		<?php } ?>
	
		jQuery('form a.button').click(function(e) {
			e.preventDefault();
			_gaq.push(['_link', createURL() ]);
			return false;
		});
	
	});	
	
	</script>


	<!-- Scripts -->
	<?php include(TEMPLATEPATH. "/library/scripts.php"); ?>	
	
	
	
	


	<style>
		<?php

			include(TEMPLATEPATH. "/library/inset.php");
		?>	
	</style>



	<?php
		/****************** DO NOT REMOVE **********************
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		wp_head();
	?>


<script type="text/javascript">

var _gaq = _gaq || [];

_gaq.push(['_setAccount', 'UA-48295809-1']);

_gaq.push(['_setAllowLinker', true]);

_gaq.push(['_setDomainName', 'hotelmilosantabarbara.com']);

_gaq.push(['_trackPageview']);


(function() {

var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

})();

</script>


<!-- Sojern script -->
<script>
(function () {
var pl = document.createElement('script');
pl.type = 'text/javascript';
pl.async = true;
pl.src = 'https://beacon.sojern.com/pixel/p/3679?cid=[destination_searched]&ha1=[destination_searched]&et=hs';(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(pl);
})();
</script>


</head> 
	
<body id="oceana" <?php body_class($class); ?>>

	<div id="navigation">
			
			
			<div class="ressys">
				
				
				<div class="whippapeal">
				<div class="formfields">
				
					<div class="reservationform">
					
					
					<form method="get" action="<?php echo get_option('cebo_genbooklink'); ?>/search?" target="_blank">
						
						<span class="calsec">
							<input type="text"  id="arrival_date" name="arrival_date" placeholder="<?php _e('Arrival','cebolang'); ?>" class="calendarsection" />
							<input type="hidden"  id="arv">
							<i class="fa fa-calendar"></i>
						</span>
						
						<span class="calsec">
							<input type="text" id="departure_date" name="departure_date" placeholder="<?php _e('Departure','cebolang'); ?>" class="calendarsection" />
							<input type="hidden" id="dep">
							<i class="fa fa-calendar"></i>
						</span>
						
						<span class="dropsec" style="margin-right: 6px">
							<select name="adults[]" class="halfsies">
								<option value="1"><?php _e('1 Adult','cebolang'); ?></option>
								<option value="2"><?php _e('2 Adults','cebolang'); ?></option>
								<option value="3"><?php _e('3 Adults','cebolang'); ?></option>
								<option value="4"><?php _e('4 Adults','cebolang'); ?></option>
							</select>
						</span>
						
						<span class="dropsec">
							<select name="children[]" class="halfsies">
								<option value=""><?php _e('0 Kids','cebolang'); ?></option>
								<option value="1"><?php _e('1 Kid','cebolang'); ?></option>
								<option value="2"><?php _e('2 Kids','cebolang'); ?></option>
								<option value="3"><?php _e('3 Kids','cebolang'); ?></option>
							</select>
						</span>
						
						<a href="#" class="button">Search Now</a>	
						
					
					</form>
				
				</div>



				</div>
				
				<div class="calendars">
					
					 <div class="datepicker"></div>
				
				
				</div>
				
				</div>
			</div>
			
			
		<div id="property-nav">
			
			<nav class="click-nav">
				<ul class="container no-js">
					<li>
	
						<a href="http://independentcollection.com" target="_blank" class="clicknav-clicker"></a>
	
						<!-- <ul>
							<li class="navitem"><a href="#">Independet Collection</a></li>
							<li class="navitem"><a href="#">Independet Collection</a></li>
							<li class="navitem"><a href="#">Independet Collection</a></li>
							<li class="navitem"><a href="#">Independet Collection</a></li>
							<li class="navitem"><a href="#">Independet Collection</a></li>
						</ul> -->
	
					</li>
				</ul>
			</nav>
			
			
			
	
		</div>
	
		<div id="primary-nav">
		
			<a href="<?php bloginfo('url'); ?>" class="logo<?php if(is_home()) { ?> droplogo<?php } ?>"><img src="<?php echo get_option('cebo_logo'); ?>" alt="<?php echo the_title(); ?>" /></a>

			<a href="<?php bloginfo('url'); ?>" class="logo mobile"><img src="<?php echo get_option('cebo_logo'); ?>" alt="<?php echo the_title(); ?>" /></a>
			
			<a class="reserve fixeer button fr input-append date" id="idp3" data-date="12-02-2012" data-date-format="mm-dd-yyyy" onclick="_gaq.push(['_link', this.href]);return false;">RESERVE</a>

			<a class="reserve fixeer mobile button fr" id="idp4" href="<?php echo get_option('cebo_genbooklink'); ?>" target="_blank" onclick="_gaq.push(['_link', this.href]);return false;">RESERVE</a>
			
			<div class="container" style="float: right;">

				<a class="mmenu-icon" href="#menu"><i class="fa fa-bars"></i></a>
	
				<nav id="menu" class="fl">
					<ul>
						 <?php wp_nav_menu( array( 'theme_location' => 'primary' ,  'items_wrap' => '%3$s', 'container' => '', 'menu_class' => 'navitem' ) ); ?>
					</ul>
				</nav>
	
			</div>
	
				
				
				
	
		</div>

	</div>
	
	<div id="quiet"></div>
   