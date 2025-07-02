<script>
var m = document.querySelector("main");
m.classList.add("flex");

var h = m.querySelector("h1");
h.style.width="100%";
</script>
		<div class="sidebar">
			<div>
				<div class="title">最近の投稿</div>
				<ol>
					<?php wp_get_archives(array('type'=>'postbypost',
					'limit' => $block["recent"],
					'post_type'=>$block["slug"])); ?>
				</ol>
			</div>
			
			<div>
				<div class="title">月別アーカイブ</div>
				<ol>
					<?php wp_get_archives(array('type'=>'monthly',
					'post_type'=>$block["slug"],
					'show_post_count'=>true)); ?>
				</ol>
			</div>
		</div>
