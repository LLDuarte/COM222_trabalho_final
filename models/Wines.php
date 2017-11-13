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

	public function getMaxPreco($filters = array()){
		$array = array();

		$sql = "SELECT 
		preco 
		FROM 
		vinho
		ORDER BY preco DESC 
		LIMIT 1";
		$sql = $this->db->prepare($sql);

		$sql->execute();
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch();

			return $array['preco'] + 1.0;

		}else{
			return '0';
		}
		
	}
	
	//Lista de todos os vinhos cadastrados
	public function getList($inicio = 0, $limit = 3, $filters = array()){

		$array = array();

		//classe que constroi os where's
		$where = $this->constroiComandoWhere($filters);

		$consulta = "SELECT * 
					FROM 
						vinho
					WHERE ".implode(' AND ', $where)."
					LIMIT 
						$inicio, $limit";

		//echo $consulta; exit;
		$sql = $this->db->prepare($consulta);

		$this->constroiBindValue($filters, $sql);

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

	//Retorna o total de vinhos cadastrados
	public function getTotal($filters = array()){

		//classe que constroi os where's
		$where = $this->constroiComandoWhere($filters);

		$sql = "SELECT 
		count(*) as c 
		from 
		vinho
		WHERE ".implode(' AND ', $where)."" ;

		$sql = $this->db->prepare($sql);
		
		//classe que constroi os binds
		$this->constroiBindValue($filters, $sql);

		$sql->execute();
		$resultado = $sql->fetch();

		return $resultado['c'];		
	}

	//retorna uma lista de todos os tipos de vinhos cadastrados
	public function getListTipoVinho(){
		
		$array = array();

		$sql = "SELECT DISTINCT 
		tipo_vinho 
		FROM 
		vinho";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	//retorna uma lista de todos os tipos de uvas cadastradas
	public function getListTipoUva(){
		$array = array();

		$sql = "SELECT DISTINCT tipo_uva FROM vinho";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	//retorna uma lista de todos os paises cadastrados
	public function getListPais(){
		$array = array();

		$sql = "SELECT DISTINCT pais FROM vinho";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	//retorna uma lista de todos os estilos de vinhos cadastrados
	public function getListEstilo(){
		$array = array();

		$sql = "SELECT DISTINCT estilo FROM vinho";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	//retorna uma lista de todos as harmonizacoes com comidas cadastradas
	public function getListComida(){
		$array = array();

		$sql = "SELECT DISTINCT comidas FROM vinho";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}	

	private function constroiComandoWhere($filters = array()){
		$where = array(
			'1=1'
		);


		//$filters['tipo_vinho'] vem do name da view wines.php
		//a saida sera por exemplo tipo_vinho IN ('Branco', 'Tinto')
		if (!empty($filters['tipo_vinho'])) {
			$where[] = "tipo_vinho IN ('".implode("','", $filters['tipo_vinho'])."')";
		}

		//$filters['slider0'] vem do name da view wines.php
		if (!empty($filters['slider0'])) {
			$where[] = "preco >= :slider0";
		}

		//$filters['slider1'] vem do name da view wines.php
		if (!empty($filters['slider1'])) {
			$where[] = "preco <= :slider1";
		}

		//$filters['slider3'] vem do name da view wines.php
		if (!empty($filters['slider3'])) {
			$where[] = "avaliacao >= :slider3";
		}

		//$filters['tipo_uva'] vem do name da view wines.php
		//a saida sera por exemplo tipo_uva IN ('Merlot')
		if (!empty($filters['tipo_uva'])) {
			$where[] = "tipo_uva IN ('".implode("','", $filters['tipo_uva'])."')";
		}

		//$filters['pais'] vem do name da view wines.php
		//a saida sera por exemplo pais IN ('Brasil')
		if (!empty($filters['pais'])) {
			$where[] = "pais IN ('".implode("','", $filters['pais'])."')";
		}

		//$filters['estilo'] vem do name da view wines.php
		//a saida sera por exemplo estilo IN ('Leve')
		if (!empty($filters['estilo'])) {
			$where[] = "estilo IN ('".implode("','", $filters['estilo'])."')";
		}

		//$filters['comidas'] vem do name da view wines.php
		//a saida sera por exemplo comidas IN ('Leve')
		if (!empty($filters['comidas'])) {
			$where[] = "comidas IN ('".implode("','", $filters['comidas'])."')";
		}

		return $where;
	}

	//&$sql significa que tudo que acontecer dentro da classe, irá acontecer do lado de fora tbm
	private function constroiBindValue($filters = array(), &$sql){ 
		if(!empty($filters['slider0'])){
			$sql->bindValue(':slider0', $filters['slider0']);
		}

		if(!empty($filters['slider1'])){
			$sql->bindValue(':slider1', $filters['slider1']);
		}

		if(!empty($filters['slider3'])){
			$sql->bindValue(':slider3', $filters['slider3']);
		}
	}

	//Retorna a lista de vinhos cadastrados de acordo com o usuário
	public function getListOfWines($inicio = 0, $limit = 3, $email){

		$array = array();


		$consulta = "SELECT * FROM vinho WHERE email_usuario = :email LIMIT $inicio, $limit";

		//echo $consulta; exit;
		$sql = $this->db->prepare($consulta);

		$sql->bindValue(":email", $email);

		$sql->execute();

		if($sql->rowCount() > 0) {
			
			$array = $sql->fetchAll();

			foreach($array as $key => $item) {

				$array[$key]['images'] = $this->getImagesByWines($item['tipo_vinho'], $item['nome']);

			}

		}

		return $array;
	}

	//Retorna o total de vinhos cadastrados de acordo com o usuario
	public function getTotalOfWines($email){
				
		$sql = "SELECT count(*) as c from vinho WHERE email_usuario = :email" ;

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $email);
		
		$sql->execute();
		$resultado = $sql->fetch();

		return $resultado['c'];		
	}
}