<?= tag_if('h2',$block["title"]) ?>
<?= tag_if('h3',$block["sub_title"]) ?>

<?php
	$class="";
	if($block["image"] && $block["text"]){
		$class="flex";
	}
?>

<div class="<?=$class?>">
<?php if($block["image"]){ ?>
	<div class="image">
		<?php
			$alt = $block["alt"];
			if(!$alt){
				$alt = $block["sub-title"];
			}
		?>
	<?php if($block["image-link"]){ ?>
	<a href="<?=$block["image-link"]?>">
	<?php } ?>
		<?= img_if($block["image"],$alt) ?>
	<?php if($block["image-link"]){ ?>
	</a>
	<?php } ?>

		<?= tag_if('p',$block["image-title"]) ?>
	</div>
<?php } ?>

<?php if($block["text"]){ ?>
	<div class="text">
		<?= tag_if('h3',$block["sub-title"]) ?>
		<?= tag_if('h4',$block["strong"]) ?>
		<?= tag_if('div',$block["text"]) ?>
	</div>
<?php } ?>

</div>