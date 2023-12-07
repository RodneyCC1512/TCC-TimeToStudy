<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/vendor/autoload.php';


session_start();
include_once("conexao.php");
/*........../Sistema de Verificação de tentativa de entrar no documento sem informar os dados no formulario/..........*/
if (empty($_POST['Email']) || empty($_POST['Password']) || empty($_POST['Name'])) {
    $_SESSION['Senha_branco'] = true;
    header('Location: TelaRegistro.php');
    exit();
}

$Nome = mysqli_real_escape_string($conexao, $_POST['Name']);
$Email = mysqli_real_escape_string($conexao, $_POST['Email']);
$Senha = mysqli_real_escape_string($conexao, $_POST['Password']);
$SenhaR = mysqli_real_escape_string($conexao, $_POST['Password2']);

$Senha_hash = password_hash($Senha, PASSWORD_DEFAULT);
$Chave = password_hash($Email . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);

$query = "SELECT email FROM usuario WHERE email = '{$Email}'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

/*........../Sistema de verificação de email vinculado a um usuario existente/..........*/
if ($row == 1) {

    $_SESSION['JaVinculado'] = true;
    header('Location: TelaRegistro.php');
    exit();
} else {
    /*........../Verificaçao de senha/..........*/
    if ($SenhaR == $Senha) {

        $sql = "INSERT INTO usuario (usuario, email, senha, chave) VALUES ('$Nome','$Email','$Senha_hash','$Chave')";
        $resultado = mysqli_query($conexao, $sql);
        mysqli_close($conexao);

        $mail = new PHPMailer(true);

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
            $mail->addAddress($_POST['Email'], $_POST['Name']);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Confirmação de E-mail';
            $mail->Body    = "Olá " . $_POST['Name'] . "!<br><br>Agradecemos pelo seu cadastro, para finalizar o cadastro é necessário a verificação de E-mail, para finalizar a verificação clique no link abaixo.<br><br><a href='http://localhost/TCCMaisAtualizado/confirmar.php?chave=$Chave'>Clique aqui para finalizar o cadastro</a><br><br>";
            $mail->AltBody = "Olá " . $_POST['Name'] . "!/n/nAgradecemos pelo seu cadastro, para finalizar o cadastro é necessário a verificação de E-mail, para finalizar a verificação clique no link abaixo./n/n http://localhost/TCCMaisAtualizado/confirmar.php?chave=$Chave Clique aqui para finalizar o cadastro</a>/n/n";

            $mail->send();

            $_SESSION['Verificacao'] = true;
            header('Location: TelaRegistro.php');
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        /*........../Caso a senha der diferente o site volta para pagina de Registro/..........*/
        $_SESSION['Senha_dife'] = true;
        header('Location: TelaRegistro.php');
        exit();
    }
}
