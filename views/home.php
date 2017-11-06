
<div class="container div-consulta">
	<div class="row">

		<div class="col-2 separador consulta-container">
			<form class="form-horizontal" method="POST" action="wines">
				<center><div class="dropdown show">
					<a class="btn btn-secondary dropdown-toggle consulta-container" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Tinto
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="#">Branco</a>
						<a class="dropdown-item" href="#">Rosé</a>
						<a class="dropdown-item" href="#">Vinho do Porto</a>
						<a class="dropdown-item" href="#">Espumante</a>
						<a class="dropdown-item" href="#">Vinho de Sobremesa</a>
					</div>
				</div></center>
			</div>

			<div class="col-4 separador">
				<center><small>Intervalo de preços:</small> <br><small>Até R$<input type="text" id="display" value="0" class="label-slider" readonly> </small><br> <input type="range" name="vol" value="0" min="0" max="1300" oninput="display.value=value" onchange="display.value=value"></center>
			</div>

			<div class="col-4 separador">
				<center><small>Intervalo de avaliações:</small> <br><input type="text" id="display2" value="0" class="label-slider2" readonly> <small> estrelas</small><br> <input type="range" name="vol" value="0" min="0" max="5" oninput="display2.value=value" onchange="display2.value=value"> </center>
			</div>

			<div class="col-2 consulta-container">
				<center><input type="submit" class="btn btn-secondary" value="Mostrar vinhos"></center>
			</div>
		</form>
	</div>
</div>

<div style="float: left;"><img src="<?php echo BASE_URL;?>assets/images/bg-inicial.jpg" class="img-fluid" alt="Responsive image" style="width: 100%"></div>
