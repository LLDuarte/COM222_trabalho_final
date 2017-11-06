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
		$limit = 5;

		if(!empty($_GET['p'])){
			$paginaAtual = $_GET['p'];
		}

		$inicio = ($paginaAtual * $limit) - $limit;

		$dados['list'] = $wines->getList($inicio,$limit);
		$dados['totalItens'] = $wines->getTotal();
		$dados['numeroPaginas'] = ceil($dados['totalItens']/$limit); //ceil arrendonda para cima
		$dados['paginaAtual'] = $paginaAtual;

		$this->loadTemplate('wines', $dados);
	}
}