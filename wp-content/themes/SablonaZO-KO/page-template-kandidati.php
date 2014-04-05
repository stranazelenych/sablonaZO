<?php
/*
Template Name: Splash page
*/
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="web knedlík jedlík">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/splash.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>