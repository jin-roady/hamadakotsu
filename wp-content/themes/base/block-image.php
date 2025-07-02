<?= tag_if('h2',$block["title"]) ?>
<?= tag_if('h3',$block["sub-title"]) ?>
<?= tag_if('h4',$block["strong"]) ?>

<div>
	<div class="image-block">
		<img src="<?=$block["image"]?>" <?= attribute_if("alt",image_alt($block)) ?>>
		<?= tag_if('p',$block["image-title"]) ?>
	</div>
	<?= tag_if('h4',$block["strong"]) ?>
	<?= tag_if('div',$block["text"],"text") ?>

</div>
