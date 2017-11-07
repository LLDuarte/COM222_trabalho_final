<!DOCTYPE html>
<html>
<head>
	<title>Vovoni - Bem vindo!</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/style.css">
	
	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
</head>
<body>
	<!-- MENU -->
	<nav class="navbar fixed-top navbar-expand-lg espacamento-interno-menu bg-light">
		
		<a class="navbar-brand" href="home"><img src="<?php echo BASE_URL;?>assets/images/logo.png" class="img-fluid" alt="Responsive image" style="height: 30px;"></a>
		
		<div class="collapse navbar-collapse navbar-fixed-top" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
				</li>				
				<li class="nav-item">
					<a class="nav-link" href="cadastro_user">Cadastrar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login">Login</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container div-cadastro ">
		<div class="row">
			<div class="col">
				<!-- ********************* DEFINIR O MÉTODO DE ACESSO DO PHP ******************************** -->
				<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="cadastro_user/cadastraUsuario">
					<!-- Form Name -->
					<h1 class="welcome text-center">Cadastre um novo vinho!</h1>

					<div class="form-group">
						<label for="inputNome">Nome</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="Nome do vinho..." required>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputTipoVinho">Tipo do Vinho</label>
							<select id="inputState" class="form-control">
								<option selected>Tinto</option>
								<option>Branco</option>
								<option>Rosé</option>
								<option>Porto</option>
								<option>Espumante</option>
								<option>Sobremesa</option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="inputTipoUva">Tipo da Uva</label>
							<select id="inputState" class="form-control">
								<option selected>Cabernet Sauvignon</option>
								<option>Merlot</option>
								<option>Malbec</option>
								<option>Carménère</option>
								<option>Pinot Noir</option>
								<option>Syrah</option>
								<option>Tannat</option>
								<option>Tempranillo</option>
								<option>Sauvignon</option>
								<option>Blanc</option>
								<option>Blend</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="inputAcompanhamentos">Acompanhamentos</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="Peixes, carnes, queijos..." required>
					</div>


					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="inputVinicola">Vinícola</label>
							<input type="text" class="form-control" id="inputEmail4" placeholder="Vinicola..." required>
						</div>
						<div class="form-group col-md-4">
							<label for="inputVinicola">Região</label>
							<input type="text" class="form-control" id="inputEmail4" placeholder="Sardenha..." required>
						</div>
						<div class="form-group col-md-4">
							<label for="inputVinicola">País</label>
							<input type="text" class="form-control" id="inputEmail4" placeholder="Itália, Brasil..." required>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputVinicola">Estilo do Vinho</label>
							<input type="text" class="form-control" id="inputEmail4" placeholder="Estilo..." required>
						</div>
						<div class="form-group col-md-6">
							<label for="inputVinicola">Preço</label>
							<input type="text" class="form-control" id="inputEmail4" placeholder="Apenas números..." required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-12 control-label" for="idFoto">Foto do Rótulo</label>
						<input id="idFoto" name="foto" type="file" class="form-control input-md">
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label" for="idConfirmar"></label>
						<div class="col-md-12">
							<center><input type="submit" class="btn btn-secondary" value="Confirmar"></center>
						</div>
					</div>
				</form>
			</div>
		</div>



	</body>
	</html>