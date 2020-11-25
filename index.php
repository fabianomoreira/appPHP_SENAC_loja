<?php include 'banco.php'; ?>
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

            if($pagina == 'usuarios'){
                include 'paginas/usuarios.php';
            } else if($pagina == 'novo_usuario'){
                include 'paginas/cadastro.php';
            } else if($pagina == 'novo_tipo'){
                include 'paginas/cadastro_tipo.php';
            } else if($pagina == 'tipos_usuario'){
                include 'paginas/tipos_usuario.php';
            } else if($pagina == 'carrinho'){
                include 'paginas/carrinho.php';
            } else if($pagina == 'produtos'){
                include 'paginas/produtos.php';
            } else if($pagina == 'novo_produto'){
                include 'paginas/cadastro_produto.php';
            } else if($pagina == 'pedido'){
                include 'paginas/pedido.php';
            } else {
                include 'paginas/home.php'; 
            }
        ?>
    </div>

    <?php include 'rodape.php'; ?>
</body>
</html>