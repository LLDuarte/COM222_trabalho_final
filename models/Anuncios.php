<?php

/**
* 
*/
class Anuncios extends model {
	
	public function getQtd(){
		
		$sql = "SELECT count(*) as c from anuncios";

		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$resultado = $sql->fetch();
			return $resultado['c'];
		}else{
			return 0;
		}
	}
}