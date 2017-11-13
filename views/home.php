<div class="container div-consulta">
	<div class="row">

		<div class="col-2 separador consulta-container">
			<form class="form-horizontal" method="GET" action="wines">
				<center>
					<div class="form-group" style="padding-top: 10px;">
						<select class="form-control btn btn-secondary" name="filter[select]" id="exampleFormControlSelect1">
							<option>Tinto</option>	
							<option>Branco</option>
							<option>Rosé</option>
							<option>Vinho do Porto</option>
							<option>Espumante</option>
							<option>Vinho de Sobremesa</option>
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
						<input type="text" id="amount" readonly style="border:0; color:darkgray; font-weight:bold;">
						<input type="text" id="amount" readonly style="border:0; color:darkgray; font-weight:bold;">
						<div id="slider-range" style="background-color: #430C0C;"></div>
					</small>
				</center>
			</div>

			<div class="col-4 separador">

				Intervalo de avaliações:		
				<small>
					<input type="hidden" id="slider3" name="filter[slider3]" value="<?php echo  $viewData['filters']['slider3']?>">
					<input type="text" id="estrela" readonly style="border:0; color:darkgray; font-weight:bold;">	<div id="slider-range-max" style="background-color: #430C0C; "></div>
				</small>

			</div>

			<div class="col-2 consulta-container">
				<center><input type="submit" class="btn btn-secondary" value="Mostrar vinhos"></center>
			</div>
		</form>
	</div>
</div>

<div>
	<img src="<?php echo BASE_URL;?>assets/images/bg-inicial.jpg" class="img-fluid" alt="Responsive image" style="width: 100%">
</div>