
        <div id="footer">
          <center>
            <span>© Copyright 2013 KNEDLÍK JEDLÍK a. s. & eSports.cz, s.r.o.</span><span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
            <a href="/autorska-prava">Informace o autorských právech</a>
          </center>
        </div>
      </div><!-- /container -->
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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="<?php bloginfo('template_directory'); ?>/js/plugins.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
    </body>
</html>
