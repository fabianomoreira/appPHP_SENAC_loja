<?php
    include 'banco.php';

    if(isset($_FILES['caminho'])){
        $pasta = 'imagens/produtos/';
        $arquivo = $_FILES['caminho']['name'];
        
        $resultado = move_uploaded_file($_FILES['caminho']['tmp_name'], $pasta.$arquivo);
    }

    $titulo    = $_POST['txtTitulo'];
    $descricao = $_POST['txtDescricao'];
    $imagem    = $pasta.$arquivo;
    $preco     = $_POST['txtPreco'];
    $estoque   = $_POST['txtEstoque'];
    $ativo     = $_POST['txtAtivo'];

    $query = "INSERT INTO produto(titulo,
                                  descricao,
                                  imagem,
                                  preco,
                                  estoque,
                                  ativo)
                   VALUES('$titulo',
                          '$descricao',
                          '$imagem',
                           $preco,
                           $estoque,
                           $ativo);";

    #echo $query;

    mysqli_query($conexao, $query);

    header('location:index.php?pagina=produtos');
?>