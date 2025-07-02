<table>
<?php
	$rows = $block["data"];
	foreach($r=0;$r<count($rows);$r++){
		$row = $rows[$r];
		?>
		<tr>
		<?php
		foreach($c=0;$c<count($row);$c++){
			?>
			<td>
				<?= $rows[$c] ?>
			</td>
		<?php
		}
		?>
		</tr>
		<?php
	}
?>
</table>

