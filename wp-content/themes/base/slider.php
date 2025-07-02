<div id="slider">
	<div class="slick-box">
		<?php foreach($slider["images"] as $img) { ?>
			<div class="slider-image"><img src="<?= $img["img"] ?>" alt=""/><div class="text"><?php echo $img["div"] ?></div></div>
		<?php } ?>
	</div>

</div>
