<section>
	<div class="container div-wines">
		<div class="row">
			<div class="col-sm-3">
				<aside>
					<h1>Escolha</h1>
					<div class="filterarea">
						<div class="filterbox">
							<div class="filtertitle">Tipos de vinho</div>
							<div class="filtercontent">
								...
							</div>
						</div>

						<div class="filterbox">
							<div class="filtertitle">Intervalo de preços</div>
							<div class="filtercontent">
								
								<input type="text" id="amount" readonly style="border:0; color:darkgray; font-weight:bold;">

								<div id="slider-range" style="background-color: #430C0C;"></div>
							</div>
						</div>

						<div class="filterbox">
							<div class="filtertitle">Intervalo de avaliações</div>
							<div class="filtercontent">
								<input type="text" id="estrela" readonly style="border:0; color:darkgray; font-weight:bold;">	<div id="slider-range-max" style="background-color: #430C0C; "></div>
							</div>
						</div>

						<div class="filterbox">
							<div class="filtertitle">Tipos de uva</div>
							<div class="filtercontent">
								...
							</div>
						</div>

						<div class="filterbox">
							<div class="filtertitle">País</div>
							<div class="filtercontent">
								...
							</div>
						</div>

						<div class="filterbox">
							<div class="filtertitle">Estilo do vinho</div>
							<div class="filtercontent">
								...
							</div>
						</div>

						<div class="filterbox">
							<div class="filtertitle">Harmonização com comidas</div>
							<div class="filtercontent">
								...
							</div>
						</div>
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