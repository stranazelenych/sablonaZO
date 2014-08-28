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

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="l-section">
	<div id="content">
            
                <?php the_post_thumbnail('article-full'); ?>
           
            
		<div id="topstory">
		   <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                   
        	Datum voleb: <?php the_field('polls_date', 'option') ?>        
                
		</div>
		<div class="clearfix"></div>
		<div id="text">
		
		Výpis kandidátů
		
		<?php

$values = get_field('candidate');
if($values)
{
	echo '<ul>';

	foreach($values as $value)
	{
		echo '<li>' . $value . '</li>';
	}

	echo '</ul>';
}

// always good to see exactly what you are working with
var_dump($values);

?>
		
		
		
		</div>
                
                
                <?php if ( dynamic_sidebar('box-under-post') ) : else : endif; ?>
                
	</div>
</div><!-- /l-section -->
<div class="l-aside">
        <?php if ( dynamic_sidebar('post-page-right') ) : else : endif; ?>
</div><!-- /l-aside -->

<?php endwhile; ?>
<?php endif; ?>

</div><!-- /content-wrapper -->

</div><!-- /container -->

<?php include_once('visual.php'); ?>

<?php get_footer(); ?>
