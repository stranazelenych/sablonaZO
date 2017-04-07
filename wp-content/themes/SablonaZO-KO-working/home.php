<?php/*
Template Name: Homepage
*/?>

<?php get_header(); ?>

<div class="container main">

<div id="menu">
	<div class="menu-button">Menu</div>
	<nav>
		<?php wp_nav_menu( array(
	        'theme_location' => 'primary',
	        'menu_class' => 'flexnav', //Adding the class for FlexNav
	        'items_wrap' => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>'));
		?>
  </nav>
</div>

<div class="content-wrapper">

<div class="l-column">
<!-- box vlevo nahoře -->
<?php if ( dynamic_sidebar('home-top-left') ) : else : endif; ?>

<!-- /promo-box -->


<?php if (is_handheld()) { ?>

    <!-- box vpravo nahoře -->
	<?php if ( dynamic_sidebar('home-top-right') ) : else : endif; ?>
	<!-- /media-box -->

<?php } ?>


<!-- box vlevo articles -->
<div id="articles">
  <?php get_template_part("loop","home"); ?>

  	<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
	<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
	

</div><!-- /articles -->

</div><!-- /l-column -->

<div class="l-column">

<?php if (!is_handheld()) { ?>

    <!-- box vpravo nahoře -->
    <?php if ( dynamic_sidebar('home-top-right') ) : else : endif; ?>
    
<!-- /media-box -->

<?php } ?>

<!-- sloupce vpravo feeds -->
<div id="feeds">
	<div class="column">
		<?php if ( dynamic_sidebar('home-column-first') ) : else : endif; ?>
	</div>
	
	<div class="column">
		<?php if ( dynamic_sidebar('home-column-second') ) : else : endif; ?>
	
	</div>

</div><!-- /feeds -->

</div><!-- /l-column -->

</div><!-- /content-wrapper -->

</div><!-- /container -->

<?php include_once('visual.php'); ?>


<?php get_footer(); ?>

