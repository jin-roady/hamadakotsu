<?= tag_if('h2',$block["title"],"title") ?>
<?= tag_if('h3',$block["sub-title"],"sub-title") ?>
<?= tag_if('div',$block["text"],"text") ?>

<div class="flex">
<?php foreach($block["items"] as $item) { ?>
	<div <?= attribute_if('id', $item['id']) ?> class="image-item <?=$item["class"]?>" >
		<div>
<?php if($item["link"]){
				$target ="";
				if( $item["target"] ) {
					$target = 'target="'.$item["target"].'"';
				}
				$download = "";
				if( array_key_exists("download",$item)){
					$download = "download";
					if($item["download"]){
						$download += '="'.$item["download"].'"';
					}
				}
?>
			<a href="<?= link_to($item["link"]) ?>" <?= $target ?> <?= $download ?>>
<?php } ?>
<?php
	if(!$$item["alt"]){
		$item["alt"] = $item["title"];
	} else {
		$item["sub-title"];
	}
?>
<?php
	if($item["image"]){
		include locate_template("item-image.php");
?>

<?php
	}
?>
				<?php if($item["title"]){ ?>
					<div class="title">
						<?= img_if($item["icon"]) ?>
						<?=$item["title"]?>
					</div>
				<?php } ?>
<?php if($item["link"]){ ?>
			</a>
<?php } ?>
		</div>
		<div class="text"><?=$item["text"]?></div>
	</div>
<?php } ?>
</div>