    <?php if (is_handheld()) { ?>
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
        <?php wp_footer(); ?>
        <script src="<?php bloginfo('template_directory'); ?>/js/plugins.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
        <script>
          jQuery(document).ready(function($){
                  $(".info-line-menu").flexNav({
                    'animationSpeed':     250,            // default for drop down animation speed
                    'transitionOpacity':  true,           // default for opacity animation
                    'buttonSelector':     '.menu-button', // default menu button class name
                    'hoverIntent':        false,          // Change to true for use with hoverIntent plugin
                    'hoverIntentTimeout': 150,            // hoverIntent default timeout
                    'calcItemWidths':     false,          // dynamically calcs top level nav item widths
                    'hover':              true            // would you like hover support?
                  });
                  $(".flexnav").flexNav({
                    'animationSpeed':     250,            // default for drop down animation speed
                    'transitionOpacity':  true,           // default for opacity animation
                    'buttonSelector':     '.menu-button', // default menu button class name
                    'hoverIntent':        false,          // Change to true for use with hoverIntent plugin
                    'hoverIntentTimeout': 150,            // hoverIntent default timeout
                    'calcItemWidths':     false,          // dynamically calcs top level nav item widths
                    'hover':              true            // would you like hover support?
                  });
          });
        </script>
    </body>
</html>
