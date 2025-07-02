<?php

$system_default_block = "default";

?>
<?php
include locate_template("header.php");
 ?>
	<?php if($slider){ ?>
		<div class="<?= $slider["class"] ?>">
			<?php
				$type = $slider["type"];

				include locate_template($type.'.php');
			?>
		</div>
	<?php } ?>
	<div id="content" class="flex">
		<main id="<?= $pagename ?>">
			<?= tag_if('h1',$pageTitle,"page-title") ?>
			<?php foreach($blocks as $block) {
				include locate_template('_block.php');
			 ?>

			<?php } ?>
		</main>
	</div>


<?php
include locate_template("footer.php");

?>
