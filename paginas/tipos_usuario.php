<?php
    $query_tipo = 'SELECT * FROM tipo_usuario';

    $tipo = mysqli_query($conexao, $query_tipo);
?>

<div class="titulo">
    <h1>Lista de Tipos de usuário</h1>
</div>
<div class="tabela">
    <table cellspacing=0>
        <tr>
            <th>DESCRIÇÃO</th>
            <th colspan="2">FUNÇÃO</th>
        </tr>

        <?php
            while($linha = mysqli_fetch_array($tipo)){
                echo '<tr>';
                echo '<td>'.utf8_encode($linha['descricao']).'</td>';
                echo '<td class=tabela-celula><a href=?pagina=novo_tipo&id='.$linha['id_tipo'].'><img src=imagens/edicao.png width=20px></td>';
                echo '<td class=tabela-celula><a href=scripts/excluir_tipo_usuario.php?id='.$linha['id_tipo'].'><img src=imagens/lixeira.png width=20px></a></td>';
                echo '</tr>';
            }
        ?>
    </table>
    <a class="link_botao" href="?pagina=novo_tipo">Cadastrar novo tipo</a>
</div>

