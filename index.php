<?php include 'scripts/banco.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP + MySQL</title>

    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <?php include 'cabecalho.php'; ?>

    <div id="conteudo" class="container">

        <?php 
            if(isset($_GET['pagina'])){
                $pagina = $_GET['pagina'];
            } else {
                $pagina = 'home';
            }

            switch ($pagina) {
                case 'usuarios':
                    include 'paginas/usuarios.php';
                    break;
                case 'novo_usuario':
                    include 'paginas/cadastro.php';
                    break;
                case 'novo_tipo':
                    include 'paginas/cadastro_tipo.php';
                    break;
                case 'tipos_usuario':
                    include 'paginas/tipos_usuario.php';
                    break;
                case 'carrinho':
                    include 'paginas/carrinho.php';
                    break;
                case 'produtos':
                    include 'paginas/produtos.php';
                    break;
                case 'novo_produto':
                    include 'paginas/cadastro_produto.php';
                    break;
                case 'pedido':
                    include 'paginas/pedido.php';
                    break;
                case 'login':
                    include 'paginas/login.php';
                    break;
                default:
                    include 'paginas/home.php'; 
            }
        ?>
    </div>

    <?php include 'rodape.php'; ?>
</body>
</html>