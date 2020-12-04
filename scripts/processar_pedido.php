<?php
    include 'banco.php';

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
    }

    if(count($_SESSION['carrinho']) == 0){
        echo '<tr><td colspan=5>O carrinho está vazio!</td></tr>';
    } else if(isset($_SESSION['nome'])){
        // Gravação do Pedido
        $sql = "INSERT INTO pedido(data_pedido, id_usuario) VALUES(now(), ".$_SESSION['id_usuario'].")";

        $resultado = mysqli_query($conexao, $sql);

        $chave_pedido = mysqli_insert_id($conexao);

        // Gravação dos itens do pedido
        foreach($_SESSION['carrinho'] as $id => $qtd){
            $sql = "INSERT INTO item_pedido(id_pedido, 
                                            id_produto, 
                                            qtd, 
                                            valor) 
                         VALUES(".$chave_pedido.","
                                 .$id.","
                                 .$qtd.","
                                 ."(SELECT preco FROM produto WHERE id_produto=".$id."))";

            $resultado = mysqli_query($conexao, $sql);
        }
    }

    if(!isset($_SESSION['nome'])){
        header('location:../index.php?pagina=login');
    } else {
        header('location:../index.php?pagina=pedido');
    }
?>