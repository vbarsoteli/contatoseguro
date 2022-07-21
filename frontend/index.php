<?php

	//
	//try {

		//
		ini_set('display_errors', 1);
		error_reporting('E_ERROR | E_WARNING | E_PARSE');	
		
		//
		date_default_timezone_set('Brazil/East');
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
		
		//
		@session_start();
		
		//
		include('../backend/conexao.php');
		include('../backend/classe/Usuario.php');
		include('comum/minifier.php');

		//
		$link = $_GET['l'] ? $_GET['l'] : 'usuario_listagem';

?>
<!doctype html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Contato Seguro</title>

<link rel="stylesheet" type="text/css" href="comum/plugin/fontawesome-free-5.14.0/css/all.css" />
<link rel="stylesheet" type="text/css" href="comum/css/geral.min.css?<?=date('YmdHi') ?>" />

<script type="text/javascript" src="comum/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="comum/plugin/jquery-mask/jquery.mask.min.js"></script>
<script type="text/javascript" src="comum/js/funcao.js?<?=date('YmdHis') ?>"></script>

</head>

<body>
<?php

	//
	include('header.php');
	include('menu.php');

	//
	if (file_exists($link.'.php'))
		include($link.'.php');

	//
	if ($resposta['mensagem'])
		echo '<div id="mensagem">'.$resposta['mensagem'].'</div>';
	else 
		echo '<div id="erro">'.$resposta['erro'].'</div>';
		
?>


</body>
</html>
<?php 

	// } catch(Error $e) {

	// 	//
	// 	$trace = $e->getTrace();
	// 	$erro = $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];

	// 	//
	// 	@Email(array('vbarsoteli@gmail.com'), 'Erro: '.$e->getMessage(), $erro, false, false);

	// }
