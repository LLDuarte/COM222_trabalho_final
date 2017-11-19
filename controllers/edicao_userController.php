<?php
class edicao_userController extends controller {
	public function index() {
		$dados = array();
		//renderiza a pagina de cadastro de usuários
		$usuario = new Usuarios();
		$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);
		$dados['foto'] = $usuario->getFoto($_SESSION['login']);
		$dados['list'] = $usuario->getDados($_SESSION['login']);		

		$this->loadView('edicao_user', $dados);		
	}
	public function editaCadastro() {

		$dados = array();	

		if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['email']) && !empty($_POST['senha'])){
				
				$nome = addslashes($_POST['nome']);
				$sobrenome = addslashes($_POST['sobrenome']);
				$email = addslashes($_POST['email']); //proteção
				$senha = addslashes($_POST['senha']);
				

				$usuario = new Usuarios();
				$usuario->edita_usuario($_SESSION['login'], $nome, $sobrenome);
			}
			header("Location: ".BASE_URL);
		}
	}