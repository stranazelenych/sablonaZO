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
<div id="promo-box" class="box sedy">
	<h2>Dočasný box pro důležité téma (volby)</h2>
	<ul class="links">
		<li><a href="#">Seznamte se: naši kandidáti</a></li>
		<li><a href="#">Kalendář předvolebních akcí</a></li>
		<li><a href="#">Zahájení kampaně: fotogalerie</a></li>
	</ul>
</div><!-- /promo-box -->


<?php if (is_handheld()) { ?>

    <!-- box vpravo nahoře -->
	<div id="media-box" class="box">
		<img src="http://placehold.it/920x520" alt=" " />
	</div><!-- /media-box -->

<?php } ?>


<!-- box vlevo articles -->
<div id="articles">
  <?php get_template_part("loop","home"); ?>
</div><!-- /articles -->

</div><!-- /l-column -->

<div class="l-column">

<?php if (!is_handheld()) { ?>

    <!-- box vpravo nahoře -->
	<div id="media-box" class="box">
		<img src="http://placehold.it/900x700" alt=" " />
	</div><!-- /media-box -->

<?php } ?>

<!-- sloupce vpravo feeds -->
<div id="feeds">
		<?php if ( dynamic_sidebar('home-column-first') ) : else : endif; ?>
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
		<div id="aktuality" class="feed box">
			<div class="header">Aktuality zeleni.cz</div>
			<div class="content">
				<ul class="aktuality">
					<li><a href="#">Výběrové řízení na dodávku tisků pro volební kampaň do Evropského parlamentu 2014</a></li>
					<li><a href="#">Velkochovy prasat v ČR odporují evropské legislativě, zelení vyzývají ministerstvo k okamžité nápravě</a></li>
					<li><a href="#">Stream.cz: Zachráněné nádraží na Žižkově</a></li>
				</ul>
			</div>
		</div>
	</div>

</div><!-- /feeds -->

</div><!-- /l-column -->

</div><!-- /content-wrapper -->

</div><!-- /container -->

<?php include_once('visual.php'); ?>


<?php get_footer(); ?>

