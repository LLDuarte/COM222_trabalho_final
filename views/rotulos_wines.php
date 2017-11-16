<div class="product_item">
	<a href="<?php echo BASE_URL; ?>product/open/<?php echo $id; ?>">

		<div class="product_image">
			<img src="<?php echo BASE_URL; ?>assets/images/rotulos/<?php echo $images[0]['url']; ?>" width="100%" />
		</div>
		<div class="product_name"><?php echo $nome; ?></div>
		<div class="product_brand"><?php echo $regiao; ?></div>
		<div class="product_price_from"><?php
		if($preco != '0') {
			echo 'R$ '.number_format($preco, 2, ',', '.');
		}
		?></div>
		<div class="product_price">R$ <?php echo number_format($preco, 2, ',', '.'); ?></div>
		<div style="clear:both"></div>
	</a>
</div>

