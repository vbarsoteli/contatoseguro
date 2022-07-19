<?php

	//
	ini_set('display_errors', 1);
	error_reporting('E_ERROR | E_WARNING | E_PARSE');	
	
	//
	date_default_timezone_set('Brazil/East');
	setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
	
	//
	@session_start();
	
	//
	include('comum/conexao.php');
	include('comum/minifier.php');

?>
<!doctype html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Contato Seguro</title>

<link rel="stylesheet" type="text/css" href="comum/css/geral.min.css?<?=date('YmdHi') ?>" />
<link rel="stylesheet" type="text/css" href="comum/plugin/fontawesome-free-5.14.0/css/fontawesome.min.css" />

<script type="text/javascript" src="comum/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="comum/js/funcoes.js?<?=date('YmdHis') ?>"></script>

</head>

<body>
<?php

	//
	include('header.php');
	include('menu.php');

?>


</body>
</html>