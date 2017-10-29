<?php 
	/**
	* Não faz parte da estrutura MVC, mas ela dá o start na aplicação
	*/
	class Core{
		
		public function run(){
			
			//caso nao envie nada (www.site.com/), fica so com a barra
			$url = '/';

			//caso envie
			if(isset($_GET['url'])){
				$url .= $_GET['url'];
			}

			//parametros
			$params = array();

			//Caso tenha algo na url
			if(!empty($url) && $url != '/'){

				//.../galeria/abrir/123
				//retiro as barras
				$url = explode('/', $url); //após isso a posição 0 do array fica vazia pois continha uma barra
				array_shift($url); //remove o primeiro registro do array pois é vazio, 

				$currentController = $url[0].'Controller'; //chama o nome do arquivo especifico
				//Após pego o nome do controller, podemos remove-lo
				array_shift($url);

				//então na posição zero passa a ter o metodo
				//Caso exista uma action(método)
				if(isset($url[0]) && !empty($url[0])){
					$currentAction = $url[0];
					//Após pego o metodo do controller, podemos remove-lo
					array_shift($url);
				}else{
					$currentAction = 'index';
				}

				//se ainda tiver itens na url
				if(count($url) > 0){
					$params = $url;
				}

			}else{ //caso nao tenha nada
				$currentController = 'homeController';
				$currentAction = 'index';
			}

			//o controler que eu vou instanciar está na variavel currentController
			$c = new $currentController();

			//o metodo que eu vou utilizar está na variavel currentAction
			call_user_func_array(array($c, $currentAction), $params);

		}	
	}
	?>