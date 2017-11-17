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
							<h1><?php echo $usuario;?></h1>
						</div>
						<div class="row justify-content-center">
							
							<h1>Avaliações realizadas: </h1>
						</div>
						<div class="row justify-content-center">
							
							<h1><?php echo $qtdAval['qtd']; ?> </h1>
						</div>
					</div>
					<div class="col-sm-7 mr-sm-auto direita_vinhos">						
						
						<div class="row">							
							<h4>Reviews</h4>							
						</div>
						<div class="row">							
							<div class="col-sm-6 ml-sm-auto">
								<h5>Avaliações</h5>
							</div>	
							<div class="col-sm-6 mr-sm-auto">
								<h5>Comentários</h5>
							</div>	
							<?php foreach ($list_avaliacao_comments_user as $item):?>

								<div class="row">							
									<div class="col-sm-6 ml-sm-auto">
										<?php 

										echo date('d/m/Y',strtotime($item['data']))." - "?>
										<a href="<?php echo BASE_URL;?>my_wines/user/?s=<?php echo $item['user_id']?>">
											<?php echo $item['user_name']?>
										</a>
										(Avaliação: <?php echo $item['avaliacao'].")";

										?>

									</div>	
									<div class="col-sm-6 mr-sm-auto">
										<?php echo '"'.$item['review'].'"'; ?>
									</div>				
								</div>
							<?php endforeach; ?> 			
						</div>
					</div>
				</div>
			</div>				
		</div>
	</div>			
</div>
