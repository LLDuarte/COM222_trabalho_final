<?php

class cadastro_userController extends controller{
	
	public function  index(){

		$anuncios = new Anuncios();
		$usuario = new Usuarios();

		//dados que eu desejo enviar para a view
		$dados = array(
			'quantidade' => $anuncios->getQtd(),
			'nome' => $usuario->getNome()
		);

		$this->loadTemplate('cadastro_user', $dados);

	}
	
}