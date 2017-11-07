<?php
	//inicia uma sessão
	session_start();

	require 'config.php';

	//carrega as páginas
	//Sempre que uma nova classe for instanciada, devemos procurá-las nas pastas:
	//-controllers, models e core
	spl_autoload_register(function($class){

		//Se o arquivo for da pasta controllers
		if(file_exists('controllers/'.$class.'.php')){
			require 'controllers/'.$class.'.php';
		}
		else if(file_exists('models/'.$class.'.php')){ //caso seja do models
			require 'models/'.$class.'.php';
		}
		else if(file_exists('core/'.$class.'.php')){ //caso seja do core
			require 'core/'.$class.'.php'; 
		}

	});

	//quando realizar essa ação, ele faz o spl_autoload_register
	$core = new Core();
	$core->run();
?>