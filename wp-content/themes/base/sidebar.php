<?php
include get_stylesheet_directory()."/_sidebar.php";
?>
				<div id="sidebar" class="flex">
					<?php foreach($sidebar as $item) {
							$target ="";
							if( $item["target"] ) {
								$target = 'target="'.$item["target"].'"';
							}
					?>
						<div style="width:250px"><a href="<?= link_to($item['page']) ?>" <?= $target ?>><img src="<?php echo get_stylesheet_directory_uri().'/'; ?>sidebar/images/<?= $item["img"] ?>" alt="<?= $item["text"] ?>" ></a></div>
					<?php } ?>
				</div>
