<?php
    include 'banco.php';

    if(!isset($_SESSION)){
        session_start();
    }

    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    // Validação do usuário
    $sql = "SELECT * FROM usuario WHERE login='".$login."' AND senha='".$senha."'";

    $resultado = mysqli_query($conexao, $sql);

    if($linha = mysqli_fetch_array($resultado)){
        $_SESSION['nome'] = $linha['nome'];
        $_SESSION['id_usuario'] = $linha['id_usuario'];
        $_SESSION['tipo'] = $linha['id_tipo'];
        
        header('location:../index.php?pagina=home');
    } else {
        header('location:../index.php?pagina=login');
    }
    
?>