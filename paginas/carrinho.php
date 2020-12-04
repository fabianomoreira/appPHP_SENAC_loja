<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
    }

    if(isset($_GET['acao'])){

        // Adicionar item ao carrinho
        if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);

            if(!isset($_SESSION['carrinho'][$id])){
                $_SESSION['carrinho'][$id] = 1;
            } else {
                $_SESSION['carrinho'][$id] += 1;
            }
        }

        // Remover item do carrinho
        if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);

            if(isset($_SESSION['carrinho'][$id])){
                unset($_SESSION['carrinho'][$id]);
            }
        }

        // Atualizar quantidade
        if($_GET['acao'] == 'up'){
            if(is_array($_POST['produto'])){
                foreach($_POST['produto'] as $id => $qtd){
                    $id = intval($id);
                    $qtd = intval($qtd);

                    if(!empty($qtd) || $qtd > 0){
                        $_SESSION['carrinho'][$id] = $qtd;
                    } else {
                        unset($_SESSION['carrinho'][$id]);
                    }
                }
            }
        }
    }
?>
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <h1>Seu carrinho de compras</h1>
    <form action="?pagina=carrinho&acao=up" method="post" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <table>
            <th>PRODUTO</th>
            <th>QUANTIDADE</th>
            <th>PREÇO</th>
            <th>SUBTOTAL</th>
            <th>REMOVER</th>

            <?php
                $total = 0;
                if(count($_SESSION['carrinho']) == 0){
                    echo '<tr><td colspan=5>O carrinho está vazio!</td></tr>';
                } else {
                    foreach($_SESSION['carrinho'] as $id => $qtd){
                        $sql = "SELECT * FROM produto WHERE id_produto='$id'";
                        $resultado = mysqli_query($conexao, $sql);
                        $linha = mysqli_fetch_array($resultado);

                        $qtd = intval($qtd);

                        $titulo = $linha['titulo'];

                        $preco = $linha['preco'];
                        $subtotal = $linha['preco'] * $qtd;
                        $total += $subtotal;

                        $preco = number_format($preco, 2, ',', '.');
                        $subtotal = number_format($subtotal, 2, ',', '.');

                        echo '<tr>
                                <td>'.$titulo.'</td>
                                <td><input type="text" size="3" name="produto['.$id.']" value="'.$qtd.'"/></td>
                                <td>R$ '.$preco.'</td>
                                <td>R$ '.$subtotal.'</td>
                                <td><a href="?pagina=carrinho&id='.$id.'&acao=del">Remover</a></td>
                            </tr>';
                    }

                    $total = number_format($total, 2, ',', '.');
                    echo '<tr><td>TOTAL</td><td colspan=4>'.$total.'</td></tr>';
                }
            ?>
        </table>
        <table class="semborda">
            <tr>
                <td align=center><input class="link_botao" type="submit" value="Atualizar carrinho"></td>
                <td align=center><input class="link_botao" type="button" value="Finalizar Compra" onclick="location.href='scripts/processar_pedido.php';"></td>
            </tr>
        </table>
    </form>
</div>