<?php
/**
* controlador da página inicial.
* quando o usuario digita .../home, ele estará acessando a homeController
*/
class homeController extends controller{

	public function __construct(){

		$usuario = new Usuarios();

		//$usuario->verificarLogin();

	}
	
	public function  index(){

		$dados = array(
			'usuario_nome' => ''
		);

		$filtros = new Filters();
		$usuario = new Usuarios();

		$filters = array();

		//todos os filtros estão nesta variavel filter
		if(!empty($_GET['filter']) && is_array($_GET['filter'])){
			$filters = $_GET['filter'];
		}

		if (isset($_SESSION['login'])) {
			$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);	
		}
			
		$dados['filters'] = $filtros->getFilters($filters);
		
		$this->loadTemplate('home', $dados);

	}
}
