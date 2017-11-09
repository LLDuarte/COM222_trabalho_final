<?php 

/**
* 
*/
class Filters extends model{

	public function getFilters($filters){
		$array = array(
			'maxslider' => 1300,
			'tipo_vinho' => array(),
			'avaliacao' => 1,
			'pais' => array(),
			'tipo_uva' => array(),
			'estilo' => array(),
			'comidas' => array()
		);

		$wines = new Wines();

		$array['tipo_vinho'] = $wines->getListTipoVinho($filters);
		$array['tipo_uva'] = $wines->getListTipoUva();
		$array['pais'] = $wines->getListPais();
		$array['estilo'] = $wines->getListEstilo();
		$array['comidas'] = $wines->getListComida();
	
		//filtro de preco
		$array['maxslider'] = $wines->getMaxPreco();


		return $array;
	}

}