<?php
class edicao_vinhoController extends controller {
	
	public function editaVinho($id) {

		$dados = array();	

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


				$wines = new Wines();
				
				$id_user = $_SESSION['login'];

				$id_tipoVinho = $wines->getIDTipoVinho_Edita($id);
				
				//print_r($id_vinho); exit;
				$dados['erro'] = $wines->updateWines($nome, $tipoVinho, $tipoUva, $acompanhamento, $vinicola, 
					$regiao, $pais, $estilo, $preco, $id_user, $id_tipoVinho, $id);
				$dados['tipoUva'] = $tipoUva;
				$dados['acompanhamento'] = $acompanhamento;
				$dados['regiao'] = $regiao;
				$dados['pais'] = $pais;
				$dados['estilo'] = $estilo;
				$dados['preco'] = $preco;
				$dados['vinicola'] = $vinicola;
				$dados['consulta'] = $wines->getNomeWine();			

			}
			if (!empty($dados['erro'])) {
				header("Location: ".BASE_URL."product/edit/".$id."/?erro=".$dados['erro']);
			}
		}
	}