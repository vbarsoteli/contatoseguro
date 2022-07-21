<?php 

    //
    if (isset($_GET['deletar'])) { 

		//
		$classe = new Empresa();
		$classe->id = $_GET['id'];
		$classe->Delete();

		//
		header('location: ?l=empresa_listagem');
		exit;

    }

    //
    $classe = new Empresa();
    $empresa = $classe->List();

    //
    $empresa_array = json_decode($empresa, true);


?>
<div id="usuario_listagem">
  
<h1>Empresas</h1>

<a href="?l=empresa_cadastro"><i class="fas fa-plus-square"></i> Adicionar</a>

<table>
  <tr>
    <th>Nome</th>
    <th>CNPJ</th>
    <th>Endereço</th>
    <th>Cidade</th>
  </tr>
<?php 

    //

    //
    for ($i=0; $i<sizeof($empresa_array); $i++) {

        echo '<tr>';
        echo '<td>'.$empresa_array[$i]['nome'].'</td>';
        echo '<td>'.$empresa_array[$i]['cnpj'].'</td>';
        echo '<td>'.$empresa_array[$i]['telefone'].'</td>';
        echo '<td>'.$empresa_array[$i]['cidade'].'</td>';
        echo '<td><a href="?l=empresa_cadastro&id='.$empresa_array[$i]['id_empresa'].'"><i class="fas fa-edit"></i></a></td>';
        echo '<td><a href="?l=empresa_listagem&deletar&id='.$empresa_array[$i]['id_empresa'].'"><i class="fas fa-trash"></i></a></td>';
        echo '</tr>';

    }



?>

</table>

</div>