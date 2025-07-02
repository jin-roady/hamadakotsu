<?php
	$map = $item["map"];
	$map_name="";
	$usemap=null;
	if($map){
		$map_name = $item["map"]["name"];
		if(!$map_name){
			$map_name = uniqid("map_");
		}
		$usemap = '#'.$map_name;
	}
?>

<img src="<?=$item["image"]?>" <?= attribute_if("title",$item["title"]) ?> <?= attribute_if("alt",$item["alt"]) ?> <?= attribute_if("usemap",$usemap) ?>>

<?php
if($map){
	$area_array = $map["area"];
	if(!is_array($area_array[0])){
		$area_array = [$area_array];
	}


?>
	<map name="<?= $map_name ?>">
<?php
	foreach($area_array as $area){
 		if(!$area["href"]){
			$area["href"] = $area["link"];
			$area.remove("link");
		}
		$area["href"] = link_to($area["href"]);
		if(!$area["shape"]){
			$area["shape"] = "rect";
		}
?>
		<area <?= attr_array($area) ?>>
<?php
	}
?>
	</map>

<?php
}
?>