<?php
/*
Template Name: homepage
*/
?>

<?php get_header(); ?>

<div class="container main">

<div class="content-wrapper">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="l-section">
	<div id="content">
		<div id="topstory">
		   <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		   <div id="topstory-text"><?php the_excerpt(); ?></div>
		</div>

		<div class="clearfix"></div>
		<div id="text">
		  <p><?php the_content(); ?></p>
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

<?php get_footer(); ?>

