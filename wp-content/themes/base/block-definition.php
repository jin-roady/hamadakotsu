<dl>
<?php
	foreach($block["list"] as $dt => $dd){
		if(!is_array($dd)){
			$dd = [$dd];
		}
		?>
		<dt class="border"><?= $dt ?></dt>
		<dd class="border">
		<?php
			foreach($dd as $d){ ?>
				<?= $d ?><br>
		<?php } ?>
		</dd>
<?php } ?>
</dl>
