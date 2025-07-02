<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

require_once get_stylesheet_directory()."/common.php";

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  //require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
//  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/*
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function bones_fonts() {
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'bones_fonts');


/*
 * お客様の声に番号を振る
 */
/* http://bashalog.c-brains.jp/14/12/24-100000.php */
add_action( 'save_post_customers_voice','set_number'  );

function set_number($post_id) {
	if(get_post_meta( $post_id, 'seqno', true )){
		return;
	}
	$seqno = get_option( 'seqno');
	$seqno = ( !empty( $seqno ) ) ? $seqno + 1 : 1;
	
	if ( update_post_meta( $post_id, 'seqno', $seqno ) ) {
		update_option( 'seqno', $seqno );
	}
}

//「メディア」の初期タブを変更する
function change_media_uploader_default_router() {
?>
<script type="text/javascript">
jQuery(function($) {
  // 「メディアを挿入」の初期表示タブを「ファイルをアップロード」に
  wp.media.controller.Library.prototype.defaults.contentUserSetting = false;
  // 「アイキャッチ画像」の初期表示タブを「ファイルをアップロード」に
  wp.media.controller.FeaturedImage.prototype.defaults.contentUserSetting = false;
});
</script>
<?php
}
add_action( 'admin_footer-post-new.php', 'change_media_uploader_default_router' );
add_action( 'admin_footer-post.php', 'change_media_uploader_default_router' );


//確認用メールアドレスチェック
function wpcf7_main_validation_filter( $result, $tag ) {
  $type = $tag['type'];
  $name = $tag['name'];
  $_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );
  if ( 'email' == $type || 'email*' == $type ) {
    if (preg_match('/(.*)_confirm$/', $name, $matches)){
      $target_name = $matches[1];
      if ($_POST[$name] != $_POST[$target_name]) {
        if (method_exists($result, 'invalidate')) {
          $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
      } else {
          $result['valid'] = false;
          $result['reason'][$name] = '確認用のメールアドレスが一致していません';
        }
      }
    }
  }
  return $result;
}

add_filter( 'wpcf7_validate_email', 'wpcf7_main_validation_filter', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_main_validation_filter', 11, 2 );

///contact form7 のラジオボタン必須化
add_action( 'wpcf7_init', 'wpcf7_add_shortcode_radio_required' );
function wpcf7_add_shortcode_radio_required() {
  wpcf7_add_shortcode( array('radio*'), 'wpcf7_checkbox_form_tag_handler', true );
}
add_filter( 'wpcf7_validate_radio*', 'wpcf7_checkbox_validation_filter', 10, 2 );


// pages.php から固定ページを自動登録
// テーマ設定時。
 if( isset($_GET['activated'])  ){
	foreach($Pages as  $key => $page){
		if($key && !get_page_by_title($key)){
			$new_page = array(
				'post_type' => 'page',
				'post_title' => $key,
				'post_content' => '',
				'post_status' => 'publish',
				'post_author' => get_current_user_id(),
			);
			wp_insert_post($new_page);
		}
	}
}

function attr_if($name,$value){
	if($name && $value){
		return $name.'="'.$value.'"';
	}
	return '';
}

function attr_array($array){
	$ret = "";
	foreach($array as $name => $value){
		$ret = $ret.$name.'="'.$value.'" ';
	}
	return $ret;
}



function link_to($page){
	if(filter_var($page, FILTER_VALIDATE_URL) ||
		strpos($page,"#") === 0 ||
		strpos($page,"javascript") === 0 ||
		strpos($page,"/") !== false ){
		return $page;
	}

	return esc_url(home_url($page));
}

function tag_if($tag,$text,$class=''){
	if($tag && $text){
		return '<'.$tag.attr_if(" class",$class).'>'.$text.'</'.$tag.'>';
	}
	return '';
}

function attribute_if($attr,$val){
	if($attr && $val){
		return $attr.'="'.$val.'"';
	}
	return '';
}

function img_if($img,$alt=''){
	if($img){
		return '<img src="'.$img.'" '.attribute_if('alt',$alt).'>';
	}
	return "";
}

function image_alt($vals){
	$keys = ["alt","image-title","sub-title","title"];
	foreach($keys as $key){
		$alt = $vals[$key];
		if($alt){
			return $alt;
		}
	}
	return "";
}

function get_pdf() {

  $args =	array(
      'posts_per_page'   => 2,
      'orderby'          => 'date',
      'order'            => 'DESC',
      'post_type'        => 'tour_pdf',
      'post_status'      => 'publish',
      'caller_get_posts' => 1,
  );
  $st_query = new WP_Query( $args );
    date_default_timezone_set('Asia/Tokyo');
  $today = new DateTime();

  if ( $st_query->have_posts() ) {
    while ( $st_query->have_posts() )  {
      $st_query->the_post();
      $date = new DateTime(get_field('date'));
      if ($today >= $date) {
    		if (get_field('pdffile')){
            	return the_field('pdffile');
    		}
      }
    }
  }
  return "";
}

function disp_pdf($type) {

  $pdf = "pdf".$type;
  $img = "/images/pdf".$type.".jpg";
  $caption = "pdf_caption".$type;

  $args =	array(
      'posts_per_page'   => 2,
      'orderby'          => 'date',
      'order'            => 'DESC',
      'post_type'        => 'tour_pdf',
      'post_status'      => 'publish',
      'caller_get_posts' => 1,
  );
  $st_query = new WP_Query( $args );
    date_default_timezone_set('Asia/Tokyo');
  $today = new DateTime();

  if ( $st_query->have_posts() ) {
    while ( $st_query->have_posts() )  {
      $st_query->the_post();
      $date = new DateTime(get_field('date'));
      if ($today >= $date) {
        if (get_field($pdf)){
?>
          <a href="<?php the_field($pdf); ?>" target="_blank">
            <img src="<?php echo get_stylesheet_directory_uri().$img ?>" alt="チラシ">
          </a>
          <?php

          if (get_field($caption)){
            ?><p><?php the_field($caption); ?></p> <?php
          }
          ?>
          <?php
        }
        return;
      }
    }
  }
  return;
}

function new_excerpt_mblength($length) {
     return 28;
}
add_filter('excerpt_mblength', 'new_excerpt_mblength');

function new_excerpt_more($more) {
    return '&nbsp;&nbsp;&nbsp;<a href="'. get_permalink($post->ID) . '">…続きはコチラから</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_query_vars( $public_query_vars ) {
	$public_query_vars[] = 'pg';
	return $public_query_vars;
}
add_filter('query_vars','custom_query_vars');


function paged_redirect_canonical( $requested_url ) {

  $pattern = '/\/page\//';
  preg_match($pattern, $requested_url, $matches);

  if ($matches){
    return false;
  }
  return $requested_url;
}

add_filter('redirect_canonical','paged_redirect_canonical');


/* DON'T DELETE THIS CLOSING TAG */ ?>
