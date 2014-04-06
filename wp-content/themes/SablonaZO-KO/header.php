<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 oldie"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 oldie"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
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
        <?php if (!is_handheld()) { ?>
          <div id="info-line-wrap">
              <div id="info-line">
                <?php wp_nav_menu( array( 'theme_location' => 'info-line', 'container_class' => 'menu') ); ?>
                <?php if ( dynamic_sidebar('info-line') ) : else : endif; ?>
                <div class="social">
                    <a href="#" class="twitter"><?php __('Twitter účet Strany zelených'); ?></a>
                    <a href="#" class="facebook"><?php __('Facebook účet Strany zelených'); ?></a>
                    <a href="#" class="youtube"><?php __('Youtube účet Strany zelených'); ?></a>
                </div>
              </div>
          </div>
        <?php } ?>
		<div id="header-wrap">
			<div id="header">
				<div class="logo">
					<a href="/" class="ctyrlistek"></a>
					<h1>
						<a href="#">Strana zelených</a>
					</h1>
					<h2>
						<a href="#">Moravskoslezský kraj</a>
					</h2>
					<div class="social">
					</div>
				</div>
			</div>
		</div>
