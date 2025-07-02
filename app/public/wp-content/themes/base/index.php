<?php
/*
 Template Name:ページテンプレート
 */
?>

<?php
include get_stylesheet_directory()."/common.php";
include get_stylesheet_directory()."/_header.php";

$pagename = $post->post_type;
if(is_page()){
  $pagename = $post->post_name;
}else if(is_404()){
  $pagename = '404';
}

$page = $Pages[$pagename];


include locate_template("_".$pagename.".php");

include locate_template('_page.php');

?>

