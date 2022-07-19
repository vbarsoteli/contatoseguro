<?php

	//
	if ($_SERVER['HTTP_HOST'] == '127.0.0.1' or $_SERVER['HTTP_HOST'] == 'localhost') {
		
		//
		$bd_servidor = 'localhost';
		$bd_banco = 'contatoseguro';
		$bd_usuario = 'root';
		$bd_senha = '123456';
		
	} else {

		// AWS
		$bd_servidor = '';
		$bd_banco = 'contatoseguro';
		$bd_usuario = 'contatoseguro';
		$bd_senha = '';
		
	}
	
	//
	$conexao = @mysqli_connect($bd_servidor, $bd_usuario, $bd_senha, $bd_banco);
	
	//
	@mysqli_set_charset($conexao, 'utf8');

	//
	if ($_SERVER['HTTP_HOST'] == '127.0.0.1' or $_SERVER['HTTP_HOST'] == 'localhost') 
		@mysqli_query($conexao, "SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
