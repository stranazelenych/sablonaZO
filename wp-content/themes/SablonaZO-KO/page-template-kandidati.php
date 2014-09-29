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
 * @todo zobrazování fotky
 * @todo odkaz na výsledky voleb - pokud je vyplněno
 */

$hasShareCenter = isset( $bit51scp ) &&
    isset( $scpoptions ) &&
    $scpoptions['single'] == 1;

$memberLabel = array(
	'' => 'člen (-ka)',
	'female' => 'členka',
	'male' => 'člen',
);
$independentLabel = array(
	'' => 'nezávislý kandidát (-ka)',
	'female' => 'nezávislá kandidátka',
	'male' => 'nezávislý kandidát',
);
$nominantLabel = array(
	'' => 'kandidát (-ka)',
	'female' => 'kandidátka',
	'male' => 'kandidát',
);
$nominatorLabel = array(
	'greens' => 'Strany zelených',
);
$profileLabel = array(
    'web' => 'webu',
    'facebook' => 'Facebooku',
    'twitter' => 'Twitteru',
    'google-plus' => 'Google+',
);

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
	<?php while ( have_rows( 'candidate' ) ) : the_row();

		$detailedBio = get_sub_field( 'detailed_bio' );
		$age = get_sub_field( 'age' );

		$isMember = is_scalar( get_sub_field( 'is_member' ) ) ?
			get_sub_field( 'is_member' ) :
			get_sub_field( 'is_member' ) == array( 'ano' );
		$sex = get_sub_field( 'sex' );
		$nominator = get_sub_field( 'nominator' );

		$web = get_sub_field( 'web' );
		$twitter = get_sub_field( 'twitter' );
		$facebook = get_sub_field( 'facebook' );
		$googlePlus = get_sub_field( 'google_plus' );

		$photo = get_sub_field( 'photo' );

		$parsedDetailedBio = parse_url( $detailedBio );
		if ( $detailedBio and ! isset( $parsedDetailedBio['scheme'] ) and
			 substr( $parsedDetailedBio['path'], 0, 2 ) !== '//' ) {
			$detailedBio = 'http://' . $detailedBio;
		}

		$nominatorName = isset( $nominatorLabel[ $nominator ] ) ?
			$nominatorLabel[ $nominator ] :
			$nominator;
		if ( $isMember ) {
			$label = $memberLabel[ $sex ] . ' Strany zelených';
		} elseif ( $nominator === 'independent' ) {
			$label = $independentLabel[ $sex ];
		} elseif ( $nominator ) {
			$label = $nominantLabel[ $sex ] . ' ' . $nominatorName;
		} else {
			$label = '-- NEZNÁMÝ VZTAH KE STRANĚ ZELENÝCH --';
		}

		$parsedWeb = parse_url( $web );
		if ( $web and ! isset( $parsedWeb['scheme'] ) and
			 substr( $parsedWeb['path'], 0, 2 ) !== '//' ) {
			$web = 'http://' . $web;
		}
		$parsedGooglePlus = parse_url( $googlePlus );
		if ( $googlePlus and ! isset( $parsedGooglePlus['scheme'] ) and
			 substr( $parsedGooglePlus['path'], 0, 2 ) !== '//' ) {
			$googlePlus = 'https://' . $googlePlus;
		}

		$profiles = array();
		if ( $web ) {
		    $profiles[ $profileLabel['web'] ] = $web;
		}
		if ( $facebook ) {
		    $profiles[ $profileLabel['facebook'] ] = 'https://facebook.com/' . $facebook;
		}
		if ( $twitter ) {
		    $profiles[ $profileLabel['twitter'] ] = 'https://twitter.com/' . $twitter;
		}
		if ( $googlePlus ) {
		    $profiles[ $profileLabel['google-plus'] ] = $googlePlus;
		}
		end( $profiles );
		$lastProfile = key( $profiles );

		$photoUrl = is_scalar( $photo ) ? $photo : $photo['url'];
		$photoAlt = is_scalar( $photo ) ? '' : $photo['alt'];

?>
		<li><?php the_sub_field( 'position' ); ?>.
			<b>
				<?php if ( $detailedBio ) : ?>
					<a href="<?php esc_attr_e( $detailedBio ); ?>">
				<?php endif; ?>
				<?php the_sub_field( 'salutation_prefix' ); ?>
				<?php the_sub_field( 'first_name' ); ?>
				<?php the_sub_field( 'middle_name' ); ?>
				<?php the_sub_field( 'last_name' ); ?>
				<?php the_sub_field( 'salutation_suffix' ); ?>
				<?php if ( $detailedBio ) : ?>
					</a>
				<?php endif; ?>
				<?php if ( $age ) : ?>
					(<?php esc_html_e( $age ); ?> let)
				<?php endif; ?>
			</b>
			<br>
			<?php the_sub_field('bio'); ?>, <?php esc_html_e( $label ); ?>
			<br>
			<?php if ( $hasShareCenter ): ?>
				<?php if ( $facebook ) : ?>
		            <div class="fb-follow" data-href="https://www.facebook.com/<?php esc_attr_e( $facebook ); ?>" data-colorscheme="light" data-layout="button" data-show-faces="false"></div>
				<?php endif; ?>
				<?php if ( $twitter ) : ?>
	            	<a href="https://twitter.com/<?php esc_attr_e( $twitter ); ?>" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false" data-lang="cs">Sledovat</a>
				<?php endif; ?>
				<?php if ( $googlePlus ) : ?>
					<div class="g-follow" data-annotation="none" data-height="20" data-href="<?php esc_attr_e( $googlePlus ); ?>" data-rel="author"></div>
				<?php endif; ?>
			<?php elseif ( $profiles ) : ?>
            	Sleduj na:
				<?php $first = true; foreach ( $profiles as $label => $url ) : ?><?php if ( ! $first and  $label == $lastProfile ) : ?> nebo <?php elseif ( ! $first ) : ?>, <?php else : $first = false; endif; ?>
            		<a href="<?php esc_attr_e( $url ); ?>"><?php esc_html_e( $label ); ?></a><?php endforeach; ?>
			<?php endif; ?>

			<?php if ( $photo ) : ?>
				<p><img src="<?php esc_attr_e( $photoUrl ); ?>"<?php if ( $photoAlt ) : ?> alt="<?php esc_attr_e( $photoAlt ); ?>"<?php endif; ?> width="100" style="margin-bottom: 20px;"><br>
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
