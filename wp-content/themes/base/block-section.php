<?php
$section = $block;
?>

<section <?= attribute_if("id",$section["id"]) ?> <?= attribute_if("class",$section["class"]) ?>>
	<?php foreach($section as $item) {
		if(gettype($item) == "array"){
			$block = $item;
			include locate_template('_block.php');
		}
	 } ?>
</section>
