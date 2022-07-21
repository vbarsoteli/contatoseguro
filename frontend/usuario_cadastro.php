<?php

    // post e put
    if (isset($_POST['submit'])) {

        // POST
        if (!$_POST['id_usuario']) {

            $classe = new Usuario();
            $resposta = $classe->Post();

            //
            unset($_POST);

        } else {

            $classe = new Usuario();
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