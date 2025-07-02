
<div class="image-item <?=$block["class"]?>">
	<div>
	<?php if($block["link"]){ ?>
		<a href="<?= link_to($block["link"])?>">
	?>
			<img src="images/<?=$block["image"]?>">
			<?php if($block["title"]){ ?>
				<div class="title"><?= img_if('images/'.$block["icon"]) ?><?=$block["title"]?><span style="color:#be960e">＞</span></div>
			<?php } ?>
	<?php if($block["link"]){ ?>
		</a>
	?>
	</div>
	<div class="text"><?=$block["text"]?></div>
</div>
