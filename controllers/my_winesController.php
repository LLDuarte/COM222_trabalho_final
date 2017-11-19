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
		$limit = 8;

		if(!empty($_GET['p'])){
			$paginaAtual = $_GET['p'];
		}		

		$inicio = ($paginaAtual * $limit) - $limit;

		$email_user = $usuario->getEmail($_SESSION['login']);
		$dados['list'] = $wines->getListOfWines($inicio, $limit, $_SESSION['login']);
		
		$dados['totalItens'] = $wines->getTotalOfWines($_SESSION['login']);
		$dados['numeroPaginas'] = ceil($dados['totalItens']/$limit); //ceil arrendonda para cima
		$dados['paginaAtual'] = $paginaAtual;

		$dados['qtdAval'] = $wines->getQtdAval($_SESSION['login']);
		//print_r($dados['qtdAval']); exit;
		$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);
		$dados['foto'] = $usuario->getFoto($_SESSION['login']);
		$this->loadTemplate('my_wines', $dados);
	}

	public function user(){
		$wines = new Wines();
		$usuario = new Usuarios();

		if(!empty($_GET['s'])){

			if($_GET['s'] == $_SESSION['login']){

				$this->index();

			}else{
				$id = $_GET['s'];
				$dados = array(
					'usuario_nome' => '',
					'foto' => ''
				);
				if (isset($_SESSION['login'])) {
					$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);
				}
				
				$dados['usuario'] = $usuario->getNome($id);
				$dados['foto'] = $usuario->getFoto($_SESSION['login']);
				$dados['foto_perfil'] = $usuario->getFoto($id);
				$dados['qtdAval'] = $wines->getQtdAval($id);
				$dados['list_avaliacao_comments_user'] = $wines->getAvaliacao_Comments_user($id);
				$this->loadTemplate('user', $dados);
			}	
		}

	}
	
}

