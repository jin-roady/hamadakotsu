<?php
	the_post();
?>
<div class="post">
	<div class="blog-title">
		<div class="date"><?php the_time('Y/m/d');  ?></div>
		<div class="title"><?=the_title()?></div>
	</div>
	<div class="text"><?php the_content(); ?></div>
</div>
<div class="page-navi flex">
	<div class="prev"><?php previous_post_link('%link', '<&nbsp;%title'); ?></div>
	<div class="next"><?php next_post_link('%link', '%title&nbsp;>'); ?></div>
</div>

