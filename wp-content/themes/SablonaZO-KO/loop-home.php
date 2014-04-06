
<!-- Query sticky post. -->
<?php query_posts( array('showposts'=>'7') ); ?>

<?php $i=1; ?>
<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>   
<?php if ($i++==1)$highlight="highlight";else $highlight=""; ?>           
    	<article class="<?php echo $highlight ?>">
		     <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
		     <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		     <p class="perex"><?php the_excerpt(); ?></p>
	    </article> 
  <?php endwhile; ?>
<?php endif; ?>

