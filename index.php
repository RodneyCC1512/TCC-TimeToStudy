<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSs/RegToLogin.css">
    <link rel="stylesheet" href="CSSs/Alerta.css">
    <title>Login-PHP</title>
</head>

<body>

    <main class="container">

        <h1>Olá Novamente!</h1>
        <h3>Faça o login</h3>

        <form action="Logar.php" method="POST">

            <?php
            if (isset($_SESSION['SenhaNova'])) :
            ?>
                <div class="notification is-success">
                    <p>Senha alterada com sucesso!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['SenhaNova']);
            ?>

            <?php
            if (isset($_SESSION['Nverificou'])) :
            ?>
                <div class="notification is-danger">
                    <p>Faça a verificação de Email antes de fazer login!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['Nverificou']);
            ?>

            <?php
            if (isset($_SESSION['Verificado'])) :
            ?>
                <div class="notification is-success">
                    <p>E-mail verificado com sucesso!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['Verificado']);
            ?>

            <?php
            if (isset($_SESSION['nao_autenticado'])) :
            ?>
                <div class="notification is-danger">
                    <p>Usuário ou senha inválidos! Tente novamente!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['nao_autenticado']);
            ?>

            <?php
            if (isset($_SESSION['PreencherL'])) :
            ?>
                <div class="notification is-danger">
                    <p>Preencha os dados antes de tentar fazer login!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['PreencherL']);
            ?>
            <div class="input-field">
                <input type="email" name="email" placeholder="Insira o seu Email">
                <div class="underline"></div>
            </div>

            <div class="input-field">
                <input type="password" name="password" placeholder="Insira a sua Senha">
                <div class="underline"></div>
            </div>

            <a href="Recuperacao.php">Esqueceu a senha?</a>
            <button type="submit" id="Logar">Login</button>
        </form>

        <div class="RegistroToLogin">
            <p class="possui">Não possui uma conta?</p>
            <a href="TelaRegistro.php">Clique aqui para se registrar</a>
        </div>

    </main>
</body>

</html>