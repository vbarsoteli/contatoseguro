<?php 

	/*
	*
	* API Rest para Empresas com os métodos POST, PUT, GET e DELETE
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
			$sql = "SELECT *
					FROM empresa
					WHERE 1
					AND id_empresa = {$id}  ";
			$req = $conexao->query($sql) or die($conexao->error.$sql);
			$empresa = $req->fetch_assoc();

			//
			$saida = json_encode($empresa);

		} else {
			
			//
			$sql = "SELECT *
					FROM empresa
					WHERE 1
					ORDER BY id_empresa DESC ";
			$req = $conexao->query($sql) or die($conexao->error.$sql);

			//
			$empresa_array = array();
			while ($empresa = $req->fetch_assoc())
				$empresa_array[] = $empresa;
				
			//
			$saida = json_encode($empresa_array);

		}

	} elseif (strtoupper($metodo) == 'DELETE') {

		//
		if ($id) {

			//
			$sql = "DELETE FROM empresa WHERE id_empresa = {$id}";
			$conexao->query($sql) or die($conexao->error.$sql);

			//
			//$saida = '{ "mensagem": "Usuário deletado com sucesso!" }';

		}

	} else {

		// trata valores do post/put
		foreach ($input as $campo => $valor) {
			$post[$campo] = addslashes(trim($valor));
		}

		//
		if (!$post['nome'])
			$saida = '{ "erro": "Nome é obrigatório!" }';
		elseif (!$post['cnpj'])
			$saida = '{ "erro": "CNPJ é obrigatório!" }';
		else {

			//
			if (strtoupper($metodo) == 'POST') {

				//
				$sql = "INSERT INTO empresa SET dt_hr = NOW(), nome = '{$post['nome']}', cnpj = '{$post['cnpj']}', endereco = '{$post['endereco']}', numero = '{$post['numero']}', cidade = '{$post['cidade']}', cep = '{$post['cep']}' ";
				$conexao->query($sql) or die($conexao->error.$sql);

				//
				$saida = '{ "mensagem": "Empresa cadastrada com sucesso!" }';


			} elseif (strtoupper($metodo) == 'PUT') {

				//
				$sql = "UPDATE empresa SET dt_hr = NOW(), nome = '{$post['nome']}', cnpj = '{$post['cnpj']}', endereco = '{$post['endereco']}', numero = '{$post['numero']}', cidade = '{$post['cidade']}', cep = '{$post['cep']}'
					WHERE id_empresa = {$id}";
				$conexao->query($sql) or die($conexao->error.$sql);

				//
				$saida = '{ "mensagem": "Empresa alterada com sucesso!" }';

			} else
				$saida = '{ "erro": "Método não suportado!" }';

		}

	}

	//
	echo $saida;