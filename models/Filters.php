<?php 

/**
* 
*/
class Filters extends model{

	public function getFilters(){
		$array = array(
			'maxslider' => 1300,
			'avaliacao' => 1,
			'pais' => array(),
			'tipo_uva' => array(),
			'estilo_vinho' => array(),
			'comida' => array()
		);

		$wines = new Wines();

		$array['tipo_vinho'] = $wines->getListTipoVinho();


		return $array;
	}

}