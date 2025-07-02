<div class="post-list">
	<div class="blog-title">
		<div><?= img_if($block["icon"]?><?=$block["title"]?></div><div><a href="<?= link_to($block["slug"]) ?>">一覧を見る<img src="/blog/images/arrow.png" alt=""></a></div>
	</div>
	<?php
		$args =	array(
				'posts_per_page'   => $block["ppp"],
				'orderby'          => 'date',
				'order'            => 'DESC',
				'post_type'        => $block["slug"],
				'post_status'      => 'publish',
				'caller_get_posts' => 1,
		);
	  $st_query = new WP_Query( $args );
	?>
	<?php if ( $st_query->have_posts() ): ?>
  	<ol>
	  <?php while ( $st_query->have_posts() ) : $st_query->the_post(); ?>
  		<li class="blog-item"><div><span><?php the_time( 'Y/m/d' ); ?></span><a href="<?= the_permalink() ?>"><?php the_title(); ?></a></div></li>
	  <?php endwhile; ?>
	  </ol>
	<?php else: ?>
	  <p>新しい記事はありません</p>
	<?php endif; ?>
</div>
