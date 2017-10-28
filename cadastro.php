<!doctype html>
<html lang="pt-br">

<head>
	<title>Cadastre-se no Vovoni</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="_css/estilo.css">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>

<body>
	<!-- MENU -->
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

	<div class="container div-cadastro ">
		<div class="row">
			<div class="col">
				<center><strong><h2>Entre para a comunidade!</h2></strong><br>

					<!-- ********************* DEFINIR O MÉTODO DE ACESSO DO PHP ******************************** -->
					<form method="get">
						<div class="form-group">
							<center><label for="exampleInputEmail1">Nome:</label>
								<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome..." required>
							</center>
						</div>

						<div class="form-group">
							<center><label for="exampleInputEmail1">Sobrenome:</label>
								<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome..." required>
							</center>
						</div>

						<div class="form-group">
							<center><label for="exampleInputEmail1">Email:</label>
								<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail..." required>
							</center>
						</div>
						<div class="form-group">
							<center><label for="exampleInputPassword1">Senha:</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required></center>
							</div>

							<div class="form-group">
								<center><label for="exampleFormControlFile1">Foto (opcional):</label></center>
								<input type="file" class="form-control-file" id="exampleFormControlFile1">
							</div><br>

							<center><button type="button" class="btn btn-secondary">Enviar</button></center>

						</form>
					</div>
				</div>
			</div>

		</body>
		</html>