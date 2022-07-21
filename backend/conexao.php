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
		$bd_servidor = 'XXX.XXX.XXX.XXX';
		$bd_banco = 'contatoseguro';
		$bd_usuario = 'root';
		$bd_senha = '';

	}
	
	//
	$conexao = new mysqli($bd_servidor, $bd_usuario, $bd_senha, $bd_banco);

	//
	if ($_SERVER['HTTP_HOST'] == '127.0.0.1' or $_SERVER['HTTP_HOST'] == 'localhost') 
		$conexao->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
	