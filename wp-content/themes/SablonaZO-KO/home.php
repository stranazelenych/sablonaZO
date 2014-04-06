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

<div class="column">
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
	<article>
		<img src="http://placehold.it/200x200">
		<h2><a href="#">Spalování igelitek je výhodné pouze pro průmyslovou lobby</a></h2>
		<span class="datum-publikovani">2. 12. 2013</span>
	</article>
	<article>
		<img src="http://placehold.it/200x200">
		<h2><a href="#">Výběrové řízení na dodávku tisků pro volební kampaň do Evropského parlamentu 2014</a></h2>
		<span class="datum-publikovani"> 1. 1. 2012</span>
	</article>
</div><!-- /articles -->

</div><!-- /column -->

<div class="column">

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

</div><!-- /column -->

</div><!-- /content-wrapper -->

</div><!-- /container -->

<div class="container">
	<div class="bottom-nav">
		<a href="#">kalendář akcí</a>
		<a href="#">vedení ko zlín</a>
		<a href="#">základní organizace</a>
		<a href="#">naši zastupitelé</a>
		<a href="#">dokumenty</a>
		<a href="#">zpravodaj</a>
	</div>
</div>

<div class="visual">
    <div class="action-boxes">
        <div class="box box-info">
            <h3>Získejte informace</h3>
        </div>
        <div class="box box-fundraising">
            <h3>Podpořte nás</h3>
        </div>
    </div>
</div>
<div class="visual-footer">
    <p>Ing.Vilém Jurek, předseda KO  |  tel. 605 526 958  |  email: <a href="#">vilem.j@gmail.com</a></p>
</div>


<?php get_footer(); ?>

