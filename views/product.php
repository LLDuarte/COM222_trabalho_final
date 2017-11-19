<div class="tudo">
	<div class="container-fluid fundo">
		<div class="row">
			<div class="col-sm-12">		
				<div class="row justify-content-center sobreposta" >
					<div class="col-sm-4 ml-sm-auto">
						<div class="row justify-content-center ">
							<div class="fotoRotulo">
								<center>
									<img src="<?php echo BASE_URL;?>assets/images/rotulos/<?php echo $product_image; ?>" width = "100%" >																	
								</center>
							</div>	

						</div>												
					</div>
					<div class="col-sm-8 mr-sm-auto direita_vinho">						
						
						<div class="col-sm-9 informacoes_vinho">

							<div class="row justify-content-center">
								<div class="col-sm-12">
									<?php 
									if(isset($_SESSION['login']) && ($product_info['id_usuario'] == $_SESSION['login'])){ 

										?>
										<a href="<?php echo BASE_URL; ?>product/edit/<?php echo $product_info['id']; ?>"><span style="float:right"><img title="Altere as informações do vinho." src="<?php echo BASE_URL;?>assets/images/edit.png"></span></a>
										<?php 

									} ?>
								</div>			
								<div class="col-sm-12">
									<center><h2><?php echo $product_info['nome']; ?></h2></center>	
								</div>
											
							</div>
							<div class="row justify-content-center product_info_pais">
								<small><?php echo $product_info['regiao'].' - '.$product_info['pais']; ?></small>
							</div>
							<div class="row justify-content-center product_info_aval">
								<small>Avaliação média (<?php echo $aval['qtd']; ?> avaliações)</small>
							</div>
							<div class="row justify-content-center">
								<h2><?php 
								//var_dump($aval['avaliacao']);
								if(isset($aval['avaliacao'])){
									echo round($aval['avaliacao'], 2);
								}else{
									echo '0';
								}

								?></h2>
							</div>
							<div class="row justify-content-center product_info_price">
								<span>Preço R$ <?php echo number_format($product_info['preco'],2); ?></span>
							</div>
						</div>
					</div>
				</div>	
				<form method="GET">
					<div class="row">						
						<div class="col-sm-3 ml-sm-auto avaliacao">
							<div class="row justify-content-center label_review">							
								<h4>Avalie este vinho: </h4>
							</div>
							<div class="row justify-content-center">
								<?php 
								if(isset($_SESSION['login'])){ ?>								
								<?php 
								//var_dump($list_id_users['user_id']); exit;
								if ((empty($list_id_users))||($list_id_users['user_id'] != $_SESSION['login'])) {								
									?>
									<div class="filtercontent">									
										<input type="hidden" id="slider3" name="filter[slider3]" value="<?php echo $viewData['filters']['slider3']?>">
										<input type="text" id="estrela" readonly style="border:0; color:darkgray; font-weight:bold;">	<div id="slider-range-max"></div>								
									</div>
									<?php 
								}else{
									?>
									<div class="col-sm-9 alert alert-danger alert-dismissible fade show" role="alert">
										<?php echo "Você já avaliou este vinho."; ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>						
									<?php
								} ?>

								<?php 
							}else{
								?>
								<div class="col-sm-11 alert alert-danger alert-dismissible fade show" role="alert">
									<?php echo "Faça o login para avaliar este vinho."; ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>										
								<?php
							} ?>

						</div>
					</div>					
					<div class="col-sm-8 mr-sm-auto reviews">
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

						<?php foreach ($list_avaliacao_comments as $item):?>

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

						<div class="col-sm-3 ml-sm-auto write_review">
							<div class="row justify-content-center label_review">
								<h4>Comente sobre ele:</h4>
							</div>
							<div class="row justify-content-center">
								<?php if(isset($_SESSION['login'])){ ?>									
								<?php 
								if ((empty($list_id_users))||($list_id_users['user_id'] != $_SESSION['login'])) {								
									?>						
									<div class="form-group">
										<textarea class="form-control text_review" rows="8" name="comment">								
										</textarea>
									</div>	
									<?php 
								}else{
									?>
									<div class="col-sm-11 alert alert-danger alert-dismissible fade show" role="alert">
										<?php echo "Você já comentou sobre este vinho."; ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<?php
								} ?>									
								<?php 
							}else{
								?>
								<div class="col-sm-11 alert alert-danger alert-dismissible fade show" role="alert">
									<?php echo "Faça o login para comentar sobre este vinho."; ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>								
								<?php
							} ?>												
						</div>						
						<div class="row justify-content-center">
							<?php if(isset($_SESSION['login'])){ ?>	
							<?php 
							if ((empty($list_id_users))||($list_id_users['user_id'] != $_SESSION['login'])) {								
								?>							
								<input type="submit" class="btn btn-outline-secondary seleciona" value="Confirmar">
								<?php }else{
									echo " ";
								} ?>
								<?php 
							}else{
								echo "";
							} ?>						
						</div>
					</div>			
					<div class="col-sm-8 mr-sm-auto">

					</div>
				</div>	
			</form>		
		</div>
	</div>			
</div>
