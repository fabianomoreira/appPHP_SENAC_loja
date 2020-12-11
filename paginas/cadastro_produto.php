<?php
    include 'scripts/banco.php';

    $campo = array();
    $descricao_botao = 'Incluir produto';
    $acao_formulario = 'scripts/incluir_produto.php';
    $titulo_pagina = 'Cadastro de Produtos';

    if(!isset($_GET['id'])){
        $campo['titulo'] = '';
        $campo['descricao'] = '';
        $campo['imagem'] = '';
        $campo['preco'] = '';
        $campo['estoque'] = '';
        $campo['ativo'] = '';
    } else { 
        $id = $_GET['id'];

        $descricao_botao = 'Alterar produto';
        $acao_formulario = 'scripts/alterar_produto.php?id='.$id;
        $titulo_pagina = 'Alteração de Produtos';

        $query = "SELECT * FROM produto WHERE id_produto = $id";

        $resultado = mysqli_query($conexao, $query);

        while($linha = mysqli_fetch_array($resultado)){
            $campo['titulo'] = $linha['titulo'];
            $campo['descricao'] = $linha['descricao'];
            $campo['imagem'] = $linha['imagem'];
            $campo['preco'] = $linha['preco'];
            $campo['estoque'] = $linha['estoque'];
            $campo['ativo'] = $linha['ativo'];
        } 
    }; 
?>

<div class="titulo">
    <h1><?=$titulo_pagina?></h1>
</div>

<div class="container-centro">
    <form class="tela-produto" action="<?=$acao_formulario?>" method="POST" enctype="multipart/form-data">
        <input class="entrada entrada-top" size=100 maxlength=100 value="<?=utf8_encode($campo['titulo'])?>" type="text" id="txtTitulo" name="txtTitulo" placeholder="Título"><br>
        <input class="entrada entrada-top" size=100 maxlength=300 value="<?=utf8_encode($campo['descricao'])?>" type="text" id="txtDescricao" name="txtDescricao" placeholder="Descrição"><br>
        <input class="entrada entrada-top" size=50 maxlength=50 value="<?=$campo['imagem']?>" type="text" id="txtImagem" name="txtImagem" placeholder="Imagem">&nbsp;&nbsp;<input type="file" id="caminho" name="caminho" accept="image/*" onchange="atualizarCaminhoImagem();"><br>
        <input class="entrada entrada-top" size=30 maxlength=30 value="<?=$campo['preco']?>" type="text" id="txtPreco" name="txtPreco" placeholder="Preço do produto"><br>
        <input class="entrada entrada-top" size=10 maxlength=10 value="<?=$campo['estoque']?>" type="text" id="txtEstoque" name="txtEstoque" placeholder="Estoque"><br>
        <input class="entrada entrada-top" size=10 maxlength=10 value="<?=$campo['ativo']?>" type="text" id="txtAtivo" name="txtAtivo" placeholder="Ativo?"><br>
        
        <div class="barra">
            <button class="link_botao" id="btnFuncao" type="submit"><?=$descricao_botao?></button>
        </div>
    </form>
</div>    

<script>
    function atualizarCaminhoImagem(){
        var arquivo = document.getElementById("caminho").files[0].name;

        document.getElementById("txtImagem").value = "imagens/produtos/" + arquivo;
    }
</script>
