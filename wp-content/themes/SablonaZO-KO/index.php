<?php get_header(); ?>

<div id="container">

<div id="menu">
	<ul role="menu">
		<li><a href="#">kalendář akcí</a></li>
		<li><a href="#">vedení ko zlín</a></li>
		<li><a href="#">základní organizace</a></li>
		<li><a href="#">naši zastupitelé</a></li>
		<li><a href="#">dokumenty</a></li>
		<li><a href="#">zpravodaj</a></li>
	</ul>
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
	<article class="highlight">
		<a href="#"><img src="http://placehold.it/920x520" alt=" " /></a>
		<h2><a href="#">Brno: Zelení nesouhlasí s plánem na zdražení MHD</a></h2>
		<p class="perex"><span class="datum-publikovani">21. 7. 2014</span>Strana zelených nesouhlasí s nápadem nového ministra dopravy Pavla Dobeše zavést známky za použití silnic I. třídy, aby získal další prostředky do Státního fondu dopravní infrastruktury. "Okurková sezóna snese mnohé, ale zveřejňovat kdejaký nepromyšlený návrh se nevyplácí," komentuje návrh předseda Ondřej Liška.</p>
	</article>
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
		Ahoj
	</div><!-- /media-box -->

<?php } ?>

<!-- sloupce vpravo feeds -->
<div id="feeds">
</div><!-- /feeds -->

</div><!-- /column -->

</div><!-- /content-wrapper -->


<?php get_footer(); ?>

