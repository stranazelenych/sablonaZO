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
		   <!-- <div id="topstory-text"><?php the_excerpt(); ?></div>  -->
		</div>
		<div class="clearfix"></div>
		<div id="text">
		  <p><span class="date"><?php the_date('j. n. Y'); ?></span><?php the_content(); ?></p>
		</div>
	</div>
</div><!-- /l-section -->
<div class="l-aside">
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
</div><!-- /l-aside -->

<?php endwhile; ?>
<?php endif; ?>

</div><!-- /content-wrapper -->

</div><!-- /container -->

<?php include_once('visual.php'); ?>

<?php get_footer(); ?>

