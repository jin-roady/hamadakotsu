
<div class="post-list">
	<div class="blog-title">
		<div class="title"><?= img_if($block["icon"])?><?=$block["title"]?></div><div class="to-listpage"><a href="<?= link_to($block["slug"]) ?>">一覧を見る</a></div>
	</div>
	<?php
		$paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
		$args =	array(
				'posts_per_page'   => $block["per_page"],
				'orderby'          => 'date',
				'order'            => 'DESC',
				'post_type'        => $block["slug"],
				'post_status'      => 'publish',
				'caller_get_posts' => 1,
				'paged'            =>  $paged
		);
	  $wp_query = new WP_Query( $args );
	?>
	<?php if ( $wp_query->have_posts() ): ?>
  	<ol>
	  <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
  		<li class="blog-item">
  			<?php the_post_thumbnail(array( 80, 70 )); ?>
  			<div><span class="date"><?php the_time( 'Y/m/d' ); ?></span>
  				<a href="<?= the_permalink(); ?>"><?php the_title(); ?></a>
  				<div class="excerpt"><?php if($block["excerpt"] ){ the_excerpt(); } ?></div>
  			</div>
  		</li>

	  <?php endwhile; ?>
	  </ol>
	<?php else: ?>
	  <p>新しい記事はありません</p>
	<?php endif; ?>

</div>

<?php if($block["page_navi"]) {
    $arg = array(
    		'format' => '../'.$block["slug"].'?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total'   => $wp_query->max_num_pages,
        'mid_size'=> $block["page_navi"],
        'prev_text'=>'<',
        'next_text'=>'>',
    );
    echo '<div class="page-navi">'.paginate_links($arg).'</div>';
} ?>
