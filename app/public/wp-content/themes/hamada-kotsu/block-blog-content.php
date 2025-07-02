<?php
	the_post();
?>

<div class="content-width newsblog">
	<h2 id="f1">ニュース / ブログ</h2>
	<hr class="u_title">

	<div class="newsblog-content">
		<div class="newsblog-title">
			<span class="date"><?php the_time( 'y.m.d' ); ?></span>
			<?php
			$cat = get_the_category();
			$catname = $cat[0]->name;
			$catslug = $cat[0]->category_nicename;
			if ($catslug == 'blog') {
				$catclass = "cat_blog";
			} else {
				$catclass = "cat_news";
			}
			?>
			<span class="<?= $catclass ?>">#<?= $catname ?></span>
			<span class="title"><?php the_title(); ?></span>
		</div>
		<?php if(get_field('image')) { ?>
		<img src="<?= get_field('image') ?>" alt="<?= get_the_title() ?>">
		<?php } ?>
		<div class="text">
			<div><?php the_field('text')?></div>
		</div>
	</div>

	<div class="page-navi flex">
		<div class="prev"><?php previous_post_link('%link', '前へ'); ?></div>
		<div class="next"><?php next_post_link('%link', '次へ'); ?></div>
	</div>
</div>
