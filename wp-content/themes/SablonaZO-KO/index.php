<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  

<div id="topstory">
   <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>           
   <div id="topstory-text"><?php the_content(); ?></div>
</div>

<div id="content">

</div>

<?php endwhile; ?>
<?php endif; ?>  

<?php get_footer(); ?>

