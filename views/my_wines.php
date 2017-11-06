<script type="text/javascript">
	$(function () {
		var navigations = $('#menu'),
		pos = navigations.offset();
		$(window).scroll(function () {
			if ($(this).scrollTop() > pos.top + navigations.height() && navigations.hasClass('normal')) {
				navigations.fadeOut('fast', function () {
					$(this).removeClass('normal').addClass('estavel').fadeIn('fast')
				})
			} else if ($(this).scrollTop() <= pos.top + navigations.height() && navigations.hasClass('estavel')) {
				navigations.fadeOut('fast', function () {
					$(this).removeClass('estavel').addClass('normal').fadeIn('fast')
				})
			}
		})
	});
</script>

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
					</div>
					<div class="col-sm-7 mr-sm-auto direita_vinhos">						
						<div id="menu" class="normal botao">
							<ul class="nav nav-tabs">								
								<li class="nav-item">
									<a class="nav-link" href="#">CADASTRAR VINHO</a>
								</li>
								
							</ul>
						</div>
						
					</div>
				</div>
			</div>				
		</div>
	</div>			
</div>
