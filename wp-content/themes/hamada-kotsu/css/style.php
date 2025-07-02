<?php header('Content-Type: text/css; charset=utf-8'); ?>
@charset "UTF-8";

<?php
include "../common.php";

?>

body {
	background-color: <?= $backgroundColor ?>;
}

nav {
	background-color: <?= $naviColor ?>;
	text-align: center;

}
nav a{
	text-decoration: none;
}
nav a>div{
	color: black;
}
