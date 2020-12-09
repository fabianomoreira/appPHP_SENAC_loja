<?php
    include '../scripts/banco.php';

    if(!isset($_SESSION)){
        session_start();
    }

    $chave_pedido = '8';

    $sql = "SELECT p.id_pedido,
                   p.data_pedido,
                   u.nome,
                   u.endereco,
                   u.numero,
                   u.complemento,
                   u.cidade,
                   u.bairro,
                   u.cep
              FROM pedido p
        INNER JOIN usuario u
                ON (p.id_usuario = u.id_usuario)
             WHERE p.id_pedido=".$chave_pedido;
             
    $i = "SELECT i.qtd, 
                 (i.qtd*i.valor) AS total, 
                 p.titulo 
            FROM item_pedido i 
      INNER JOIN produto p 
              ON (i.id_produto = p.id_produto) 
           WHERE i.id_pedido=".$chave_pedido;
?>

<table border=0>
    <?php 
        $resultado = mysqli_query($conexao, $sql);

        while($linha = mysqli_fetch_array($resultado)){?>
    <tr>
        <td><h1>Parabéns, <?=$linha['nome']?></h1></td>
    </tr>
    <tr>
        <td><h2>O número do seu pedido é: <?=$linha['id_pedido']?></h2></td>
    </tr>
    <tr>
        <td><h2>Endereço de entrega:</h2></td>
    </tr>    
    <tr>
        <td><h2><?=$linha['endereco']?>, <?=$linha['numero']?> - <?=$linha['complemento']?></h2></td>
    </tr>    
    <tr>
        <td><h2><?=$linha['bairro']?>, <?=$linha['cidade']?></h2></td>
    </tr>    
    <?php } ?>
</table>
<table>
    <tr>
        <td>TÍTULO</td>
        <td>QTD</td>
        <td>TOTAL</td>
    </tr>
    
    <?php 
        $resultado = mysqli_query($conexao, $i);

        while($linha = mysqli_fetch_array($resultado)){?>
            <tr>
                <td><?=$linha['titulo']?></h1></td>
                <td><?=$linha['qtd']?></h1></td>
                <td><?=$linha['total']?></h1></td>
            </tr>
    <?php } ?>
</table>