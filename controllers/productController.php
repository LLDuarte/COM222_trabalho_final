<?php 
	/**
	* 
	*/
	class productController extends controller{

		public function index(){
			header("Location: ".BASE_URL);
		}

		public function open($id){
			
			$dados = array();

			$wines = new Wines();
			$usuario = new Usuarios();
			$filtros = new Filters();

			$filters = array();

			//todos os filtros estão nesta variavel filter

			if(!empty($_GET['filter']) && is_array($_GET['filter']) && !empty($_GET['comment'])){
				$filters = $_GET['filter'];
				$comment = $_GET['comment'];
				//echo $tipo_vinho; exit;

				$id_user = $_SESSION['login'];
				$dados['erro'] = $wines->insereComentarioAvaliacao($comment, $id, $id_user, $filters);
				
			}
			

			$dados['list_avaliacao_comments'] = $wines->getAvaliacao_Comments($id);
			//print_r($dados['list_avaliacao_comments']); exit;
			$dados['filters'] = $filtros->getFilters($filters);	 	

			$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);

			$info = $wines->getInfoWine($id);

			if(count($info) > 0){

				$dados['product_info'] = $info;
				
				$id_userAval = array();
				$id_userAval = $wines->getAval_user($id);
				//print_r($id_userAval); exit;

				$dados['product_user_aval'] = $usuario->getNomeUser($id_userAval);
				//print_r($dados['product_user_aval']); exit;
				//var_dump($dados['product_user_aval']); exit;
				$dados['aval'] = $wines->getAvaliacao($id);
				$dados['product_image'] = $wines->getFotoPorVinho($id);

				$this->loadTemplate('product', $dados);
			}else{
				header("Location: ".BASE_URL);
			}

		}

	}
	?>