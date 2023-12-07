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
    <title>Registro-PHP</title>
</head>

<body>
    <main class="container">
        <h1>Olá Estudante!</h1>
        <h3>Crie sua conta</h3>

        <form action="Registrar.php" method="POST">
            <?php
            if (isset($_SESSION['ErroVerificar'])) :
            ?>
                <div class="notification is-danger">
                    <p>Erro na verificação de Email - Tente novamente!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['ErroVerificar']);
            ?>

            <?php
            if (isset($_SESSION['Verificacao'])) :
            ?>
                <div class="notification is-success">
                    <p>Acesse seu Email para finalizar o cadastro!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['Verificacao']);
            ?>

            <?php
            if (isset($_SESSION['Senha_dife'])) :
            ?>
                <div class="notification is-danger">
                    <p>Senhas estão diferentes! - Tente novamente!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['Senha_dife']);
            ?>

            <?php
            if (isset($_SESSION['Senha_branco'])) :
            ?>
                <div class="notification is-danger">
                    <p>Email e/ou Senha em branco! - Tente novamente!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['Senha_branco']);
            ?>

            <?php
            if (isset($_SESSION['JaVinculado'])) :
            ?>
                <div class="notification is-danger">
                    <p>Email já está vinculado a um usuario! Tente outro Email!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['JaVinculado']);
            ?>

            <div class="input-field">
                <input type="text" name="Name" placeholder="Insira o nome de usuario" />
                <div class="underline"></div>
            </div>

            <div class="input-field">
                <input type="email" name="Email" placeholder="Insira o seu E-mail" />
                <div class="underline"></div>
            </div>

            <div class="input-field">
                <input type="password" name="Password" placeholder="Insira a sua Senha" />
                <div class="underline"></div>
            </div>

            <div class="input-field">
                <input type="password" name="Password2" placeholder="Insira a sua Senha Novamente" />
                <div class="underline"></div>
            </div>

            <button type="submit" name="cadastrar" value="Cadastrar" id="Registrar">Registrar</button>
        </form>

        <div class="RegistroToLogin">
            <p class="possui">Já possui uma conta?</p>
            <a href="index.php">Clique aqui para fazer login</a>
        </div>

    </main>
</body>

</html>