<?php 

	/*
	*
	* API Rest para Empresas do Usuario
	*
	*/

    //
    include('../../backend/conexao.php');

	//
	$json = file_get_contents('php://input');
    $post = json_decode($json, true);
	$metodo = $_SERVER["REQUEST_METHOD"];

	//
	if (strtoupper($metodo) == 'GET') {

		//
		if ($id) {

			//
			$sql = "SELECT E.id_empresa, E.nome, E.cnpj, UER.id_usuario
					FROM empresa E
					INNER JOIN usuario_empresa_relacionamento UER ON UER.id_empresa = E.id_empresa
					WHERE 1 
					AND UER.id_usuario = {$id} ";
			$req = $conexao->query($sql) or die($conexao->error.$sql);

			//
			$empresa_array = array();
			while ($empresa = $req->fetch_assoc())
				$empresa_array[] = $empresa;

			//
			$saida = json_encode($empresa_array);

		} 

	}

	//
	echo $saida;