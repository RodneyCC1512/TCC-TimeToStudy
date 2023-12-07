<?php
session_start();
include_once("conexao.php");

$Chave = $_GET['chave'];

if (!empty($Chave)) {
    $sqlUsuarioID = "SELECT usuario_id FROM usuario WHERE chave = '{$Chave}'";
    $resultUsuarioID = mysqli_query($conexao, $sqlUsuarioID);
    $row = mysqli_num_rows($resultUsuarioID);

    $user_data = mysqli_fetch_assoc($resultUsuarioID);

    if ($row == 1) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = mysqli_real_escape_string($conexao, $_POST['password']);
            
            if ($password != null) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $sqlAlter = "UPDATE usuario SET senha = '{$passwordHash}' WHERE usuario_id = $user_data[usuario_id]";
                $resultado = mysqli_query($conexao, $sqlAlter);
                mysqli_close($conexao);

                $_SESSION['SenhaNova'] = true;
                header('Location: index.php');
                exit();
            } else {
                $_SESSION['Senha_branco'] = true;
            }
        }
    } else {
        $_SESSION['PreencherSenha'] = true;
        header('Location: Recuperacao.php');
        exit();
    }
} else {
    $_SESSION['PreencherSenha'] = true;
    header('Location: Recuperacao.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSs/RegToLogin.css">
    <link rel="stylesheet" href="CSSs/Alerta.css">
    <title>Recuperar senha</title>
</head>

<body>
    <main class="container">
        <h1>Redefina sua senha</h1>
        <h3>Cadastre a senha nova</h3>
        <form action="" method="POST">
            <?php
            if (isset($_SESSION['Senha_branco'])) :
            ?>
                <div class="notification is-danger">
                    <p>A nova senha não pode ser em branco - Preencha adequadamente!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['Senha_branco']);
            ?>

            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Nova senha">
                <div class="underline"></div>
            </div>
            <input type="submit" id="Registrar" value="Alterar">
        </form>
        <div class="RegistroToLogin">
            <p class="possui">Já possui uma conta?</p>
            <a href="index.php">Clique aqui para fazer login</a>
        </div>

    </main>
</body>

</html>