<?php
/*
Template Name: Splash page
*/
?>
<?php get_header(); ?>


<style>
    
    /* CSS hidden parts on page */
    #header-wrap, #info-line-wrap {
        display: none; 
    }
    
</style>

<div id="container" class="splash">

    <?php /*
    <div id="menu">
            <div class="menu-button">Menu</div>
            <nav>
                    <?php wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class' => 'flexnav', //Adding the class for FlexNav
                    'items_wrap' => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>'));
                    ?>
      </nav>
    </div> */ ?>
    
    
<?php include_once('visual.php'); ?>
        
    <?php $custom_background_url =  get_field('splash-background', 'option') ?>
    <?php $custom_background_show =  get_field('show-splash-background', 'option') ?>
    
    <?php if ( $custom_background_show && strlen($custom_background_url) ) { ?>
    
    <style>
        .splash .visual {
            background-image: url('<?php echo $custom_background_url ?>');
        }
    </style>
    
    <?php } ?>
    

    <?php /*
    <div class="visual">
        <hgroup class="org-name">
            <h1>Strana zelených</h1>
            <h2><?php get_bloginfo ( 'description' );  ?></h2>
        </hgroup>
        <div class="action-boxes">
            <div class="box box-info">
                <h3>Získejte informace</h3>
            </div>
            <div class="box box-fundraising">
                <h3>Podpořte nás</h3>
            </div>
        </div>
    </div> */ ?>
    
    
    <?php /*<div class="visual-footer">
        <p>Ing.Vilém Jurek, předseda KO  |  tel. 605 526 958  |  email: <a href="#">vilem.j@gmail.com</a></p>
    </div> */ ?>

      <div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_post_thumbnail(); ?></div>
          <?php the_content(); ?></p>
        <?php endwhile; ?>
        <?php endif; ?>





<?php get_footer(); ?>
