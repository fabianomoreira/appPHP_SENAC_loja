<div class="titulo">
    <h1>Login</h1>
</div>

<div class="container-centro">
    <form class="tela-login" action="scripts/processar_login.php" method="POST">
        <input class="entrada entrada-top" size=15 maxlength=15 type="text" id="txtLogin" name="txtLogin" placeholder="Login"><br>
        <input class="entrada entrada-top" size=15 maxlength=15 type="password" id="txtSenha" name="txtSenha" placeholder="Senha"><br>

        <div class="barra">
            <button class="link_botao" id="btnFuncao" type="submit">Entrar</button>
        </div>
        <div class="titulo">
            <a href="index.php?pagina=novo_usuario" style="padding-left: 35px">Não tem usuário? Cadastre-se</a>
        </div>
    </form>
</div>    
