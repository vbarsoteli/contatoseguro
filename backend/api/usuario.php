<?php 

	/*
	*
	* API Rest para Usuario com os métodos POST, PUT, GET e DELETE
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
			$sql = "SELECT U.*, E.id_empresa, E.nome AS empresa
					FROM usuario U
					LEFT JOIN usuario_empresa_relacionamento UER ON UER.id_usuario = U.id_usuario
					LEFT JOIN empresa E ON E.id_empresa = UER.id_empresa
					WHERE 1
					AND U.id_usuario = {$id}  ";
			$req = $conexao->query($sql) or die($conexao->error.$sql);
			$usuario = $req->fetch_assoc();

			//
			$saida = json_encode($usuario);

		} else {
			
			//
			$sql = "SELECT U.*, E.nome AS empresa
					FROM usuario U
					LEFT JOIN usuario_empresa_relacionamento UER ON UER.id_usuario = U.id_usuario
					LEFT JOIN empresa E ON E.id_empresa = UER.id_empresa
					WHERE 1
					GROUP BY U.id_usuario";
			$req = $conexao->query($sql) or die($conexao->error.$sql);

			//
			$usuario_array = array();
			while ($usuario = $req->fetch_assoc())
				$usuario_array[] = $usuario;
				
			//
			$saida = json_encode($usuario_array);

		}

	} elseif (strtoupper($metodo) == 'DELETE') {

		//
		if ($id) {

			//
			$sql = "DELETE FROM usuario WHERE id_usuario = {$id}";
			$conexao->query($sql) or die($conexao->error.$sql);

			//
			//$saida = '{ "mensagem": "Usuário deletado com sucesso!" }';

		}

	} else {

		// trata valores do post/put
		foreach ($input as $campo => $valor) {
			$post[$campo] = addslashes(trim($valor));
		}

		// formata dt nascimento
		if ($post['dt_nascimento']) {
			$v = explode('/', $post['dt_nascimento']);
			$dt_nascimento = $v[2].'-'.$v[1].'-'.$v[0];
		}

		//
		if (!$post['nome'])
			$saida = '{ "erro": "Nome é obrigatório!" }';
		elseif (!$post['email'])
			$saida = '{ "erro": "E-mail é obrigatório!" }';
		else {

			//
			if (strtoupper($metodo) == 'POST') {

				//
				print_r($_POST['id_empresa']);

				//
				if ($dt_nascimento)
					$sql = "INSERT INTO usuario SET dt_hr = NOW(), nome = '{$post['nome']}', email = '{$post['email']}', telefone = '{$post['telefone']}', dt_nascimento = '{$dt_nascimento}', cidade = '{$post['cidade']}' ";
				else 
					$sql = "INSERT INTO usuario SET dt_hr = NOW(), nome = '{$post['nome']}', email = '{$post['email']}', telefone = '{$post['telefone']}', cidade = '{$post['cidade']}' ";

				//
				$conexao->query($sql) or die($conexao->error.$sql);

				//
				$saida = '{ "mensagem": "Usuário cadastrado com sucesso!" }';


			} elseif (strtoupper($metodo) == 'PUT') {
	
				//
				if ($dt_nascimento)
					$sql = "UPDATE usuario SET dt_hr = NOW(), nome = '{$post['nome']}', email = '{$post['email']}', telefone = '{$post['telefone']}', dt_nascimento = '{$dt_nascimento}', cidade = '{$post['cidade']}' 
					WHERE id_usuario = {$id}";
				else 
					$sql = "UPDATE usuario SET dt_hr = NOW(), nome = '{$post['nome']}', email = '{$post['email']}', telefone = '{$post['telefone']}', cidade = '{$post['cidade']}' 
					WHERE id_usuario = {$id}";

				//
				$conexao->query($sql) or die($conexao->error.$sql);

				//
				for ($i=0; $i<sizeof($post['id_empresa']); $i++) {

					//
					$sql = "SELECT *
							FROM usuario_empresa_relacionamento
							WHERE 1
							AND id_usuario = {$id}
							AND id_empresa = {$post['id_empresa'][$i]}";
					$req = $conexao->query($sql) or die($conexao->error.$sql);

					//
					if (!$req->num_rows){

						//
						$sql = "INSERT INTO usuario_empresa_relacionamento SET id_usuario = {$id}, id_empresa = {$post['id_empresa'][$i]}";
						$conexao->query($sql) or die($conexao->error.$sql);

					}

				}

				//
				$saida = '{ "mensagem": "Usuário alterado com sucesso!" }';

			} else
				$saida = '{ "erro": "Método não suportado!" }';

		}

	}

	//
	echo $saida;