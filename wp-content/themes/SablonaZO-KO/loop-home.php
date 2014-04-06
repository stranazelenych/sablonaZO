
<!-- Query sticky post. -->
<?php query_posts( array( 'post__in' => get_option('sticky_posts'),'showposts'=>'1') ); ?>

<!-- Display sticky post if exist. -->
<?php if ( have_posts() ){ while ( have_posts() ) : the_post(); ?>          
    	<article class="highlight">
		     <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
		     <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		     <p class="perex"><?php the_excerpt(); ?></p>
	    </article> 
  <?php endwhile; ?>
<?php }else{ ?>
asd
<?php } ?>
