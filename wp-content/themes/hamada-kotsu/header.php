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
		<!-- ファビコンの設定 -->
		<link rel="icon" type="image/png" href="<?= get_stylesheet_directory_uri(); ?>/images/favicon.png">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156819010-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156819010-1');
</script>


		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<meta name="format-detection" content="telephone=no">


		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php	if ( is_front_page() ) { ?>
		<base href="<?php echo get_stylesheet_directory_uri().'/top/'; ?>" />
		<?php } elseif ( is_page() ) { ?>
		<base href="<?php echo get_stylesheet_directory_uri().'/'.preg_replace( '/(\/wp\/|page\/\d\/|\/wordpress\/)/' ,'', $_SERVER["REQUEST_URI"]); ?>/" />
		<?php } elseif ( is_single() ) { ?>
		<base href="<?php echo get_stylesheet_directory_uri().'/'.preg_replace( '/(\/wp\/|page\/\d\/|\/wordpress\/)/' ,'', $post->post_type); ?>/" />
		<?php } ?>
<?php if($gmap) { ?>
		<script async defer src="//maps.googleapis.com/maps/api/js?key=<?= $gmap ?>"></script>
		<script src="//rawgit.com/HPNeo/gmaps/master/gmaps.js"></script>
<?php } ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/library/js/slick/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/library/js/libs/jquery.rwdImageMaps.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/library/js/slick/slick.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/library/js/slick/slick-theme.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/style.php" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/style.css" />
		<link rel="stylesheet" type="text/css" href="./css/style.css">

	<?php if ( is_page(('lineup')) ) { ?>
		<link rel="stylesheet" href="css/lightbox.css">
		<script src="js/lightbox.js" type="text/javascript"></script>
	<?php } ?>

	</head>
<script>

jQuery(document).ready(function(e) {
	if(jQuery('img[usemap]')){
		jQuery('img[usemap]').rwdImageMaps();
	}
});

	if(document.documentElement.clientWidth < 1000){

	  var metalist = document.getElementsByTagName('meta');
	  for(var i = 0; i < metalist.length; i++) {
	    var name = metalist[i].getAttribute('name');
	    if(name && name.toLowerCase() === 'viewport') {
	      var scale =  document.documentElement.clientWidth / 1000;
	      metalist[i].setAttribute('content', 'width=1000, initial-scale=' + (scale.toFixed(1)));
	      break;
	    }
	  }
	}
</script>

	<body <?php body_class(); ?>>
		<div id="container">
		<header class="<?= $pagename ?>">
			<div id="top-image" class="content-width">
				<div class="head_title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" ><img id="logo" src="<?= get_stylesheet_directory_uri() ?>/images/h_logo.png"></a>
				</div>
				<div class="head_sns content-width">
					<a href="https://www.facebook.com/%E6%9C%89%E6%B5%9C%E7%94%B0%E4%BA%A4%E9%80%9A-535176463484384/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook_icon.png" alt="Facebook" class="sns_icon"></a>
					<a href="https://www.instagram.com/iwamikagura.bus/?hl=ja" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/instagram_icon.png" alt="Instagram" class="sns_icon"></a>
					<a href="https://www.youtube.com/channel/UC9moJPLrJy794pGBFhxZeXg" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/youtube_icon.png" alt="Youtube" class="sns_icon"></a>
				</div>
			</div>

			<div id="menu">
				<div class="head_menu">
					<?php
						$i = 0;
						foreach($Pages as $pn => $pg){
							if($pg["menu"]){
								$i++;
								$link = $pg["url"];
								if(!$link){
									$link = link_to($pn);
								}
					?>
								<a href="<?= $link ?>"><img src="<?= get_stylesheet_directory_uri() ?>/images/hm_0<?= $i ?>.jpg" alt="<?= $pg["menu"] ?>" /></a>
					<?php
							}
						}
					?>
				</div>
			</div>
			<?php
	$topimage = $page["image"];
	if($topimage) { ?>
	<div class="topimage">
		<img src="<?php echo get_stylesheet_directory_uri().'/'; ?>images/<?= $topimage ?>"/>

		<?php if($page["top_title"]) { ?>
			<p><?= $page["top_title"] ?></p>
		<?php }else { ?>
			<p><?= $page["name"] ?></p>
		<?php } ?>
	</div>
<?php }  ?>

		</header>
		<nav role="navigation" id="global-navi">
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
