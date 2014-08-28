<?php
/*
Template Name: Kandidátka
*/
?>

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



<?php
 //logika zobrazování custom fieldu true/false
if( get_field('boxx') )
{
    echo "do something";
}else{
    echo '<div style="width: 200px; height: 200px; background: #000;">';
}
?>





<div class="l-aside">
    
    <?php if ( dynamic_sidebar('post-page-right') ) : else : endif; ?>
    
</div><!-- /l-aside -->

<?php endwhile; ?>
<?php endif; ?>

</div><!-- /content-wrapper -->

</div><!-- /container -->

<?php include_once('visual.php'); ?>

<?php get_footer(); ?>
