<div class="container">
	<div class="bottom-nav">
		<?php if ( dynamic_sidebar('footer-menu') ) : else : endif; ?>
	</div>
</div>

<?php

if ( is_page_template('page-template-splash.php') ) {
    echo "věci pro splash";
}

?>


<div class="visual">
    <div class="action-boxes">
        <div class="box box-info">
            <h3>Získejte informace</h3>
            <?php if ( dynamic_sidebar('action-box-info') ) : else : endif; ?>
        </div>
        <div class="box box-fundraising">
            <h3>Podpořte nás</h3>
            <a href="<?php echo get_field("fundraising","option");?>" class="action-box-button" >Darovat</a>
        </div>
    </div>
</div>

<div class="visual-footer">
    <?php if ( dynamic_sidebar('footer-text') ) : else : endif; ?>
</div>
