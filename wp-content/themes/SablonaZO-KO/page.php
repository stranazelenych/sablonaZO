<?php
/*
Template Name: homepage
*/
?>

<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  

<div id="content">
<div id="topstory">
   <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>           
   <div id="topstory-text"><?php the_excerpt(); ?></div>
</div>

<div class="clearfix"></div>
<div id="text">
  <p><?php the_content(); ?></p>
  <div id="cards">
    <div class="card I">
      <h1>Farmářské knedlíky</h1>
      <p><b>Knedlík</b> je vařený pokrm vyrobený z těsta. Složení těsta se podle různých receptů velmi liší....</p>
    </div>
  </div>
</div>

<?php endwhile; ?>
<?php endif; ?>  

<?php get_footer(); ?>

