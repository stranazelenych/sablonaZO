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
	'one' => 'Profil',
	'many' => 'Profily'
);
$profileTypeLabel = array(
	'web' => 'web',
	'facebook' => 'Facebook',
	'twitter' => 'Twitter',
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
	<?php while ( have_posts() ) : the_post();

		$result = get_field( 'polls_result' );
		$photoSize = get_field( 'photo_size' );

		$parsedResult = parse_url( $result );
		if ( $result and ! isset( $parsedResult['scheme'] ) and
			 substr( $parsedResult['path'], 0, 2 ) !== '//' ) {
			$result = 'http://' . $result;
		}

		if ( ! $photoSize ) $photoSize = 100;

	?>
		<div class="l-section">
			<div id="content">
				<?php the_post_thumbnail( 'article-full' ); ?>
				<div id="topstory">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<p>Volební období: <?php esc_html_e( get_field( 'polls_term' ) ); ?>
					<p>Město: <?php esc_html_e( the_field( 'polls_location' ) ); ?>
					<?php if ( $result ) : ?>
						<p><a href="<?php esc_attr_e( $result ); ?>">Výsledky hlasování</a></p>
					<?php endif; ?>
					<?php the_content(); ?>
				</div>
				<div class="clearfix"></div>
				<div id="text">
					<h4>Výpis kandidátů</h4>
<?php if ( have_rows( 'candidate' ) ) : ?>
<ol style="list-style-type: none; margin-left: 0; padding-left: 0;">
	<?php while ( have_rows( 'candidate' ) ) : the_row();

		$detailedBio = get_sub_field( 'detailed_bio' );
		$age = get_sub_field( 'age' );

		$bio = get_sub_field('bio');

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
			$profiles[ $profileTypeLabel['web'] ] = $web;
		}
		if ( $facebook ) {
			$profiles[ $profileTypeLabel['facebook'] ] = 'https://facebook.com/' . $facebook;
		}
		if ( $twitter ) {
			$profiles[ $profileTypeLabel['twitter'] ] = 'https://twitter.com/' . $twitter;
		}
		if ( $googlePlus ) {
			$profiles[ $profileTypeLabel['google-plus'] ] = $googlePlus;
		}
		end( $profiles );
		$lastProfile = key( $profiles );

		$profilesLabel = count( $profiles ) > 1 ?
			$profileLabel['many'] :
			$profileLabel['one'];

		if ( $photo and is_scalar( $photo ) ) {
			$photo = array(
				'url' => $photo,
				'alt' => ''
			);
		}

		// Snaží se najít nejbližší vyšší šířku k šířce dané v
		// nastavení kandidátky, aby byl využit vhodný zdroj pro změnu
		// velikosti (co nejmenší přenos dat při zachování kvality).
		$displayedPhoto = null;
		if ( $photo ) {
			$photoWidths = array();
			foreach ( $photo['sizes'] as $key => $size ) {
				if ( substr( $key, -6 ) === '-width' ) {
					$photoWidths[ substr( $key, 0, -6 ) ] = $size;
				}
			}
			asort( $photoWidths );
			foreach ( $photoWidths as $key => $size ) {
				if ( $size > $photoSize ) {
					$displayedPhoto = array(
						'url' => $photo['sizes'][ $key ],
						'alt' => $photo['alt']
					);
					break;
				}
			}
		}
		if ( $photo and ! $displayedPhoto ) {
			$displayedPhoto = array(
				'url' => $photo['url'],
				'alt' => $photo['alt']
			);
		}

	?>
		<li style="margin-left: 0; margin-bottom: 20px; padding-left: 0;"><?php esc_html_e( get_sub_field( 'position' ) ); ?>.
			<b>
				<?php if ( $detailedBio ) : ?>
					<a href="<?php esc_attr_e( $detailedBio ); ?>">
				<?php endif; ?>
				<?php esc_html_e( get_sub_field( 'salutation_prefix' ) ); ?>
				<?php esc_html_e( get_sub_field( 'first_name' ) ); ?>
				<?php esc_html_e( get_sub_field( 'middle_name' ) ); ?>
				<?php esc_html_e( get_sub_field( 'last_name' ) ); ?>
				<?php esc_html_e( get_sub_field( 'salutation_suffix' ) ); ?>
				<?php if ( $detailedBio ) : ?>
					</a>
				<?php endif; ?>
				<?php if ( $age ) : ?>
					(<?php esc_html_e( $age ); ?> let)
				<?php endif; ?>
			</b>
			<br>
			<?php if ( $bio ) : ?>
				<?php esc_html_e( $bio ); ?>,
			<?php endif; ?>
			<?php esc_html_e( $label ); ?>
			<br>
			<?php if ( false and $hasShareCenter ): ?>
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
				<?php esc_html_e( $profilesLabel ); ?>:
				<?php $first = true; foreach ( $profiles as $label => $url ) : ?><?php if ( ! $first and  $label == $lastProfile ) : ?> a <?php elseif ( ! $first ) : ?>, <?php else : $first = false; endif; ?>
					<a href="<?php esc_attr_e( $url ); ?>" target="_blank"><?php esc_html_e( $label ); ?></a><?php endforeach; ?>
			<?php endif; ?>

			<?php if ( $displayedPhoto ) : ?>
				<p><img src="<?php esc_attr_e( $displayedPhoto['url'] ); ?>"<?php if ( $displayedPhoto['alt'] ) : ?> alt="<?php esc_attr_e( $displayedPhoto['alt'] ); ?>"<?php endif; ?> width="<?php esc_attr_e( $photoSize ); ?>"><br>
			<?php endif; ?>
		</li>
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
