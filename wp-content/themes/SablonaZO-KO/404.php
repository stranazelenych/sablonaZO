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
  
    <h1>Stránka nenalezena</h1>
    <?php get_search_form(); ?>
    
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
		<!-- <div id="peticni-list" class="feed box ">
			<div class="header">Petiční list</div>
			<div class="content">
				<p>Petici za vyřešení hlučnosti silnice I/57 ve Vsetíně Rokytnici můžete podepsat <a href="#" class="read-more">ZDE »</a></p>
			</div>
		</div>
		<div id="socialni-site" class="feed box">
			<div class="header">Petiční list</div>
			<div class="content">
				<p>FB box nebo TW stream</p>
			</div>
		</div> -->
	<div class="column">
		<?php if ( dynamic_sidebar('home-column-second') ) : else : endif; ?>
		<!-- <div id="aktuality" class="feed box">
			<div class="header">Aktuality zeleni.cz</div>
			<div class="content">
				<ul class="aktuality">
					<li><a href="#">Výběrové řízení na dodávku tisků pro volební kampaň do Evropského parlamentu 2014</a></li>
					<li><a href="#">Velkochovy prasat v ČR odporují evropské legislativě, zelení vyzývají ministerstvo k okamžité nápravě</a></li>
					<li><a href="#">Stream.cz: Zachráněné nádraží na Žižkově</a></li>
				</ul>
			</div>
		</div> -->
	</div>

</div><!-- /feeds -->

</div><!-- /l-column -->

</div><!-- /content-wrapper -->

</div><!-- /container -->

<?php include_once('visual.php'); ?>


<?php get_footer(); ?>

