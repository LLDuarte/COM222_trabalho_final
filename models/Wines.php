<?php

class Wines extends model{

	public function insereWines($nome, $tipoVinho, $tipoUva, $acompanhamento, $vinicola, 
		$regiao, $pais, $estilo, $preco, $foto, $id_user, $id_tipoVinho, $id_vinho){

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

		$query = "SELECT 
		v.*, ti.nome				
		FROM 
		vinho AS v
		INNER JOIN tipovinho AS ti ON ti.id = v.id_tipoVinho
		WHERE ti.nome = :tipoVinho AND v.nome = :nome";

		$sql = $this->db->prepare($query);
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
			regiao = :regiao, 
			comidas = :acompanhamento, 			 
			estilo = :estilo,
			id_usuario = :id_usuario,
			id_tipoVinho = :id_tipoVinho";

			$consulta2 = "INSERT INTO tipovinho SET nome = :tipoVinho";
			$consulta3 = "INSERT INTO rotulo SET url = :foto, id_vinho = :id_vinho";

			
			$sql = $this->db->prepare($consulta);			
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":tipoUva", $tipoUva);
			$sql->bindValue(":pais", $pais);
			$sql->bindValue(":vinicola", $vinicola); 
			$sql->bindValue(":preco", $preco);
			$sql->bindValue(":regiao", $regiao);
			$sql->bindValue(":acompanhamento", $acompanhamento);
			$sql->bindValue(":estilo", $estilo);
			$sql->bindValue(":id_usuario", $id_user);
			$sql->bindValue(":id_tipoVinho", $id_tipoVinho);

			$sql2 = $this->db->prepare($consulta2);
			$sql2->bindValue(":tipoVinho", $tipoVinho);
			

			$sql3 = $this->db->prepare($consulta3);
			$sql3->bindValue(":foto", $foto);
			$sql3->bindValue(":id_vinho", $id_vinho);
			
			$sql->execute();
			$sql2->execute();
			$sql3->execute();

			header("Location: ".BASE_URL."my_wines");

		} else {
			return "Este vinho já está cadastrado.";
		}
	}

	public function getNomeWine(){
		$array = array();

		$sql = "SELECT nome from vinho";
		$sql = $this->db->query($sql);		

		if($sql->rowCount() > 0) {

			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getNome_Vinho($data){
		
		$array = array();

		$sql = "SELECT * from vinho WHERE nome LIKE '%$data%'";
		$sql = $this->db->query($sql);
		
		
		if($sql->rowCount() > 0) {

			$array = $sql->fetchAll();
				
		}		
		
		return json_encode($array);		
		
	}


	public function getIDTipoVinho(){
		$sql = "SELECT 
		id 
		FROM 
		tipovinho
		ORDER BY id DESC 
		LIMIT 1";
		$sql = $this->db->prepare($sql);

		$sql->execute();
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch();

			return $array['id'] + 1.0;

		}else{
			return '';
		}
	}

	public function getIDVinho(){
		$sql = "SELECT 
		id 
		FROM 
		vinho
		ORDER BY id DESC 
		LIMIT 1";
		$sql = $this->db->prepare($sql);

		$sql->execute();
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch();

			return $array['id'] + 1.0;

		}else{
			return '';
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

		$consulta = "SELECT 
		*, 
		(select round(avg(avaliacao.avaliacao),2) from avaliacao where avaliacao.id_vinho = vinho.id) as avaliacao,
		( select tipovinho.nome from tipovinho where tipovinho.id = vinho.id_tipoVinho) as tipo_vinho 
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

				$array[$key]['images'] = $this->getImagesByWines($item['id']);

			}

		}

		return $array;

	}

	public function getImagesByWines($id) {
		$array = array();

		$sql = "SELECT url FROM rotulo WHERE id_vinho = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();				
		}

		return $array;
	}

	public function getFotoPorVinho($id){
		$sql = $this->db->prepare("SELECT url FROM rotulo WHERE id_vinho = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		
		if($sql->rowCount() > 0) {
			
			$resultado = $sql->fetch();

			return $resultado['url'];
		}else{
			return '';
		}
	}
	public function getId_Users($id, $id_user){
		$array = array();

		$array = $this->getIDUser($id, $id_user);
		
		return $array;
	}

	public function getIDUser($id, $id_user){
		$array = array();

		$sql = "SELECT
		*,
		(select usuario.id from usuario where usuario.id = avaliacao.id_usuario) as user_id
		FROM avaliacao
		WHERE id_vinho = :id AND id_usuario = :id_user
		ORDER BY data DESC";
		

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_user", $id_user);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getAvaliacao_Comments($id){

		$array = array();

		$array = $this->getRates($id);
		
		return $array;

	}
	public function getRates($id){
		$array = array();

		$sql = "SELECT
		*,
		(select concat(usuario.nome,' ',usuario.sobrenome) from usuario where usuario.id = avaliacao.id_usuario) as user_name,
		(select usuario.id from usuario where usuario.id = avaliacao.id_usuario) as user_id
		FROM avaliacao
		WHERE id_vinho = :id
		ORDER BY data DESC";
		

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}


		return $array;
	}

	public function getAvaliacao_Comments_user($id){
		$array = array();

		$array = $this->getAval_Usuario($id);
		
		return $array;
	}

	public function getAval_Usuario($id){
		$array = array();

		$sql = "SELECT
		*,
		(select concat(usuario.nome,' ',usuario.sobrenome) from usuario where usuario.id = avaliacao.id_usuario) as user_name,
		(select usuario.id from usuario where usuario.id = avaliacao.id_usuario) as user_id
		FROM avaliacao
		WHERE id_usuario = :id 
		ORDER BY data DESC";
		

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}


		return $array;
	}

	public function getQtdAval($id){
		$array = array();

		$sql = "SELECT
		count(avaliacao) as qtd 
		FROM avaliacao
		WHERE id_usuario = :id
		ORDER BY data DESC";
		

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}


		return $array;
	}

	public function insereComentarioAvaliacao($comment = '', $id, $id_user, $filters = array()){

		$data = date("Y-m-d H:i:s");
		//echo $data; exit;
		$sql = $this->db->prepare("SELECT * FROM avaliacao WHERE id_usuario = :id_user AND id_vinho = :id");
		$sql->bindValue(":id_user", $id_user);
		$sql->bindValue(":id", $id);
		$sql->execute();

		//o email é unico
		//caso não tenha email cadastrado, ou seja, o usuario ainda nao existe
		if($sql->rowCount() == 0) {

			$consulta = "INSERT INTO avaliacao SET review = :comment, id_vinho = :id, id_usuario = :id_user, avaliacao = :slider3, data = :data";
			$sql = $this->db->prepare($consulta);
			$sql->bindValue(":comment", $comment);
			$sql->bindValue(":id", $id);
			$sql->bindValue(":id_user", $id_user);
			$sql->bindValue(":slider3", $filters['slider3']);
			$sql->bindValue(":data", $data);
			$sql->execute();

			header("Location: ".BASE_URL."product/open/$id");		
		}else{			
			return "Comentário sobre este vinho já cadastrado";
		}

	}	

	public function getInfoWine($id){
		$array = array();
		$array2 = array();

		if(!empty($id)) {

			$sql = "SELECT
			*,
			( select tipovinho.nome from tipovinho where tipovinho.id = vinho.id_tipoVinho ) as tipo_vinho			
			FROM vinho WHERE id = :id";			

			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id", $id);

			$sql->execute();			

			if($sql->rowCount() > 0) {

				$array = $sql->fetch();

			}
		}

		return $array;
	}

	public function getAval_user($id){
		$array = array();

		$sql = "SELECT id_usuario from avaliacao where id_vinho = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);

		$sql->execute();			

		if($sql->rowCount() > 0) {

			$array = $sql->fetchAll();			
			return $array;
		}
	}


	public function getAvaliacao($id){

		$array = array();

		$sql = "SELECT avg(avaliacao) as avaliacao, count(avaliacao) as qtd from avaliacao where id_vinho = :id";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);

		$sql->execute();			

		if($sql->rowCount() > 0) {

			$array = $sql->fetch();

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
		nome
		FROM 
		tipovinho";
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
			$where[] = "(select tipovinho.nome from tipovinho where tipovinho.id = vinho.id_tipoVinho) IN ('".implode("','", $filters['tipo_vinho'])."')";
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
			$where[] = "(select round(avg(avaliacao.avaliacao),2) from avaliacao where avaliacao.id_vinho = vinho.id) >= :slider3";
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
	public function getListOfWines($inicio = 0, $limit = 3, $id){

		$array = array();


		$consulta = "SELECT * FROM vinho WHERE id_usuario = :id LIMIT $inicio, $limit";

		//echo $consulta; exit;
		$sql = $this->db->prepare($consulta);

		$sql->bindValue(":id", $id);

		$sql->execute();

		if($sql->rowCount() > 0) {
			
			$array = $sql->fetchAll();

			foreach($array as $key => $item) {

				$array[$key]['images'] = $this->getImagesByWines($item['id']);

			}

		}

		return $array;
	}

	//Retorna o total de vinhos cadastrados de acordo com o usuario
	public function getTotalOfWines($id){

		$sql = "SELECT count(*) as c from vinho WHERE id_usuario = :id" ;

		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $id);
		
		$sql->execute();
		$resultado = $sql->fetch();

		return $resultado['c'];		
	}
}