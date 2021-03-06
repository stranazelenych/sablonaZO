<div class="container">
	<div class="bottom-nav">
		<?php if ( dynamic_sidebar('footer-menu') ) : else : endif; ?>
	</div>
</div>



<div class="visual">
    
    
    <?php if ( !is_page_template('page-template-splash.php') && get_field('footer-image-disabled', 'option') ) { ?>
    
        <style>
            .visual {
                background: transparent;
                min-height: 0;
            }
        </style>
    
    <?php } ?>
    
    <?php if ( !is_page_template('page-template-splash.php') && !get_field('footer-image-disabled', 'option') && strlen(get_field('footer-image', 'option')) ) { ?>
    
        <style>
            .visual {
                background-image: url(<?php echo get_field('footer-image', 'option') ?>);
            }
        </style>
    
    <?php } ?>
    
    <?php
    // Splash things
    if ( is_page_template('page-template-splash.php') ) { ?>
    
        <?php if (get_field('splash-show-continue-link', 'option')) { ?>
            <a href="<?php echo get_field('splash-button-url', 'option'); ?>" class="splash-continue"><?php echo get_field('splash-button-text', 'option'); ?></a>
        <?php } ?>        
        
    <?php } ?>
    
    <?php
    // Splash things
    if ( is_page_template('page-template-splash.php') ) { ?>

        <?php if (get_field('splash-show-logo', 'option')) { ?>
            
            <div class="org-name">
                <a href="<?php bloginfo('url'); ?>" class="ctyrlistek"></a>
                <hgroup>
                    <a href="<?php bloginfo('url'); ?>">
                        <h1>Strana zelených</h1>
                        <h2><?php echo get_field('splash-logo-second-line', 'option'); ?></h2>
                    </a>
                </hgroup>
            </div>
        
        <?php } ?>
        

    <?php } ?>
    
    
    <div class="action-boxes">
        
        <?php if ( ( is_page_template('page-template-splash.php') && get_field('show-box-newsletter', 'option') ) ||
                ( !is_page_template('page-template-splash.php') && get_field('footer-show-box-newsletter', 'option') ) ) : ?>
            <div class="box box-info">
                <h3>Získejte informace</h3>
                <?php if ( dynamic_sidebar('action-box-info') ) : else : endif; ?>
            </div>
        <?php endif; ?>
        
        
        <?php if ( ( is_page_template('page-template-splash.php') && get_field('show-box-fundraising', 'option') ) ||
                ( !is_page_template('page-template-splash.php') && get_field('footer-show-box-fundraising', 'option') ) ) : ?>
            <div class="box box-fundraising">
                <h3>Podpořte nás</h3>
                <a href="<?php echo get_field("fundraising","option");?>" class="action-box-button" >Darovat</a>
            </div>
        <?php endif; ?>
    </div>
    
    
    
</div>

<div class="visual-footer">
    <?php if ( dynamic_sidebar('footer-text') ) : else : endif; ?>
</div>
