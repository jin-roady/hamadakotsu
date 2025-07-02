<?php
	if(!array_key_exists("enable",$block)){
		$block["enable"] = true;
	}
	$class = $block["class"];

	$type = $block["type"];
	if(!$type){
		$type = $default_type;
	}
	if(!$type || $type == "_"){
		$type = $system_default_block;
	}
	if($block["enable"] == true){
?>
				<div <?= attribute_if("id", $block["id"]) ?> class="block <?=$type ?> <?= $class ?>">
					<?php
						include locate_template('block-'.$type.'.php');
					?>
				</div>
<?php } ?>