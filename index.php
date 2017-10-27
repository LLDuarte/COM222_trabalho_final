<!doctype html>
<html lang="pt-br">

<head>
	<title>Vovoni - Bem vindo!</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="_css/estilo.css">
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>

<body>
	<div class="row espacamento-interno-menu">
		<div class="col-8 separador">
			<a href="index.php"><img src="_images/logo.png" class="img-fluid" alt="Responsive image" style="height: 30px;"></a>
		</div>
		<div class="col-4">
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link active" href="index.php"  style="font-weight: bold;">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Explorar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Cadastrar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Entrar</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="container div-consulta">
		<div class="row">
			<div class="col-2 separador consulta-container">
				<div class="dropdown show">
					<a class="btn btn-secondary dropdown-toggle centralizacao-consulta" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Tinto
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="#">Branco</a>
						<a class="dropdown-item" href="#">Rosé</a>
						<a class="dropdown-item" href="#">Vinho do Porto</a>
						<a class="dropdown-item" href="#">Espumante</a>
						<a class="dropdown-item" href="#">Vinho de Sobremesa</a>
					</div>
				</div>
			</div>
			<div class="col-4 separador">
				
				Intervalo de preços: <input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/>
			</div>
			<div class="col-4 separador">
				Intervalo de avaliações: <input id="ex2" type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/>
			</div>
			<div class="col-2 centralizacao-consulta">
				<button type="button" class="btn btn-secondary">Mostrar vinhos</button>
			</div>
		</div>
	</div>

	<div style="float: left;"><img src="_images/bg-inicial.jpg" class="img-fluid" alt="Responsive image" style="width: 100%"></div>

</body>
</html>