<?php

	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoLoad.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	//INCLUDE_PATH é o caminho do site, para que fique dinamico na hora de hospedar.	
	define('INCLUDE_PATH','http://localhost/portfolio/CMS-Portfolio-Design/projeto/');

	// Caminho padrão painel
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	define('BASE_DIR_PAINEL',__DIR__.'/painel');


	//Conectar com banco de dados
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','portfolio');

	//Constantes para o painel de controle
	define('NOME_EMPRESA','Danki Code');

	// FUNÇÕES

	// Atribui cargos
	function pegaCargo($cargo){
		$arr = [
			'0' => 'Normal',
			'1' => 'Sub Administrador',
			'2' => 'Administrador'
		];

		return $arr[$cargo];
	}
?>