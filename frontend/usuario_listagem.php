<?php 

    //
    if (isset($_GET['deletar'])) { 

		//
		$classe = new Usuario();
		$classe->id = $_GET['id'];
		$classe->Delete();

		//
		//header('location: ?l=usuario_listagem');
		//exit;

    }

    //
    $classe = new Usuario();
    $usuario = $classe->List();

    //
    $usuario_array = json_decode($usuario, true);


?>
<div id="usuario_listagem">
  
<h1>Usuários</h1>

<a href="?l=usuario_cadastro"><i class="fas fa-plus-square"></i> Adicionar</a>

<table>
  <tr>
    <th>Nome</th>
    <th>E-mail</th>
    <th>Telefone</th>
    <th>Cidade</th>
  </tr>
<?php 

    //

    //
    for ($i=0; $i<sizeof($usuario_array); $i++) {

        echo '<tr>';
        echo '<td>'.$usuario_array[$i]['nome'].'</td>';
        echo '<td>'.$usuario_array[$i]['email'].'</td>';
        echo '<td>'.$usuario_array[$i]['telefone'].'</td>';
        echo '<td>'.$usuario_array[$i]['cidade'].'</td>';
        echo '<td><a href="?l=usuario_cadastro&id='.$usuario_array[$i]['id_usuario'].'"><i class="fas fa-edit"></i></a></td>';
        echo '<td><a href="?deletar&id='.$usuario_array[$i]['id_usuario'].'"><i class="fas fa-trash"></i></a></td>';
        echo '</tr>';

    }



?>

</table>

</div>