<?= tag_if('h2',$block["title"]) ?>

<div class="post-list">
  	<ol>
	  <?php while ( have_posts() ) : the_post(); ?>
  		<li class="blog-item"><div><span><?php the_time( 'Y/m/d' ); ?></span><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></li>
	  <?php endwhile; ?>
	  </ol>
</div>
<div class="page-navi">
<?php
    echo paginate_links($arg);
?>
</div>