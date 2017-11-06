<?php

class Wines extends model{
	
	public function getList($inicio = 0, $limit = 3){

		$array = array();

		$sql = $this->db->prepare("SELECT nome, preco, regiao, rotulo, tipo_vinho FROM vinho LIMIT 
			$inicio, $limit");
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

	public function getTotal(){

		$sql = "SELECT count(*) as c from vinho";

		$sql = $this->db->query($sql);
		
		$resultado = $sql->fetch();

		return $resultado['c'];		
	}
}