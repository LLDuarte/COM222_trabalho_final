<?php

class cadastro_userController extends controller{
	
	public function index(){
		$dados = array();
		//renderiza a pagina de cadastro de usuários
		$this->loadView('cadastro_user', $dados);				
	}

	public function cadastra_user(){
		$dados = array('erro' => '');		

		if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['email']) && !empty($_POST['senha'])){
				$nome = addslashes($_POST['nome']);
				$sobrenome = addslashes($_POST['sobrenome']);
				$email = addslashes($_POST['email']); //proteção
				$senha = addslashes($_POST['senha']);
				$foto = addslashes($_POST['foto']);

				$usuario = new Usuarios();
				$dados['erro'] = $usuario->cadastra_usuario($nome, $sobrenome, $email, $senha, $foto);
		}

		$this->loadView('falha_cadastra_user', $dados);
	}

}