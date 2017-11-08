<?php

class Wines extends model{

	public function insereWines($nome, $tipoVinho, $tipoUva, $acompanhamento, $vinicola, 
		$regiao, $pais, $estilo, $preco, $foto, $email){


		$md5_name = '';

		if(count($foto) > 0){
			$tipos = array('image/jpeg', 'image/jpg', 'image/png');
			
			if(in_array($foto['type'], $tipos)){
				
				$md5_name = md5(time().rand(0,999));
				
				switch ($foto['type']) {
					case 'image/jpeg':
						$md5_name .= '.jpeg';
						break;
					case 'image/jpg':
						$md5_name .= '.jpg';
						break;	
					case 'image/png':
						$md5_name .= '.png';
						break;					
				}

				move_uploaded_file($foto['tmp_name'], 'assets/images/rotulos/'.$md5_name);
			}
		}

		$foto = $md5_name;

		$sql = $this->db->prepare("SELECT * FROM vinho WHERE tipo_vinho = :tipoVinho AND nome = :nome");
		$sql->bindValue(":tipoVinho", $tipoVinho);
		$sql->bindValue(":nome", $nome);
		$sql->execute();

		//o tipo_vinho e o nome são unicos
		//caso não tenha tipo_vinho e o nome cadastrados, ou seja, o vinho ainda nao existe
		if($sql->rowCount() == 0) {
			
			$consulta = "INSERT INTO vinho SET 
							nome = :nome, 
							tipo_uva = :tipoUva, 
							pais = :pais, 
							vinicola = :vinicola, 
							preco = :preco, 
							tipo_vinho = :tipoVinho, 
							regiao = :regiao, 
							comidas = :acompanhamento, 
							rotulo = :foto, 
							estilo = :estilo,
							email_usuario = :email";
							
			
			$sql = $this->db->prepare($consulta);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":tipoUva", $tipoUva);
			$sql->bindValue(":pais", $pais);
			$sql->bindValue(":vinicola", $vinicola); 
			$sql->bindValue(":preco", $preco);
			$sql->bindValue(":tipoVinho", $tipoVinho);
			$sql->bindValue(":regiao", $regiao);
			$sql->bindValue(":acompanhamento", $acompanhamento);
			$sql->bindValue(":foto", $foto);
			$sql->bindValue(":estilo", $estilo);
			$sql->bindValue(":email", $email);//p	
			$sql->execute();


			header("Location: ".BASE_URL."my_wines");

		} else {
			return "Este vinho já está cadastrado.";
		}
	}
	
	public function getList($inicio = 0, $limit = 3, $filters = array()){

		$array = array();

		$where = array(
			'1=1'
		);


		$consulta = "SELECT 
		nome, preco, regiao, rotulo, tipo_vinho 
		FROM vinho
		WHERE ".implode(' AND ', $where)."	
		LIMIT 
		$inicio, $limit";

		$sql = $this->db->prepare($consulta);
		$sql->execute();

		if($sql->rowCount() > 0) {
			
			$array = $sql->fetchAll();

			foreach($array as $key => $item) {

				$array[$key]['images'] = $this->getImagesByWines($item['tipo_vinho'], $item['nome']);

			}

		}

		return $array;

	}

	public function getImagesByWines($tipo_vinho, $nome) {
		$array = array();

		$sql = "SELECT rotulo FROM vinho WHERE tipo_vinho = :tipo_vinho AND nome = :nome";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":tipo_vinho", $tipo_vinho);
		$sql->bindValue(":nome", $nome);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getTotal($filters = array()){

		$where = array(
			'1=1'
		);

		$sql = "SELECT 
		count(*) as c 
		from 
		vinho
		WHERE ".implode(' AND ', $where)."" ;

		$sql = $this->db->prepare($sql);
		
		$sql->execute();
		$resultado = $sql->fetch();

		return $resultado['c'];		
	}

	//retorna uma lista de todos os tipos de vinhos cadastrados
	public function getListTipoVinho(){
		$array = array();

		$sql = "SELECT DISTINCT tipo_vinho FROM vinho";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
}