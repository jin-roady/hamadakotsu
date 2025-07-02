<?= tag_if('h2',$block["title"],"title") ?>

<?php
	$class='';
	if($block["image"] && $block["text"]){
		$class="flex";
	}
?>

<div <?= attr_if('class',$class) ?>>
<?php if($block["image"]){ ?>
	<div class="image">
		<?php
			$alt = $block["alt"];
			if(!$alt){
				$alt = $block["sub-title"];
			}
		?>
	<?php if($block["image-link"]){ ?>
	<a href="<?=link_to($block["image-link"])?>">
	<?php } ?>
		<?php
			$item = [];
			$item["image"] = $block["image"];
			$item["alt"] = $alt;
			$item["map"] = $block["image-map"];
			include locate_template("item-image.php");
		?>
	<?php if($block["image-link"]){ ?>
	</a>
	<?php } ?>

		<?= tag_if('p',$block["image-title"],"image-title") ?>
	</div>
<?php } ?>
<?php if($block["html"]){ ?>
	<div class="html">
		<?= $block["html"] ?>
	</div>
<?php } ?>

<?php if($block["text"]){ ?>
	<div class="text">
		<?php
			$subtitle = $block["sub-title"];
			if($subtitle && $block["icon"]){
				$subtitle = '<img src="'.$block["icon"].'">'.$subtitle;
			}
		?>
<?php if($block["sub-title-link"]){ ?>
	<a href="<?=link_to($block["sub-title-link"])?>">
<?php } ?>
		<?= tag_if('h3',$subtitle,"sub-title") ?>
<?php if($block["sub-title-link"]){ ?>
	</a>
<?php } ?>

<?php if($block["strong-link"]){ ?>
	<a href="<?=link_to($block["strong-link"])?>">
<?php } ?>
		<?= tag_if('h4',$block["strong"],"strong") ?>
	<?php if($block["strong-link"]){ ?>
	</a>
	<?php } ?>

		<?= tag_if('div',$block["text"],"text") ?>
	</div>
<?php } ?>

</div>