<?php 
class my_winesController extends controller{
	
	public function index(){

		$wines = new Wines();
		$usuario = new Usuarios();

		$dados = array(
			'usuario_nome' => '',
			'foto' => ''
		);

		//padrões da paginação
		$paginaAtual = 1;
		$inicio = 0;
		$limit = 3;

		if(!empty($_GET['p'])){
			$paginaAtual = $_GET['p'];
		}

		$inicio = ($paginaAtual * $limit) - $limit;

		$email_user = $usuario->getEmail($_SESSION['login']);
		$dados['list'] = $wines->getListOfWines($inicio, $limit, $email_user);
		$dados['totalItens'] = $wines->getTotalOfWines($email_user);
		$dados['numeroPaginas'] = ceil($dados['totalItens']/$limit); //ceil arrendonda para cima
		$dados['paginaAtual'] = $paginaAtual;

		$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);
		$dados['foto'] = $usuario->getFoto($_SESSION['login']);
		$this->loadTemplate('my_wines', $dados);
	}
	
}

