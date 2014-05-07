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

<!-- box vlevo articles -->
<div id="articles">
    
    <h2>Hledání</h2>
    
        <?php if ( have_posts() ) : ?>
                <header class="archive-header">
                        <h1 class="archive-title"><?php printf( __( 'Kategorie: %s' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>

                <?php if ( tag_description() ) : // Show an optional tag description ?>
                        <div class="archive-meta"><?php echo tag_description(); ?></div>
                <?php endif; ?>
                </header><!-- .archive-header -->

                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();

                        /* Include the post format-specific template for the content. If you want to
                         * this in a child theme then include a file called called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                        get_template_part( 'content');
                
                ?>
                                   
                <?php endwhile; ?>
                
                <?php paginate(); ?>

        <?php else : ?>
                Žádné příspěvky
        <?php endif; ?>

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

