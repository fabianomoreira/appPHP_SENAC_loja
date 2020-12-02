<?php
    include 'banco.php';

    $id = $_GET['id'];

    $query = "DELETE FROM produto WHERE id_produto = $id";

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=produtos');
?>