<?php
    $query = 'SELECT * FROM usuario';

    $consulta = mysqli_query($conexao, $query);
?>
<div class="titulo">
    <h1>Lista de usuários</h1>
</div>
<div class="tabela">
    <table cellspacing=0>
        <tr>
            <th>LOGIN</th>
            <th>NOME</th>
            <th colspan="2">FUNÇÃO</th>
        </tr>

        <?php
            while($linha = mysqli_fetch_array($consulta)){
                echo '<tr>';
                echo '<td>'.$linha['login'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td class=tabela-celula><a href=?pagina=novo_usuario&id='.$linha['id_usuario'].'><img src=imagens/edicao.png width=20px></td>';
                echo '<td class=tabela-celula><a href=scripts/excluir_usuario.php?id='.$linha['id_usuario'].'><img src=imagens/lixeira.png width=20px></a></td>';
                echo '</tr>';
            }
        ?>
    </table>
    <a class="link_botao" href="?pagina=novo_usuario">Cadastrar novo usuário</a>
</div>

