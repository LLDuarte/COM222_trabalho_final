<?php
class cadastro_vinhoController extends controller{
	
	public function index(){
		$dados = array();
		//renderiza a pagina de cadastro de usuários
		$usuario = new Usuarios();
		$dados['usuario_nome'] = $usuario->getNome($_SESSION['login']);
		$this->loadView('cadastro_vinho', $dados);				
	}

	public function insereVinho(){

		$dados = array('erro' => '');		

		if(isset($_POST['nome']) && isset($_POST['tipoVinho']) && isset($_POST['tipoUva']) && isset($_POST['acompanhamento']) && isset($_POST['vinicola']) && isset($_POST['regiao']) && isset($_POST['pais']) && isset($_POST['estilo']) && isset($_POST['preco']) && !empty($_POST['nome']) && !empty($_POST['tipoVinho']) && !empty($_POST['tipoUva']) && !empty($_POST['acompanhamento']) && !empty($_POST['vinicola']) && !empty($_POST['regiao']) && !empty($_POST['pais']) && !empty($_POST['estilo']) && !empty($_POST['preco'])) {

				$nome = addslashes($_POST['nome']);
				$tipoVinho = addslashes($_POST['tipoVinho']);
				$tipoUva = addslashes($_POST['tipoUva']); //proteção
				$acompanhamento = addslashes($_POST['acompanhamento']); //proteção
				$vinicola = addslashes($_POST['vinicola']);
				$regiao = addslashes($_POST['regiao']);
				$pais = addslashes($_POST['pais']);
				$estilo = addslashes($_POST['estilo']);
				$preco = addslashes($_POST['preco']);
				$foto = array();


				if(isset($_FILES['fotoRotulo']) && !empty($_FILES['fotoRotulo']['tmp_name'])){
					$foto = $_FILES['fotoRotulo'];
				}				


				$usuario = new Usuarios();
				$email = $usuario->getEmail($_SESSION['login']);

				$usuario = new Wines();
				$dados['erro'] = $usuario->insereWines($nome, $tipoVinho, $tipoUva, $acompanhamento, $vinicola, 
					$regiao, $pais, $estilo, $preco, $foto, $email);
				

			}

			//$this->loadView('falha_cadastra_user', $dados);
		}

	}