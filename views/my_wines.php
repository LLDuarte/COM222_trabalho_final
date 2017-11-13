<div class="tudo">
	<div class="container-fluid fundo">
		<div class="row">
			<div class="col-sm-12">		
				<div class="row justify-content-center sobreposta" >
					<div class="col-sm-4 ml-sm-auto esquerda_foto">
						<div class="row justify-content-center ">
							<div class="fotoUser">
								<img src="<?php echo BASE_URL.'assets/images/images_users/'.$foto;?>">
							</div>							
						</div>
						<br>
						<div class="row justify-content-center">
							<h1><?php echo $usuario_nome;?></h1>
						</div>
						<div class="row justify-content-center">
							
							<h1>Avaliações: </h1>
						</div>
					</div>
					<div class="col-sm-7 mr-sm-auto direita_vinhos">						
						<div id="menu" class="normal botao menu-wines">
							<ul class="nav">								
								<li class="nav-item">
									<a class="nav-link" href="cadastro_vinho">Cadastrar Vinho</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="cadastroVinho">Top 30 Avaliações</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="cadastroVinho">Últimas Avaliações</a>
								</li>								
							</ul>
						</div>
						<br>
						<div class="col-sm-12">
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
									<a href="<?php echo BASE_URL;?>wines/?p=<?php echo $q; ?>">
										<?php echo $q;?>
									</a>
								</div>
							<?php endfor;?>
						</div>
					</div>
				</div>
			</div>				
		</div>
	</div>			
</div>
