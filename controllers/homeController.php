<?php
/**
* controlador da página inicial.
* quando o usuario digita .../home, ele estará acessando a homeController
*/
class homeController extends controller{
	
	public function  index(){

		$anuncios = new Anuncios();
		$usuario = new Usuarios();

		//dados que eu desejo enviar para a view
		$dados = array(
			'quantidade' => $anuncios->getQtd(),
			'nome' => $usuario->getNome()
		);

		$this->loadTemplate('home', $dados);

	}
	
}