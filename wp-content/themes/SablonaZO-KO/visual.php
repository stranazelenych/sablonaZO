<div class="container">
	<div class="bottom-nav">
		<?php if ( dynamic_sidebar('footer-menu') ) : else : endif; ?>
	</div>
</div>



<div class="visual">
    
    
    
    <?php
    // Splash things
    if ( is_page_template('page-template-splash.php') ) { ?>
        <a href="<?php echo get_permalink( 669 ) ?>" class="splash-continue">Pokračovat na web »</a>
    <?php } ?>
    
    <?php
    // Splash things
    if ( is_page_template('page-template-splash.php') ) { ?>

    <div class="org-name">
        <a href="<?php bloginfo('url'); ?>" class="ctyrlistek"></a>
        <hgroup>
            <a href="<?php bloginfo('url'); ?>">
                <h1>Strana zelených</h1>
                <h2><?php echo get_field('header2', 'option'); ?></h2>
            </a>
        </hgroup>
    </div>

    <?php } ?>
    
    
    <div class="action-boxes">
        
        <?php if (get_field('show-box-newsletter', 'option') == "Ano") : ?>
            <div class="box box-info">
                <h3>Získejte informace</h3>
                <?php if ( dynamic_sidebar('action-box-info') ) : else : endif; ?>
            </div>
        <?php endif; ?>
        
        
        <?php if (get_field('show-box-fundraising', 'option') == "Ano") : ?>
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
