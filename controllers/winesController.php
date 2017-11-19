<?php 
/**
* 
*/
class winesController extends controller{
	
	public function index(){
		$dados = array();

		$wines = new Wines();
		$usuario = new Usuarios();
		$filtros = new Filters();

		//padrões da paginação
		$paginaAtual = 1;
		$inicio = 0;
		$limit = 16;

		if(!empty($_GET['p'])){
			$paginaAtual = $_GET['p'];
		}

		/********/

		$filters = array();

		//todos os filtros estão nesta variavel filter
		if(!empty($_GET['filter']) && is_array($_GET['filter'])){
			$filters = $_GET['filter'];
		}

		
		$inicio = ($paginaAtual * $limit) - $limit;

		$dados['list'] = $wines->getList($inicio,$limit, $filters);
		$dados['totalItens'] = $wines->getTotal($filters);
		$dados['numeroPaginas'] = ceil($dados['totalItens']/$limit); //ceil arrendonda para cima
		$dados['paginaAtual'] = $paginaAtual;

		$dados['filters'] = $filtros->getFilters($filters);		

		$dados['filters_selected'] = $filters;
		//print_r($dados['filters_selected']); exit;
		if(isset($_SESSION['login'])){
			$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);
			$dados['foto'] = $usuario->getFoto($_SESSION['login']);
		}
		$this->loadTemplate('wines', $dados);
	}

	public function dataAjax(){
		$wines = new Wines();

		
		if(isset($_GET['key'])){

			$data = $_GET['key'];
			$consulta = $wines->getNome_Vinho($data);
			//echo $consulta;
			return $consulta;
		}
	}
}