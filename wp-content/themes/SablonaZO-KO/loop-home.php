
<!-- Query sticky post. -->
<?php query_posts( array('showposts'=>'7') ); ?>

<?php $i = 1; ?>
<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>   
<?php $featured = ($i++ == 1) ? true : false; ?>  

        <article <?php if ($featured) {echo "class='highlight'";} ?>>
            <a href="<?php the_permalink() ?>">
                <?php
                if ($featured) {
                    the_post_thumbnail('article-featured');
                } else {
                    the_post_thumbnail('thumbnail');
                }
                ?>
                         
                     </a>
		     <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		     <p class="perex"><?php the_excerpt(); ?></p>
	    </article> 
  <?php endwhile; ?>
<?php endif; ?>

