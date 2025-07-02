<!doctype html>
<?php
include get_stylesheet_directory()."/_header.php";
?>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<title><?= $page["title"] ?></title>
		<meta name="description" content="<?= $page["description"] ?>">
<?php if($gtag) { ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $gtag ?>"></script>

		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', '<?= $gtag ?>');
		  gtag('config', 'AW-813015992');
		</script>
<?php } ?>

		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="format-detection" content="telephone=no">

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php	if ( is_front_page() ) { ?>
		<base href="<?php echo get_stylesheet_directory_uri().'/top/'; ?>" />
		<?php } elseif ( is_page() ) { ?>
		<base href="<?php echo get_stylesheet_directory_uri().'/'.preg_replace( '/(\/wp\/|page\/\d\/|\/wordpress\/|\/hamada-kotsu\/)/' ,'', $_SERVER["REQUEST_URI"]); ?>" />
		<?php } elseif ( is_single() ) { ?>
		<base href="<?php echo get_stylesheet_directory_uri().'/'.preg_replace( '/(\/wp\/|page\/\d\/|\/wordpress\/|\/hamada-kotsu\/)/' ,'', $post->post_type); ?>/" />
		<?php } ?>
<?php if($gmap) { ?>
		<script async defer src="//maps.googleapis.com/maps/api/js?key=<?= $gmap ?>"></script>
		<script src="//rawgit.com/HPNeo/gmaps/master/gmaps.js"></script>
<?php } ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/library/js/slick/slick.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/library/js/slick/slick.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/library/js/slick/slick-theme.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/style.php" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/style.css" />
		<link rel="stylesheet" type="text/css" href="./css/style.css">
	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header id="global-header" class="header" role="banner">

				<nav role="navigation" id="global-navi">
					<div id="normal-nav">
						<ul class="flex">
							<?php foreach($navigation as $nav) { ?>
								<li>
									<a href="<?= link_to($nav["page"]) ?>"><img src="<?php echo get_stylesheet_directory_uri().'/'; ?>header/images/<?= $nav["img"] ?>" alt="<?= $nav["text"] ?>" >
										<div><?= $nav["text"] ?></div>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
					<div id="sp-nav">
						<div class="nav__icon">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<ul style="display:none;">
							<?php foreach($navigation as $nav) { ?>
								<li><a href="<?= link_to($nav["page"]) ?>"><?= $nav["text"] ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</nav>
			</header>
