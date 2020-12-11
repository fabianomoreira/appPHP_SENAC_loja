<?php
    $query_produtos = 'SELECT * FROM produto WHERE ativo = TRUE';

    $produtos = mysqli_query($conexao, $query_produtos);

    if(!isset($_SESSION)){
        session_start();
    }
    
    $_SESSION['origem'] = '1';
?>

<div style="display:flex; flex-direction: row; align-items: center; justify-content: center; flex-wrap: wrap;">
    <?php while($linha = mysqli_fetch_array($produtos)){?>
    <div class="produto-lista">
        <div class="produto-titulo">
            <?=utf8_encode($linha['titulo'])?>
        </div>
        <div>
            <a href="?pagina=carrinho&id=<?=$linha['id_produto']?>&acao=add"><img src="<?=$linha['imagem']?>" width="150px"></a>
        </div>
        <div class="produto-preco">
            <?=$linha['preco']?>
        </div>
    </div>
    <?php }?>
</div>