<?php 


class controller{

	//Carrega uma view
	public function loadView($viewName, $viewData = array()){

		//transforma as chaves do array em uma variavel, permitindo acesso aos valores.
		extract($viewData);
		require 'views/'.$viewName.'.php';

	}

	//carrega uma view que sera a estrutura geral do site, ou seja, o esqueleto
	public function loadTemplate($viewName, $viewData = array()){
		
		//as variaveis $viewName e $viewData estarão acessiveis dentro do template.php 
		require 'views/template.php';
	}

	//carrega a view dentro do template
	public function loadViewInTemplate($viewName, $viewData = array()){

		//transforma as chaves do array em uma variavel, permitindo acesso aos valores.
		/*

		$dados = array(
			'nome' => 'Victor'
		);
		
		nome passa a ser uma variavel, $nome

		*/
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}
}