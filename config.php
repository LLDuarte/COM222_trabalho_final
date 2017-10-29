<?php

	//requista o arquivo para identificar se o site ainda está hospedado localmente ou já está no ar.
require 'environment.php';

	//array de configurações do banco
$config = array();

	//conexão local
if(ENVIRONMENT == "development"){
	define("BASE_URL", "http://localhost/COM222_trabalho_final/");
	$config['dbname'] = 'vovoni';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}else{
	//caso tenha um servidor
	define("BASE_URL", "http:www.meusite.com.br/");
	$config['dbname'] = 'vovoni';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

//vai ser usada em muitos arquivos, então é declarada como global
global $db;

try{
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'],
		$config['dbpass']);
}catch (PDOException $e){
	echo "Erro: ".$e->getMessage();
	exit;
}
?>