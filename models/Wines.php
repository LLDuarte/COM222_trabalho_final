<?php

class Wines extends model{
	
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
}