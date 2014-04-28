<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 oldie"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 oldie"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title( ' | ', true, 'right' ); ?><?php echo get_bloginfo( 'name' ); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1">

	      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_directory'); ?>/less/screen.less">

        <script>
          less = {
            env: "development",
            async: false,
            fileAsync: false,
            poll: 1000,
            functions: {},
            dumpLineNumbers: "comments",
            relativeUrls: false,
          };
        </script>

        <script src="<?php bloginfo('template_directory'); ?>/js/vendor/less-1.6.3.min.js" type="text/javascript"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.6.2.min.js"></script>

        <!-- slouží k vypisování scriptů a dalších záležitostí wordpressu a jeho pluginů !-->
        <?php wp_head(); ?>
    </head>
    <body>
		<div id="color-lines">
			<div class="orange"></div>
			<div class="blue"></div>
			<div class="purple"></div>
			<div class="yellow"></div>
			<div class="orange"></div>
		</div>
    <?php $imageurl = get_field('headerbg','option'); if($imageurl == ""){$noimg = true;}else{$noimg = false;}?>
		<div id="header-wrap" <?php if(!$noimg){echo 'style="background: url(' . get_field('headerbg','option') . ')center no-repeat">';}
      else { echo '>';}?>
			<div id="header">
        <?php if(get_field('headerlogo','option')):  ?>
				<div class="logo">
					<a href="<?php bloginfo( 'url' ); ?>" class="ctyrlistek"></a>
					<hgroup>
                        <a href="<?php bloginfo( 'url' ); ?>">
                            <h1>Strana zelených</h1>
                            <h2><?php echo get_field('header2','option');  ?></h2>
                        </a>
                    </hgroup>
					<div class="social">
					</div>
				</div>
        <?php endif; ?>
        <?php if(get_field('headerright','option')): ?>
				<div class="icons">
					<a href="#" class="clenove">Staňte se členy</a>
					<a href="#" class="podporte">Podpořte nás</a>
					<a href="#" class="info">Informujte se</a>
				</div>
        <?php endif; ?>
			</div>
		</div>
