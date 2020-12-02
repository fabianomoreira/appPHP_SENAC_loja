<?php
    include 'banco.php';

    $id_produto = $_GET['id'];

    $titulo = $_POST['txtTitulo'];
    $descricao = $_POST['txtDescricao'];
    $imagem = $_POST['txtImagem'];
    $preco = $_POST['txtPreco'];
    $estoque = $_POST['txtEstoque'];
    $ativo = $_POST['txtAtivo'];

    $query = "UPDATE produto SET titulo    = '$titulo',
                                 descricao = '$descricao',
                                 imagem    = '$imagem',
                                 preco     = $preco,
                                 estoque   = $estoque,
                                 ativo     = $ativo
                          WHERE id_produto = $id_produto";

    mysqli_query($conexao, $query);

    #echo $query;
    header('location:../index.php?pagina=produtos');
?>