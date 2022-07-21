<?php

    // post e put
    if (isset($_POST['submit'])) {

        // POST
        if (!$_POST['id_usuario']) {

            $classe = new Usuario();
            $resposta = $classe->Post();

            //
            unset($_POST);

        } elseif ($_POST['id_usuario'])  {

            $classe = new Usuario();
            $classe->id = $_POST['id_usuario'];
            $resposta = $classe->Put();

            //
            header('location: ?l=usuario_listagem');
            exit;

        }

    }

    // lista registros do id selecionado para edição
    if (is_numeric($_GET['id'])) {

        $classe = new Usuario();
        $classe->id = $_GET['id'];
        $usuario = $classe->Get();

        //
        if ($usuario['dt_nascimento']) {
        
            //
            $v = explode('-', $usuario['dt_nascimento']);
            $dt_nascimento = $v[2].'/'.$v[1].'/'.$v[0];

        }

    }

?>
<div id="usuario_cadastro">

    <div class="conteudo"> 

        <h1>Inserir Usuário</h1>

        <a href="?l=usuario_listagem"><i class="fas fa-list"></i> Listar registros</a>

        <form name="form_usuario" id="form_usuario" action="" method="post">

            <input required autofocus type="text" name="nome" id="nome" placeholder="Nome completo" value="<?=$_POST['nome'] ? $_POST['nome'] : $usuario['nome'] ?>"  ><br>

            <input required type="email" name="email" id="email" placeholder="E-mail" value="<?=$_POST['email'] ? $_POST['email'] : $usuario['email'] ?>" ><br>

            <input type="tel" name="telefone" id="telefone" placeholder="Telefone" value="<?=$_POST['telefone'] ? $_POST['telefone'] : $usuario['telefone'] ?>" autocomplete="off" ><br>

            <input type="tel" name="dt_nascimento" id="dt_nascimento" placeholder="Data de nascimento, ex.: 01/01/1999" value="<?=$_POST['dt_nascimento'] ? $_POST['dt_nascimento'] : $dt_nascimento ?>" autocomplete="off" ><br>

            <input type="text" name="cidade" id="cidade" placeholder="Cidade onde nasceu" value="<?=$_POST['cidade'] ? $_POST['cidade'] : $usuario['cidade'] ?>" autocomplete="off" ><br><br><br>

            <b>Empresas</b>
            <?php 

                // empresas do usuario
                $classe = new UsuarioEmpresa();
                $classe->id = $usuario['id_usuario'] ;
                $usuario_empresa = $classe->List();
                $array = json_decode($usuario_empresa, true);

                //
                for ($i=0; $i<sizeof($array); $i++)
                    $id_usuario_empresa[] = $array[$i]['id_empresa'];

                // todas as empresas
                $classe = new Empresa();
                $empresa = $classe->List();
                $array2 = json_decode($empresa, true);

            ?>
                <table>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th></th>
                </tr>
                <?php 

                    //
                    for ($i=0; $i<sizeof($array2); $i++) {

                        //
                        $checked = '';
                        if (in_array($array2[$i]['id_empresa'], $id_usuario_empresa))
                            $checked = 'checked';

                        echo '<tr>';
                        echo '<td>'.$array2[$i]['id_empresa'].'</td>';
                        echo '<td>'.$array2[$i]['nome'].'</td>';
                        echo '<td>'.$array2[$i]['cnpj'].'</td>';
                        echo '<td><input type="checkbox" '.$checked.' name="id_empresa[]" value="'.$array2[$i]['id_empresa'].'"></td>';
                        echo '</tr>';

                    }


                ?>

                </table>
            <br><br>

            <button type="submit" name="submit" value="1"><?=$usuario['id_usuario'] ? 'Salvar' : 'Cadastrar' ?></button>
            <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$usuario['id_usuario'] ?>" >
            
        </form>

    </div>

</div>
<script type="text/javascript">

$(document).ready(function($){

  $('#dt_nascimento').mask('00/00/0000', {reverse: true})
  $('#telefone').mask('00-00000-0000', {reverse: true})

});

</script>