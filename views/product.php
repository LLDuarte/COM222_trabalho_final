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
					<div class="col-sm-7 mr-sm-auto direita_vinho">						
						
						<div class="col-sm-9 informacoes_vinho">
							<div class="row justify-content-center">
								<h2><?php echo $product_info['nome']; ?></h2>								
							</div>
							<div class="row justify-content-center">
								<small><?php echo $product_info['regiao'].' - '.$product_info['pais']; ?></small>
							</div>
							<div class="row justify-content-center">
								<small>Average Rating ...</small>
							</div>
							<div class="row justify-content-center">
								<h2><?php 
								if(isset($aval['avaliacao'])){
									echo $aval['avaliacao'];
								}else{
									echo '0';
								}

								 ?></h2>
							</div>
							<div class="row justify-content-center">
								<span>R$ <?php echo number_format($product_info['preco'],2); ?></span>
							</div>
						</div>
					</div>
				</div>	
				<form method="GET">
					<div class="row">
						<div class="col-sm-3 ml-sm-auto avaliacao">
							<div class="row justify-content-center">							
								<h4>Avalie este vinho: </h4>
							</div>
							<div class="row justify-content-center">
								<div class="filtercontent">
									<input type="hidden" id="slider3" name="filter[slider3]" value="<?php echo $viewData['filters']['slider3']?>">
									<input type="text" id="estrela" readonly style="border:0; color:darkgray; font-weight:bold;">	<div id="slider-range-max" style="background-color: #430C0C; "></div>
								</div>
							</div>
						</div>
						<div class="col-sm-7 mr-sm-auto reviews">
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
							</div>
							
							<?php foreach ($list_avaliacao_comments as $item):?>

								<div class="row">							
									<div class="col-sm-6 ml-sm-auto">
										<?php 


										echo date('d/m/Y',strtotime($item['data']))." - ".$item['user_name'].' (Avaliação: '.$item['avaliacao'].")";

										

										?>

									</div>	
									<div class="col-sm-6 mr-sm-auto">
										<?php echo $item['review']; ?>
									</div>				
								</div>
							<?php endforeach; ?> 
							
						</div>					
					</div>
					<div class="row">
						<div class="col-sm-3 ml-sm-auto write_review">
							<div class="row justify-content-center">
								<h4>Comente sobre ele:</h4>
							</div>
							<div class="row justify-content-center">
								<div class="form-group">
									<textarea class="form-control text_review" rows="8" name="comment">								
									</textarea>
								</div>
							</div>
							<div class="row justify-content-center">
								<input type="submit" class="btn btn-secondary" value="Confirmar">
							</div>

							
						</div>
						<div class="col-sm-7 mr-sm-auto">
							
						</div>
					</div>	
				</form>		
			</div>
		</div>			
	</div>
