<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/vendor/autoload.php';

session_start();
include_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];

    $sql = "SELECT * FROM usuario WHERE email = '{$email}'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_num_rows($result);

    if ($row == 1) {
        $mail = new PHPMailer(true);
        $rows = mysqli_fetch_assoc($result);
        $nome = $rows['usuario'];
        $Chave = $rows['chave'];

        try {
            //Server settings
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host       = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'f14d919c89c912';
            $mail->Password   = 'eae282c6a8a1b4';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 2525;

            //Recipients - setFrom('Email da conta que ira enviar os email's para a verificação', 'Nome para apresentação do email')
            $mail->setFrom('caviliacechelerorodney@gmail.com', 'Rodney');
            $mail->addAddress($email, $nome);

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Recuperação de senha';
            $mail->Body    = "Olá " . $nome . "!<br><br>Se você esta recebendo essa mensagem é porque foi requisitado a alteração de senha para sua conta.<br><br>Caso não se lembre dessa ação apenas desconsidere essa mensagem ou troque a senha de sua conta para garantir.<br><br><a href='http://localhost/TCCMaisAtualizado/Recuperar.php?chave=$Chave'>Clique aqui para mudar sua senha</a><br><br>";
            $mail->AltBody = "Olá " . $nome . "!/n/nSe você esta recebendo essa mensagem é porque foi requisitado a alteração de senha para sua conta./n/nCaso não se lembre dessa ação apenas desconsidere essa mensagem ou troque a senha de sua conta para garantir./n/n http://localhost/TCCMaisAtualizado/Recuperar.php?chave=$Chave Clique aqui para mudar sua senha</a>/n/n";

            $mail->send();

            $_SESSION['Verificacao'] = true;
            header("location: recuperacao.php");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['EmailSemUsuario'] = true;
    }
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
        <h1>Com problemas?</h1>
        <h3>Redefina sua senha</h3>
        <form action="" method="POST">

            <?php
            if (isset($_SESSION['PreencherSenha'])) :
            ?>
                <div class="notification is-danger">
                    <p>Caso queira mudar sua senha use este formulario!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['PreencherSenha']);
            ?>

            <?php
            if (isset($_SESSION['EmailSemUsuario'])) :
            ?>
                <div class="notification is-danger">
                    <p>Email não encontrado - Verifique e tente novamente!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['EmailSemUsuario']);
            ?>

            <?php
            if (isset($_SESSION['Verificacao'])) :
            ?>
                <div class="notification is-success">
                    <p>Email enviado - Acesse seu Email para continuar!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['Verificacao']);
            ?>

            <div class="input-field">
                <input type="email" name="Email" id="Email" placeholder="Email da conta para recuperar">
                <div class="underline"></div>
            </div>
            <input type="submit" id="Logar" value="Enviar">
        </form>
        <div class="RegistroToLogin">
            <p class="possui">Já possui uma conta?</p>
            <a href="index.php">Clique aqui para fazer login</a>
        </div>

    </main>
</body>

</html>