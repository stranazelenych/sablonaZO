<?php
/**
 * @package SZ_Kandidatka
 * @version 0.1
 */

/**
 * Template Name: Kandidátka
 * Description: Evidence kandidátů Strany zelených
 * Version: 0.1.0
 * Author: Strana zelených <info@zeleni.cz>
 * Author URI: http://zeleni.cz
 * Author: Filip Zrůst <filip.zrust@sinsir.net>
 * Author URI: http://sinsir.net
 * Author: Michal Berg
 */

/**
 * @todo nominující strana (u koalic)
 * @todo zobrazování odkazů na weby a sociální sítě, pokud jsou vyplněny
 * @todo zobrazování fotky
 * @todo odkaz na výsledky voleb - pokud je vyplněno
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
			'items_wrap' => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>')); ?>
	</nav>
</div>

<div class="content-wrapper">
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<div class="l-section">
			<div id="content">
				<?php the_post_thumbnail( 'article-full' ); ?>
				<div id="topstory">
				    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<p>Volební období: <?php the_field( 'polls_term' ); ?>
					<p>Město: <?php the_field( 'polls_location' ); ?>
					<p><?php the_content(); ?></p>
			</div>
			<div class="clearfix"></div>
			<div id="text">
				<h4>Výpis kandidátů</h4>
<?php if ( have_rows( 'candidate' ) ) : ?>
<ol style="list-style-type: none;">
	<?php while ( have_rows( 'candidate' ) ) : ?>
		<?php the_row(); ?>
		<li><?php the_sub_field( 'position' ) ?>.
			<b>
				<?php if ( ! empty( $url = get_sub_field( 'detailed_bio' ) ) ) : ?>
					<a href="http://<?php esc_attr_e( $url ) ?>">
				<?php endif; ?>
				<?php the_sub_field( 'salutation_prefix' ); ?>
				<?php the_sub_field( 'first_name' ); ?>
				<?php the_sub_field( 'middle_name' ); ?>
				<?php the_sub_field( 'last_name' ); ?>
				<?php the_sub_field( 'salutation_suffix' ); ?>
				<?php if ( ! empty( $url ) ) : ?>
					</a>
				<?php endif; ?>
				<?php if ( ! empty( $age = get_sub_field('age') ) ) : ?>
					(<?php esc_html_e( $age ) ?> let)
				<?php endif; ?>
			</b>
			<br>
			<?php
    			the_sub_field('bio');

				if ( get_sub_field( 'is_member' ) and
					 get_sub_field( 'sex' ) === 'female' ) {
					esc_html_e( ', členka Strany zelených' );
				} elseif ( get_sub_field( 'is_member' ) and
						   get_sub_field( 'sex' ) === 'male' ) {
					esc_html_e( ', člen Strany zelených' );
				} elseif ( get_sub_field( 'is_member' ) ) {
					esc_html_e( ', člen (-ka) Strany zelených' );
				}
			?>

			<?php if ( ! empty( $photo_url = get_sub_field('photo') ) ) : ?>
				<p><img src="<?php esc_attr_e( $photo_url['url'] ) ?>" width="100" style="margin-bottom: 20px;"><br>
			<?php endif; ?>
		</li>
		<?php
			// do something with $sub_field_3
		?>
	<?php endwhile; ?>
</ol>
<?php endif; ?>

		</div>
		<?php if ( dynamic_sidebar( 'box-under-post' ) ) : else : endif; ?>
	</div>
</div><!-- /l-section -->
<div class="l-aside">
	<?php if ( dynamic_sidebar( 'post-page-right' ) ) : else : endif; ?>
</div><!-- /l-aside -->

<?php endwhile; ?>
<?php endif; ?>

</div><!-- /content-wrapper -->
</div><!-- /container -->

<?php include_once 'visual.php'; ?>

<?php get_footer(); ?>
