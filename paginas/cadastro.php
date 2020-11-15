<?php
    include 'banco.php';

    $campo = array();
    $descricao_botao = 'Incluir usuário';
    $acao_formulario = 'incluir_usuario.php';
    $titulo_pagina = 'Cadastro de usuários';

    // Preparação dos dados para a combo Estado
    $query_estado = 'SELECT * FROM estado';
    $resultado_estado = mysqli_query($conexao, $query_estado);

    // Preparação dos dados para a combo Tipos de usuário
    $query_tipo = 'SELECT * FROM tipo_usuario';
    $resultado_tipo = mysqli_query($conexao, $query_tipo);

    if(!isset($_GET['id'])){
        $campo['login'] = '';
        $campo['senha'] = '';
        $campo['nome'] = '';
        $campo['email'] = '';
        $campo['nascimento'] = '';
        $campo['endereco'] = '';
        $campo['numero'] = '';
        $campo['complemento'] = '';
        $campo['bairro'] = '';
        $campo['cidade'] = '';
        $campo['cep'] = '';
        $campo['telefone'] = '';
        $campo['tipo_usuario'] = '';
    } else { 
        $id = $_GET['id'];

        $descricao_botao = 'Alterar usuário';
        $acao_formulario = 'alterar_usuario.php?id='.$id;
        $titulo_pagina = 'Alteração de usuários';

        $query = "SELECT * FROM usuario WHERE id_usuario = $id";

        $resultado = mysqli_query($conexao, $query);

        while($linha = mysqli_fetch_array($resultado)){
            $campo['login'] = $linha['login'];
            $campo['senha'] = $linha['senha'];
            $campo['nome'] = $linha['nome'];
            $campo['email'] = $linha['email'];
            $campo['nascimento'] = substr($linha['nascimento'],8,2).'/'.substr($linha['nascimento'],5,2).'/'.substr($linha['nascimento'],0,4);
            $campo['endereco'] = $linha['endereco'];
            $campo['numero'] = $linha['numero'];
            $campo['complemento'] = $linha['complemento'];
            $campo['bairro'] = $linha['bairro'];
            $campo['cidade'] = $linha['cidade'];
            $campo['id_estado'] = $linha['id_estado'];
            $campo['cep'] = $linha['cep'];
            $campo['telefone'] = $linha['telefone'];
            $campo['tipo_usuario'] = $linha['id_tipo'];        
        } 
    }; 
?>

<div class="titulo">
    <h1><?=$titulo_pagina?></h1>
</div>

<div class="container-centro">
    <form id="tela" action="<?=$acao_formulario?>" method="POST">
        <input class="entrada entrada-top" size=10 value="<?=$campo['login']?>" type="text" id="txtLogin" name="txtLogin" placeholder="Login"><br>
        <input class="entrada" type="text" size=10 value="<?=$campo['senha']?>" id="txtSenha" name="txtSenha" placeholder="Senha"><br>
        <input class="entrada" type="text" size=50 value="<?=$campo['nome']?>" id="txtNome" name="txtNome" placeholder="Nome do usuário"><br>
        <input class="entrada" type="text" size=30 value="<?=$campo['email']?>" id="txtEmail" name="txtEmail" placeholder="e-mail"><br>
        <input class="entrada" type="text" size=15 value="<?=$campo['nascimento']?>" id="txtNascimento" name="txtNascimento" placeholder="Data de Nascimento"><br>
        <input class="entrada" type="text" size=50 value="<?=$campo['endereco']?>" id="txtEndereco" name="txtEndereco" placeholder="Endereço (Rua, Praça, etc...)"><br>
        <input class="entrada" type="text" size=5 value="<?=$campo['numero']?>" id="txtNumero" name="txtNumero" placeholder="Numero"><br>
        <input class="entrada" type="text" size=30 value="<?=$campo['complemento']?>" id="txtComplemento" name="txtComplemento" placeholder="Complemento (APT, etc...)"><br>
        <input class="entrada" type="text" size=20 value="<?=$campo['bairro']?>"id="txtBairro" name="txtBairro" placeholder="Bairro"><br>
        <input class="entrada" type="text" size=20 value="<?=$campo['cidade']?>" id="txtCidade" name="txtCidade" placeholder="Cidade"><br>

        <select class="entrada" name="cmbEstado">
            <option value="#">Selecione o estado</option>
            
            <?php while($linha_estado = mysqli_fetch_array($resultado_estado)){ 
                if($campo['id_estado'] == $linha_estado['id_estado']){
                    $valor = 'selected';
                } else {
                    $valor = '';
                }
            ?>
                <option value="<?=$linha_estado['id_estado']?>" <?=$valor?>><?=$linha_estado['descricao']?></option>
            <?php } ?>
        </select><br>


        <input class="entrada" type="text" size=10 value="<?=$campo['cep']?>" id="txtCep" name="txtCep" placeholder="CEP"><br>
        <input class="entrada" type="text" size=15 value="<?=$campo['telefone']?>" id="txtTelefone" name="txtTelefone" placeholder="Telefone"><br>

        <select class="entrada" name="cmbTipo">
            <option value="#">Selecione o tipo</option>

            <?php while($linha_tipo = mysqli_fetch_array($resultado_tipo)){
                if($campo['tipo_usuario'] == $linha_tipo['id_tipo']){
                    $valor = 'selected';
                } else {
                    $valor = '';
                }
            ?>
                <option value="<?=$linha_tipo['id_tipo']?>" <?=$valor?>><?=$linha_tipo['descricao']?></option>
            <?php } ?>
        </select><br>

        <div class="barra">
            <button class="link_botao" id="btnFuncao" type="submit"><?=$descricao_botao?></button>
        </div>
    </form>
</div>    
