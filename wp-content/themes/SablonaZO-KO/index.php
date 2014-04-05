<?php get_header(); ?>

<div id="container">

<div id="menu">
	<div class="menu-button">Menu</div>
	<nav>
      <ul data-breakpoint="800" class="flexnav">
        <li><a href="">kalendář akcí</a>
          <ul>
            <li> <a href="#content">Sub 1 Item 1</a></li>
            <li><a href="/">Sub 1 Item 2</a></li>
            <li><a href="/">Sub 1 Item 3</a></li>
            <li><a href="/">Sub 1 Item 4</a></li>
          </ul>
        </li>
        <li><a href="/">vedení ko zlín</a>
          <ul>
            <li><a href="/">Sub 1 Item 1</a></li>
            <li><a href="/">Sub 1 Item 2</a>
              <ul>
                <li><a href="/">Sub 2 Item 1</a></li>
                <li><a href="http://jasonweaver.name/">Sub 2 Item 2</a></li>
                <li><a href="http://jasonweaver.name/">Sub 2 Item 3</a></li>
              </ul>
            </li>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 3</a>
              <ul>
                <li><a href="http://jasonweaver.name/">Sub 2 Item 1</a></li>
                <li><a href="http://jasonweaver.name/">Sub 2 Item 2</a>
                  <ul>
                    <li><a href="http://jasonweaver.name/">Sub 3 Item 1</a></li>
                    <li><a href="http://jasonweaver.name/">Sub 3 Item 2</a></li>
                    <li><a href="http://jasonweaver.name/">Sub 3 Item 3</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="http://jasonweaver.name/">základní organizace</a>
          <ul>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 1</a></li>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 2</a></li>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 3</a></li>
          </ul>
        </li>
        <li><a href="http://jasonweaver.name/">naši zastupitelé</a>
          <ul>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 1</a></li>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 2</a></li>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 3</a></li>
          </ul>
        </li>
        <li><a href="http://jasonweaver.name/">dokumenty</a>
          <ul>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 1</a></li>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 2</a></li>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 3</a></li>
          </ul>
        </li>
        <li><a href="http://jasonweaver.name/">zpravodaj</a>
          <ul>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 1</a></li>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 2</a></li>
            <li><a href="http://jasonweaver.name/">Sub 1 Item 3</a></li>
          </ul>
        </li>
      </ul>
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
		<img src="http://placehold.it/900x700" alt=" " />
	</div><!-- /media-box -->

<?php } ?>

<!-- sloupce vpravo feeds -->
<div id="feeds">
	<div class="column">
		<div id="peticni-list" class="feed box ">
			<div class="header">Petiční list</div>
			<div class="content">
				<p>Petici za vyřešení hlučnosti silnice I/57 ve Vsetíně Rokytnici můžete podepsat <a href="#" class="read-more">ZDE »</a></p>
			</div>
		</div>
		<div id="novinky-emailem" class="feed box">
			<div class="header">Novinky emailem</div>
			<div class="content">
				<form>
					<input type="text" placeholder="Váš email" />
				</form>
			</div>
		</div>
		<div id="socialni-site" class="feed box">
			<div class="header">Petiční list</div>
			<div class="content">
				<p>FB box nebo TW stream</p>
			</div>
		</div>
	</div>
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


<?php get_footer(); ?>

