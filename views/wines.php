<section>
	<div class="container div-wines">
		<div class="row">
			<div class="col-sm-3">
				<aside>
					<h1>Filtro</h1>
					<div class="filterarea">

					</div>

					<div class="widget">
						<h1>ds</h1>
						<div class="widget_body">
							...
						</div>
					</div>
				</aside>
			</div>
			<div class="col-sm-9">
				<div class="row">
					<?php
					$a = 0;
					?>
					<?php foreach($list as $product_item): ?>
						<div class="col-sm-4">
							<?php $this->loadView('rotulos_wines', $product_item); ?>
						</div>
						<?php
						if($a >= 3 ) {
							echo '</div><div class="row">';
						}
						?>
					<?php endforeach; ?>
				</div>
				<br>
				<?php for($q=1;$q<=$numeroPaginas;$q++):?>
					<div class="paginationItem <?php echo ($paginaAtual==$q)?'pag_active':''; ?>">
						<a href="<?php echo BASE_URL;?>wines/?p=<?php echo $q; ?>">
							<?php echo $q;?>
						</a>
					</div>
				<?php endfor;?>
			</div>
		</div>
	</div>
</section>