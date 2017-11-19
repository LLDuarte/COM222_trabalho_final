<div class="product_item">
	<a href="<?php echo BASE_URL; ?>product/open/<?php echo $id; ?>">

		<div class="product_image">
			<img src="<?php echo BASE_URL; ?>assets/images/rotulos/<?php echo $images[0]['url']; ?>" width="100%" />
		</div>

		<div class="product_name"><?php echo $nome; ?></div>
		<div class="product_brand"><?php echo $pais; ?> - <?php echo $regiao; ?></div>
		<div class="product_aval_label">Avaliação média</div><br>
		<div class="product_aval"><?php 
			if($avaliacao == 0){
				echo '0'; 
			}else{
				echo $avaliacao;
			}?>			
		</div>
		<div class="product_price">R$ <?php echo number_format($preco, 2, ',', '.'); ?></div>
		<div style="clear:both"></div>
	</a>
</div>

