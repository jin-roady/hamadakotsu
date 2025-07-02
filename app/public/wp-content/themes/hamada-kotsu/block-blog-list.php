<?php
	if ( is_front_page() ) {
		$class = "";
		$per_page = 4;
		$page_navi = 0;
	} else {
		$class = "blog-list";
		$per_page = 10;
		$page_navi = 4;
	}
?>

<div class="post-list <?= $class ?>">
	<?php
		$paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
		$args =	array(
				'posts_per_page'   => $per_page,
				'orderby'          => 'date',
				'order'            => 'DESC',
				'post_type'        => 'news_blog',
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
				<div>
					<?php if(get_field('image')) { ?>
						<img src="<?= get_field('image') ?>" alt="<?= get_the_title() ?>">
					<?php } else  {?>
						<img src="00_img_sample.jpg" alt="<?= get_the_title() ?>">
					<?php } ?>
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
	  			<div class="<?= $catclass ?>">
						<p>#<?= $catname ?></p>
						<a href="<?= the_permalink(); ?>"><span class="title"><?php the_title(); ?></span></a>
						<hr>
						<p class="date"><?php the_time( 'y.m.d' ); ?></p>
	  			</div>
				</div>
  		</li>

	  <?php endwhile; ?>
	  </ol>
	<?php else: ?>
	  <p>新しい記事はありません</p>
	<?php endif; ?>
</div>

<?php if ( $page_navi ) {
    $arg = array(
    		'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total'   => $wp_query->max_num_pages,
        'mid_size'=> $page_navi,
				'prev_text'=>'≪',
        'next_text'=>'≫',
    );
    echo '<div class="page-navi">'.paginate_links($arg).'</div>';
} ?>
