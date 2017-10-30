<?php
/**
* controlador da página inicial.
* quando o usuario digita .../home, ele estará acessando a homeController
*/
class loginController extends controller{

	public function __construct(){

	}
	
	public function  index(){

		$dados = array();

		$this->loadView('login', $dados);

	}

	public function entrar(){

		echo md5($_POST['senha']);
		echo " ";
		echo $_POST['email'];

		$dados = array('erro' => '');		

		if(isset($_POST['senha']) && isset($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['email'])){
				$email = addslashes($_POST['email']);
				$senha = md5($_POST['senha']); //proteção

				$usuario = new Usuarios();
				$dados['erro'] = $usuario->logar($email, $senha);
			}

			$this->loadView('falha_login_user', $dados);

		}

	}