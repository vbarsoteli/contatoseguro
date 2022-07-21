<?php

    // post e put
    if (isset($_POST['submit'])) {

        // POST
        if (!$_POST['id_empresa']) {

            $classe = new Empresa();
            $resposta = $classe->Post();

            //
            unset($_POST);

        } elseif ($_POST['id_empresa'])  {

            $classe = new Empresa();
            $classe->id = $_POST['id_empresa'];
            $resposta = $classe->Put();

            //
            header('location: ?l=empresa_listagem');
            exit;

        }

    }

    // lista registros do id selecionado para edição
    if (is_numeric($_GET['id'])) {

        $classe = new Empresa();
        $classe->id = $_GET['id'];
        $empresa = $classe->Get();

    }

?>
<div id="usuario_cadastro">

    <div class="conteudo"> 

        <h1>Inserir Empresa</h1>

        <a href="?l=empresa_listagem"><i class="fas fa-list"></i> Listar registros</a>

        <form name="form2" id="form2" action="" method="post">

            <input required autofocus type="text" name="nome" id="nome" placeholder="Nome completo" value="<?=$_POST['nome'] ? $_POST['nome'] : $empresa['nome'] ?>"  ><br>

            <input required type="text" name="cnpj" id="cnpj" placeholder="CNPJ" value="<?=$_POST['cnpj'] ? $_POST['cnpj'] : $empresa['cnpj'] ?>" ><br>

            <input type="text" name="endereco" id="endereco" placeholder="Endereço" value="<?=$_POST['endereco'] ? $_POST['endereco'] : $empresa['endereco'] ?>" autocomplete="off" ><br>

            <input type="tel" name="numero" id="numero" placeholder="Número" value="<?=$_POST['numero'] ? $_POST['numero'] : $empresa['numero']?>" autocomplete="off" ><br>

            <input type="text" name="cidade" id="cidade" placeholder="Cidade" value="<?=$_POST['cidade'] ? $_POST['cidade'] : $empresa['cidade'] ?>" autocomplete="off" ><br>
            
            <input type="tel" name="cep" id="cep" placeholder="CEP" value="<?=$_POST['cep'] ? $_POST['cep'] : $empresa['cep'] ?>" autocomplete="off" ><br><br><br>

            <button type="submit" name="submit" value="1"><?=$empresa['id_empresa'] ? 'Salvar' : 'Cadastrar' ?></button>
            <input type="hidden" name="id_empresa" id="id_empresa" value="<?=$empresa['id_empresa'] ?>" >
            
        </form>

    </div>

</div>
<script type="text/javascript">

$(document).ready(function($){

  $('#cnpj').mask('00.000.000/0001-00', {reverse: true})
  $('#cep').mask('00000-000', {reverse: true})

});

</script>