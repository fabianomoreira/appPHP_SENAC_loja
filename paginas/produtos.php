<?php
    $query_tipo = 'SELECT * FROM produto';

    $produto = mysqli_query($conexao, $query_tipo);
?>

<div class="titulo">
    <h1>Lista de Produtos</h1>
</div>
<div class="tabela">
    <table cellspacing=0>
        <tr>
            <th>TÍTULO</th>
            <th>ESTOQUE</th>
            <th>ATIVO</th>
            <th colspan=2>FUNÇÃO</th>
        </tr>

        <?php
            while($linha = mysqli_fetch_array($produto)){
                echo '<tr>';
                echo '<td>'.utf8_encode($linha['titulo']).'</td>';
                echo '<td align=center>'.$linha['estoque'].'</td>';
                echo '<td align=center>'.$linha['ativo'].'</td>';
                echo '<td class=tabela-celula><a href=?pagina=novo_produto&id='.$linha['id_produto'].'><img src=imagens/edicao.png width=20px></td>';
                echo '<td class=tabela-celula><a href=scripts/excluir_produto.php?id='.$linha['id_produto'].'><img src=imagens/lixeira.png width=20px></a></td>';
                echo '</tr>';
            }
        ?>
    </table>
    <a class="link_botao" href="?pagina=novo_produto">Cadastrar novo produto</a>
</div>

