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

		$usuario = new Usuarios();
		$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);

		$this->loadTemplate('home', $dados);

	}
}
