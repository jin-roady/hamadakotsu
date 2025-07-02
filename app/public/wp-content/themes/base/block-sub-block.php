<?php
include locate_template('sub-'.$block['name'].'.php');

 foreach($subblocks as $subblock) {
  $bk = $block;
  $block = $subblock;
	include locate_template('_block.php');
	$block = $bk;
 }
?>
