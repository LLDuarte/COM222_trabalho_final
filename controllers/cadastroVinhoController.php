<?php
class cadastroVinhoController extends controller{
	
	public function index(){
		$dados = array();
		//renderiza a pagina de cadastro de usuários
		$usuario = new Usuarios();
		$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);
		$this->loadView('cadastro_vinho', $dados);				
	}
	
}