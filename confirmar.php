<?php
session_start();
include_once("conexao.php");

$Chave = $_GET['chave'];

if (!empty($Chave)) {

    $sqlUsuario = "SELECT usuario_id FROM usuario WHERE chave = '{$Chave}'";
    $resultUsuario= $conexao->query($sqlUsuario);

    $user_data = mysqli_fetch_assoc($resultUsuario);

    if ($resultUsuario == 1) {

        $sql = "UPDATE usuario SET sits_usuario_id = 1 WHERE usuario_id = $user_data[usuario_id]";
        $resultado = mysqli_query($conexao, $sql);
        mysqli_close($conexao);

        $_SESSION['Verificado'] = true;
        header('Location: index.php');
        exit();
    }else{
        $_SESSION['ErroVerificar'] = true;
        header('Location: TelaRegistro.php');
        exit();
    }
} else {
    $_SESSION['ErroVerificar'] = true;
    header('Location: TelaRegistro.php');
    exit();
}
