<?php
$account = $block["account"];
$left = $account["left"];
$right = $account["right"];

?>
<div class="title"><?= $block["title"] ?></div>
<div class="board">
	<?php foreach($block["talk"] as $talk) {
		$side = key($talk);
		$message = nl2br($talk[$side]);
	?>
		<div class="message flex <?= $side ?>">
			<div class="icon">
				<img src="<?= $account[$side]["image"]?>">
			</div>
			<div class="text">
				<div class="name"><?= $account[$side]["name"]?></div>
				<div class="balloon">
					<?= $message ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
