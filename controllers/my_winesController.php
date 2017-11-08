<?php 
class my_winesController extends controller{
	
	public function index(){
		
		$dados = array(
			'usuario_nome' => '',
			'foto' => ''
		);

		$usuario = new Usuarios();
		$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);
		$dados['foto'] = $usuario->getFoto($_SESSION['login']);
		$this->loadTemplate('my_wines', $dados);
	}
	
}

