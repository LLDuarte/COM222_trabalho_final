<?php

class cadastroVinhoController extends controller{
	
	public function index(){
		$dados = array();
		//renderiza a pagina de cadastro de usuários
		$this->loadView('cadastro_vinho', $dados);				
	}

	
}