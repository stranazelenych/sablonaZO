<?php
/*
Template Name: Splash page
*/
?>
<?php get_header(); ?>
<div id="container" class="splash">
      <div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_post_thumbnail(); ?></div>
          <?php the_content(); ?></p>
        <?php endwhile; ?>
        <?php endif; ?>
<?php
 //logika zobrazování custom fieldu true/false
if( get_field('boxx') )
{
    echo "do something";
}else{
    echo '<div style="width: 200px; height: 200px; background: #000;">';
}
?>
      </div>

<?php get_footer(); ?>
