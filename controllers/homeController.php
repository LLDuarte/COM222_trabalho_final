<?php
/**
* controlador da página inicial.
* quando o usuario digita .../home, ele estará acessando a homeController
*/
class homeController extends controller{

	public function __construct(){
	
		$usuario = new Usuarios();
<<<<<<< HEAD
		//$usuario->verificarLogin();
=======
		$usuario->verificarLogin();
>>>>>>> d5d582aa946ba91aba3bf37e7875815aedcd261d
	}
	
	public function  index(){

		$dados = array();

		$this->loadTemplate('home', $dados);

	}
	
<<<<<<< HEAD
}
=======
}
>>>>>>> d5d582aa946ba91aba3bf37e7875815aedcd261d
