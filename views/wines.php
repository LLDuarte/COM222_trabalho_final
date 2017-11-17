<section>
	<div class="container div-wines">
		<div class="row">
			<div class="col-sm-3">
				<aside>
					<h1>Escolha</h1>
					<div class="filterarea">

						<form method="GET">
							<div class="filterbox">
								<div class="filtertitle">Tipos de vinho</div>
								<div class="filtercontent">

									
									
									<?php foreach($viewData['filters']['tipo_vinho'] as $item):?>
										<div class="filteritem">
											<input type="checkbox" <?php echo (isset($viewData['filters_selected']['tipo_vinho']) && in_array($item['nome'], $viewData['filters_selected']['tipo_vinho']))?'checked="checked"':''; ?>  name="filter[tipo_vinho][]" value="<?php echo $item['nome']; ?>" id="filter_tipo_vinho<?php echo $item['nome']; ?>" /> 
											<label for="filter_tipo_vinho<?php echo $item['nome']; ?>"><?php echo $item['nome']; ?>											
											</label>
										</div>
									<?php endforeach; ?> 
								</div>
							</div>

							<div class="filterbox">
								<div class="filtertitle">Intervalo de preços</div>
								<div class="filtercontent">
									<input type="hidden" id="slider0" name="filter[slider0]" value="<?php echo $viewData['filters']['slider0'] ?>">
									<input type="hidden" id="slider1" name="filter[slider1]" value="<?php echo $viewData['filters']['slider1'] ?>">
									<input type="text" id="amount" readonly style="border:0; color:darkgray; font-weight:bold;">

									<div id="slider-range" style="background-color: #430C0C;"></div>
								</div>
							</div>

							<div class="filterbox">
								<div class="filtertitle">Intervalo de avaliações</div>
								<div class="filtercontent">
									<input type="hidden" id="slider3" name="filter[slider3]" value="<?php echo  $viewData['filters']['slider3']?>">
									<input type="text" id="estrela" readonly style="border:0; color:darkgray; font-weight:bold;">	<div id="slider-range-max" style="background-color: #430C0C; "></div>
								</div>
							</div>

							<div class="filterbox">
								<div class="filtertitle">Tipos de uva</div>
								<div class="filtercontent">
									<?php foreach($viewData['filters']['tipo_uva'] as $item):?>
										<div class="filteritem">
											<input type="checkbox" <?php echo (isset($viewData['filters_selected']['tipo_uva']) && in_array($item['tipo_uva'], $viewData['filters_selected']['tipo_uva']))?'checked="checked"':''; ?>  name="filter[tipo_uva][]" value="<?php echo $item['tipo_uva']; ?>" id="filter_tipo_uva<?php echo $item['tipo_uva']; ?>" /> 
											<label for="filter_tipo_uva<?php echo $item['tipo_uva']; ?>"><?php echo $item['tipo_uva']; ?>											
											</label>
										</div>
									<?php endforeach; ?> 
								</div>
							</div>

							<div class="filterbox">
								<div class="filtertitle">País</div>
								<div class="filtercontent">
									<?php foreach($viewData['filters']['pais'] as $item):?>
										<div class="filteritem">
											<input type="checkbox" <?php echo (isset($viewData['filters_selected']['pais']) && in_array($item['pais'], $viewData['filters_selected']['pais']))?'checked="checked"':''; ?>  name="filter[pais][]" value="<?php echo $item['pais']; ?>" id="filter_pais<?php echo $item['pais']; ?>" /> 
											<label for="filter_pais<?php echo $item['pais']; ?>"><?php echo $item['pais']; ?>											
											</label>
										</div>
									<?php endforeach; ?> 
								</div>
							</div>

							<div class="filterbox">
								<div class="filtertitle">Estilo do vinho</div>
								<div class="filtercontent">
									<?php foreach($viewData['filters']['estilo'] as $item):?>
										<div class="filteritem">
											<input type="checkbox" <?php echo (isset($viewData['filters_selected']['estilo']) && in_array($item['estilo'], $viewData['filters_selected']['estilo']))?'checked="checked"':''; ?>  name="filter[estilo][]" value="<?php echo $item['estilo']; ?>" id="filter_estilo<?php echo $item['estilo']; ?>" /> 
											<label for="filter_estilo<?php echo $item['estilo']; ?>"><?php echo $item['estilo']; ?>											
											</label>
										</div>
									<?php endforeach; ?> 
								</div>
							</div>

							<div class="filterbox">
								<div class="filtertitle">Harmonização com comidas</div>
								<div class="filtercontent">
									<?php foreach($viewData['filters']['comidas'] as $item):?>
										<div class="filteritem">
											<input type="checkbox" <?php echo (isset($viewData['filters_selected']['comidas']) && in_array($item['comidas'], $viewData['filters_selected']['comidas']))?'checked="checked"':''; ?>  name="filter[comidas][]" value="<?php echo $item['comidas']; ?>" id="filter_comidas<?php echo $item['comidas']; ?>" /> 
											<label for="filter_comidas<?php echo $item['comidas']; ?>"><?php echo $item['comidas']; ?>											
											</label>											
										</div>
									<?php endforeach; ?> 
								</div>
							</div>
						</div>
					</form>
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
						<div class="col-sm-3">
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
						<a href="<?php echo BASE_URL;?>wines/?<?php 
						$pagArray = $_GET;
						$pagArray['p'] = $q;
						echo http_build_query($pagArray);
						?>">
						<?php echo $q;?>
					</a>
				</div>
			<?php endfor;?>
		</div>
	</div>
</div>
</section>