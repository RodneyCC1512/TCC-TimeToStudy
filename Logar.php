<?php
session_start();
include_once("conexao.php");

if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['PreencherL'] = true;
    header('Location: index.php');
    exit();
}


$email = mysqli_real_escape_string($conexao, $_POST['email']);
$password = mysqli_real_escape_string($conexao, $_POST['password']);

$sql = "SELECT * FROM usuario WHERE email = '{$email}'";
$result = mysqli_query($conexao, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row && password_verify($password, $row['senha'])) {
        $_SESSION['user_id'] = $row['usuario_id'];

        if ($row['sits_usuario_id'] == 1) {
            header("location: home.php");
            exit();
        } else {
            $_SESSION['Nverificou'] = true;
            header('Location: index.php');
            exit();
        }
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    }
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}
