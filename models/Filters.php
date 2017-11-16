<?php 

/**
* 
*/
class Filters extends model{

	public function getFilters($filters){
		$array = array(
			'maxslider' => 1300,
			'slider0' => 25,
			'slider1' => 200,
			'slider3' => 0,
			'tipo_vinho' => array(),
			'avaliacao' => 1,
			'pais' => array(),
			'tipo_uva' => array(),
			'estilo' => array(),
			'comidas' => array()
		);

		$wines = new Wines();

		$array['tipo_vinho'] = $wines->getListTipoVinho();
		$array['tipo_uva'] = $wines->getListTipoUva();
		$array['pais'] = $wines->getListPais();
		$array['estilo'] = $wines->getListEstilo();
		$array['comidas'] = $wines->getListComida();
	
		
		if(isset($filters['slider0'])){
			$array['slider0'] = $filters['slider0'];
		}

		if(isset($filters['slider1'])){
			$array['slider1'] = $filters['slider1'];
		}
		if(isset($filters['slider3'])){
			$array['slider3'] = $filters['slider3'];
		}

		/*if(isset($filters['select'])){
			print_r($filters['select']); exit;
			$array['tipo_vinho'] = $filters['select'];
		}*/
		//filtro de preco
		$array['maxslider'] = $wines->getMaxPreco($filters);
		
		
		return $array;
	}

}