<?php 
/**
* 
*/
class winesController extends controller{
	
	public function index(){
		$dados = array();

		$wines = new Wines();

		//padrões da paginação
		$paginaAtual = 1;
		$inicio = 0;
		$limit = 3;

		if(!empty($_GET['p'])){
			$paginaAtual = $_GET['p'];
		}

		$filters = array();
		$inicio = ($paginaAtual * $limit) - $limit;

		$dados['list'] = $wines->getList($inicio,$limit, $filters);
		$dados['totalItens'] = $wines->getTotal($filters);
		$dados['numeroPaginas'] = ceil($dados['totalItens']/$limit); //ceil arrendonda para cima
		$dados['paginaAtual'] = $paginaAtual;
		$dados['maxslider'] = 500;

		$usuario = new Usuarios();
		$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);

		$this->loadTemplate('wines', $dados);
	}
}