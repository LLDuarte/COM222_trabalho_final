
<div class="container div-consulta">
	<div class="row">

		<div class="col-2 separador consulta-container">
			<form class="form-horizontal" method="GET" action="wines">
				<center>
					<div class="form-group" style="padding-top: 10px;">
						<select class="form-control btn btn-outline-secondary" name="filter[tipo_vinho][]">
							<option value="Tinto">Tinto</option>	
							<option value="Branco">Branco</option>
							<option value="Rosé">Rosé</option>
							<option value="Porto">Vinho do Porto</option>
							<option value="Espumante">Espumante</option>
							<option value="Vinho de Sobremesa">Vinho de Sobremesa</option>
						</select>
					</div>
				</center>
			</div>

			<div class="col-4 separador">
				<center>
					Intervalo de preços:
					<small>
						<input type="hidden" id="slider0" name="filter[slider0]" value="<?php echo $viewData['filters']['slider0'] ?>">
						<input type="hidden" id="slider1" name="filter[slider1]" value="<?php echo $viewData['filters']['slider1'] ?>">
						<input type="text" id="amount" readonly style="border:0; color:darkgray; font-size: 15px; font-weight:bold;">
						<input type="text" id="amount" readonly style="border:0; color:darkgray; font-size: 15px; font-weight:bold;">
					</small>
					<div id="slider-range"></div>

				</center>
			</div>

			<div class="col-4 separador">
				
				Avaliação:		
				<small>
					<input type="hidden" id="slider3" name="filter[slider3]" value="<?php echo  $viewData['filters']['slider3']?>">
					<input type="text" id="estrela" readonly style="border:0; color:darkgray; font-size: 15px;  font-weight:bold;">
					<br><br>
				</small>
				
				<div id="slider-range-max"></div>
				
				
			</div>

			<div class="col-2 consulta-container">
				<i class="glyphicon glyphicon-file"></i>
				<center><button type="submit" class="btn btn-outline-secondary" value="Mostrar vinhos">Mostrar vinhos<span class="glyphicons glyphicons-glass"></span></button></center>
			</div>
		</form>
	</div>
</div>

<div>
	<img src="<?php echo BASE_URL;?>assets/images/bg-inicial.jpg" class="img-fluid" alt="Responsive image" style="width: 100%">
</div>