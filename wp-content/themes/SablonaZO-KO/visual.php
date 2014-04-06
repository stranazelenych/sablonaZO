<div class="container">
	<div class="bottom-nav">
		<a href="#">kalendář akcí</a>
		<a href="#">vedení ko zlín</a>
		<a href="#">základní organizace</a>
		<a href="#">naši zastupitelé</a>
		<a href="#">dokumenty</a>
		<a href="#">zpravodaj</a>
	</div>
</div>

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
    <p>Ing.Vilém Jurek, předseda KO  |  tel. 605 526 958  |  email: <a href="#">vilem.j@gmail.com</a></p>
</div>
