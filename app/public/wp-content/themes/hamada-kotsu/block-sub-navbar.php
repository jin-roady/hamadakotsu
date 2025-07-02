<div id="sub_navbar">

	<div class="breadcrumb">
		<a href="<?php echo bloginfo('url'); ?>">TOP </a>>
	<?php
	$parent_title = get_the_title( $post->post_parent );
	$disp_title = $parent_title;
	if ( $parent_title != the_title( '', '', false ) ) {
		foreach($Pages as $pn => $pg){
			if($pn == $parent_title){
				if($pg["name"]){
					$disp_title = $pg["name"];
				}
				break;
			}
		}
		echo '<a href="' . get_permalink( $post->post_parent ) . '" title="' . $parent_title . '">' . $disp_title . '</a>>';
	}
	?>
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
	<?php
	$disp_title = the_title( '', '', false );
	foreach($Pages as $pn => $pg){
		if($pn == $disp_title){
			if($pg["name"]){
				$disp_title = $pg["name"];
			}
			break;
		}
	}
	echo $disp_title;
	?></a>
		<div class="breadcrumb-sep"></div>
	</div>

		<nav class="sub-navigation">
			<?php
			if($block["items"]) {
				$i = 0;
				foreach($block["items"] as $item) {
					$i++;
					if($item["name"]) {
						?>
						<a href="#f<?= $i?>" class="sub_menu"><?= $item["name"]?></a>
						<?php
					}
				}
			}
			?>
		</nav>
</div>
