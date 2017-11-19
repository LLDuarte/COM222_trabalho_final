<!DOCTYPE html>
<html>
<head>
	<title>Vovoni - Bem vindo!</title>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="<?php echo BASE_URL;?>assets/images/wine.ico" type="image/x-icon"/>

	<!-- Bootstrap CSS -->

	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/jquery-ui.structure.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/jquery-ui.theme.min.css">


</head>
</head>
<body>
	<!-- MENU -->
	<!-- MENU -->
	<nav class="navbar fixed-top navbar-expand-lg espacamento-interno-menu bg-light">
		
		<a class="navbar-brand" href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL;?>assets/images/logo.png" class="img-fluid" alt="Responsive image" style="height: 30px;"></a>
		
		<div class="collapse navbar-collapse navbar-fixed-top" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo BASE_URL; ?>">Home <span class="sr-only">(current)</span></a>
				</li>	
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo BASE_URL; ?>wines">Wines <span class="sr-only">(current)</span></a>
				</li>							
				<?php 
				if(!empty($viewData['usuario_nome'])){ 
					?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo BASE_URL; ?>my_wines">My wines</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="foto_lado_nome">
								<?php if ($viewData['foto'] == NULL) {
									?>
									<img height="30px" width="30px" src="<?php echo BASE_URL.'assets/images/images_users/padrao.png';?>">	
									<?php
								}else{
									?>
									<img height="30px" width="30px" src="<?php echo BASE_URL.'assets/images/images_users/'.$viewData['foto'];?>">	
									<?php
								} ?>
							</span>
							<?php echo $viewData['usuario_nome'];?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?php echo BASE_URL;?>edicao_user">Editar Perfil</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo BASE_URL;?>login/sair">Sair</a>			
						</div>
					</li>					
					<?php
				} else {
					?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo BASE_URL; ?>cadastro_user">Cadastrar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo BASE_URL; ?>login">Login</a>
					</li>
					<?php 
				}
				?>
			</ul>
		</div>
	</nav>

	<?php $this->loadViewInTemplate($viewName, $viewData); ?>
	

	<center>			
		<div class="div-rodape">
			© Copyright 2017 - Todos os direitos reservados <br>
			Edson Valdir | Leandro Duarte | Victor Rodrigues
		</div>

	</center>	
	
	<!-- JS -->
	<script type="text/javascript">
		var maxslider = <?php echo $viewData['filters']['maxslider']; ?>;
	</script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/script.js"></script>


</body>
</html>