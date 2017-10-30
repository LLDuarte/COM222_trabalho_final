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
	<div class="row espacamento-interno-menu">
		<div class="col-8 separador">
			<a href="home"><img src="<?php echo BASE_URL;?>assets/images/logo.png" class="img-fluid" alt="Responsive image" style="height: 30px;"></a>
		</div>
		<div class="col-4">
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link active" href="home" style="font-weight: bold;">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="my_wines">Explorar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="cadastro_user">Cadastrar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login">Login</a>
				</li>
			</ul>
		</div>
	</div>


	<div class="container">
		<h1>Login</h1>

		<form method="POST" action="login/entrar">
			<div class="form-group">
				<label class="col-md-4 control-label" for="idEmail">Email</label>  
				<div class="col-md-12">
					<input id="idEmail" name="email" type="email" placeholder="Digite o email" class="form-control input-md" required="">

				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="idSenha">Senha</label>  
				<div class="col-md-12">
					<input id="idSenha" name="senha" type="password" placeholder="Digite a senha" class="form-control input-md" required="">

				</div>
			</div>
			<button type="submit" class="btn btn-secondary">Entrar</button>
		</form>
	</div>
	<div class="footer-bottom fixed-bottom">
		<div class="container">
			<footer class="footer">
				<div class="row justify-content-center">
					<div class="copyright">
						&reg; 2017, Vovoni All rights reserved
					</div>
				</div>				
			</footer>
		</div>
	</div>

</body>
</html>