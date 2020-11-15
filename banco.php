<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $db = 'appDB';

    $conexao = mysqli_connect($servidor, $usuario, $senha, $db);

    if(!$conexao){
        echo 'Erro ao conectar no banco de dados';
    }
?>