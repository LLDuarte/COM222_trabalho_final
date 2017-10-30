<?php
/**
* controlador da página inicial.
* quando o usuario digita .../home, ele estará acessando a homeController
*/
class homeController extends controller{

	public function __construct(){
	
		$usuario = new Usuarios();
		$usuario->verificarLogin();
	}
	
	public function  index(){

		$dados = array();

		$this->loadTemplate('home', $dados);

	}
	
}