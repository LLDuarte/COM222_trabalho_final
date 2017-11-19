<div class="tudo">
	<div class="container-fluid fundo">
		<div class="row">
			<div class="col-sm-12">		
				<div class="row justify-content-center sobreposta" >
					<div class="col-sm-4 ml-sm-auto">
						<div class="row justify-content-center ">
							<div class="fotoUser2">								
								<img src="<?php echo BASE_URL.'assets/images/images_users/'.$foto_perfil;?>">		
							</div>	
						</div>												
					</div>
					<div class="col-sm-8 mr-sm-auto direita_info_user">						

						<div class="col-sm-9 informacoes_vinho">
							<div class="row justify-content-center label_review">
								<h2><?php echo $usuario;?></h2>								
							</div>
							<div class="row justify-content-center label_review">
								<h1>Avaliações realizadas: </h1>
							</div>
							<div class="row justify-content-center product_info_aval">
								<h2><?php echo $qtdAval['qtd']; ?> </h2>
							</div>							
						</div>
					</div>
				</div>	

				<div class="row">						
					<div class="col-sm-2 ml-sm-auto ">						
					</div>					
					<div class="col-sm-8 mr-sm-auto reviews2">
						<div class="row label_review">							
							<h4>Reviews</h4>						
						</div>

						<div class="row">							
							<div class="col-sm-7 ml-sm-auto label_aval">
								<h5>Avaliações</h5>
							</div>	
							<div class="col-sm-5 mr-sm-auto label_comment">
								<h5>Comentários</h5>
							</div>				
						</div>

						<?php foreach ($list_avaliacao_comments_user as $item):?>

							<div class="row">							
								<div class="col-sm-7 ml-sm-auto">										
									<label class="data">			
										<?php 
										echo date('d/m/Y',strtotime($item['data']))." - ";
										?>
									</label>	
									<a href="<?php echo BASE_URL;?>my_wines/user/?s=<?php echo $item['user_id']?>">
										<?php 
										echo $item['user_name'];
										?>
									</a>
									<label class="data">
										(Avaliação: 
											<?php 
											echo $item['avaliacao'];
											?>)
										</label>
									</div>	
									<div class="col-sm-5 mr-sm-auto">
										<label class="data"><?php echo '"'.$item['review'].'"'; ?></label>
									</div>				
								</div>
							<?php endforeach; ?> 

						</div>					
					</div>
					<div class="row">

						<div class="col-sm-3 ml-sm-auto">							

						</div>			
						<div class="col-sm-8 mr-sm-auto">

						</div>
					</div>	

				</div>
			</div>			
		</div>
