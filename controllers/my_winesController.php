<?php 
class my_winesController extends controller{
	
	public function index(){
		
		$dados = array();
		$this->loadTemplate('my_wines', $dados);
	}
	
}