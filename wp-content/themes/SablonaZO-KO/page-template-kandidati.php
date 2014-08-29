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
                  
        	<p>Volební období: <?php the_field('polls_term') ?>
        	<p>Město: <?php the_field('polls_location') ?>        

		</div>
		<div class="clearfix"></div>
		<div id="text">
		<h4>Výpis kandidátů</h4>
		
<!-- 
hodnoty hlavičky kandidátky:


polls_type
polls_year
polls_date
polls_term
polls_location
polls_manager_name
polls_manager_email
polls_manager_phone
polls_result (URL)

hodnoty výpisu kandidátů; 
position
salutation_prefix
first_name
middle_name
last_name
salutation_suffix
email
phone
address
postal_code
city
is_member (1|0)
nominator
sex
age
bio
detailed_bio (URL)
web (URL)
facebook (URL)
twitter (URL)
google+ (URL)
photo (image)

TODO:
- zobrazování věku a dalších položek pouze pokud jsou vyplněny
- zobrazování odkazu na podrobný profil - méno jako aktivní link
- nominující strana (u koalic)
- zobrazování odkazů na weby a sociální sítě, pokud jsou vyplněny
- zobrazování fotky

- odkaz na výsledky voleb - pokud je vyplněno


-->

<?php if( have_rows('candidate') ): ?>
 
    <ul style="list-style-type:none;">
 
    <?php while( have_rows('candidate') ): the_row(); ?>
 
        <li><?php the_sub_field('position'); ?>. 
        <b>
        
        <?php  
       
       $url=get_sub_field('detailed_bio');
       
        if (!empty($url)) {
        echo "<a href=". $url . ">";
        } 
        ?>
        
        <?php the_sub_field('salutation_prefix'); ?> 
        <?php the_sub_field('first_name'); ?> 
        <?php the_sub_field('middle_name'); ?>
        <?php the_sub_field('last_name'); ?>
        <?php the_sub_field('salutation_suffix');
        
        if (!empty($url)) {
        echo "</a>";
        } 
        ?>
        
        
        (<?php the_sub_field('age'); ?> let) 
        </b>
        
       
        
       <br>
       <?php the_sub_field('bio'); ?>,
        
        
       <?php

if (get_sub_field('is_member')==1) {
  echo " člen(ka) Strany zelených";
} else {
  echo " bez p.p.";
}

$photo_url = get_sub_field('photo');

        if (!empty($photo_url)) {
        echo "<img src=" . $photo_url . " align=left width=400 >" ;
        } 
        
        ?>      
    
       
        
        </li>
        
        <?php 
        
        
        
        // do something with $sub_field_3
        
        ?>
        
    <?php endwhile; ?>
 
    </ul>
 
<?php endif; ?>
		
		
		
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
