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
					<a class="nav-link" href="#">Entrar</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="container div-cadastro ">
		<div class="row">
			<div class="col">
				<!-- ********************* DEFINIR O MÉTODO DE ACESSO DO PHP ******************************** -->
				<form class="form-horizontal" method="POST">
					<!-- Form Name -->
					<h1 class="welcome text-center">Entre para a comunidade!</h1>
					
					<?php if(!empty($erro)): ?>
						<div class="alert alert-danger"><?php echo $erro; ?></div>
					<?php endif; ?>
					
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="idNome">Nome</label>  
						<div class="col-md-12">
							<input id="idNome" name="nome" type="text" placeholder="Digite o nome" class="form-control input-md" required="">

						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="idSobrenome">Sobrenome</label>  
						<div class="col-md-12">
							<input id="idSobrenome" name="sobrenome" type="text" placeholder="Digite o sobrenome" class="form-control input-md" required="">

						</div>
					</div>

					<!-- Password input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="idEmail">Email</label>
						<div class="col-md-12">
							<input id="idEmail" name="email" type="text" placeholder="Digite o email" class="form-control input-md" required="">

						</div>
					</div>
					<!-- Password input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="idSenha">Senha</label>
						<div class="col-md-12">
							<input id="idSenha" name="senha" type="password" placeholder="Digite a senha" class="form-control input-md" required="">

						</div>
					</div>
					<!-- Password input-->
					<div class="form-group">
						<label class="col-md-6 control-label" for="idFoto">Foto (opcional)</label>
						<div class="col-md-12">
							<input id="idFoto" name="foto" type="file" placeholder="Digite o telefone" class="form-control input-md" required="">

						</div>
					</div>

					<!-- Button (Double) -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="idConfirmar"></label>
						<div class="col-md-8">
							<input type="submit" class="btn btn-secondary" value="Confirmar">				   
						</div>
					</div>

				</div>
			</form>
		</div>
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