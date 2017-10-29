<?php 

/*
	classe que auxilia na conexão ao BD
*/
class model{

	protected $db;

	public function __construct(){
		
		//pega a variavel global provinda do arquivo config.php
		global $db;

		$this->db = $db;
	}
}