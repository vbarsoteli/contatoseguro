<?php

	//
	if ($_SERVER['HTTP_HOST'] == '127.0.0.1' or $_SERVER['HTTP_HOST'] == 'localhost') {
		
		//
		$bd_servidor = 'localhost';
		$bd_banco = 'institutoliderfarma';
		$bd_usuario = 'root';
		$bd_senha = '123456';
		
	} else {

		// AWS
		$bd_servidor = '34.199.176.63';
		$bd_banco = 'institutoliderfarma';
		$bd_usuario = 'institutoliderfarma';
		$bd_senha = '239v9v9129478';
		
	}
	
	//
	$conexao = @mysqli_connect($bd_servidor, $bd_usuario, $bd_senha, $bd_banco);
	
	//
	@mysqli_set_charset($conexao, 'utf8');

	//
	if ($_SERVER['HTTP_HOST'] == '127.0.0.1' or $_SERVER['HTTP_HOST'] == 'localhost') 
		@mysqli_query($conexao, "SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
