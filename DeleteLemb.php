<?php
session_start();

//Vereficação se o usuario esta logado
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
}

//Verificação se o lembrete requisitado para deletar é um lembrete dentro do banco de dados
if (!empty($_GET['id'])) {
    include_once('conexao.php');

    //Pegar o ID da URL - ID vem do usuario clicar em deletar lembrete
    $id = $_GET['id'];

    //SQL para usar na verificação entre ID do usuario na sessão com o 'usuario_id' atrelado ao lembrete
    $sqlVerific = "SELECT usuario_id FROM Lembretes WHERE lembrete_id = '{$id}'";
    $resultVerific = $conexao->query($sqlVerific);

    if ($resultVerific->num_rows > 0) {
        while ($verific = mysqli_fetch_assoc($resultVerific)) {
            $LembreteUserID = $verific['usuario_id'];

            //Verificação se o usuario que esta fazendo a edição é o usario a qual o lembrete esta atrelado
            if ($LembreteUserID == $_SESSION['user_id']) {

                $sqlSelect = "SELECT * FROM Lembretes WHERE lembrete_id = '{$id}'";
                $result = $conexao->query($sqlSelect);

                if ($result->num_rows > 0) {
                    $sqlDelete = "DELETE FROM Lembretes WHERE lembrete_id = '{$id}'";
                    $resultDelete = $conexao->query($sqlDelete);
                    header('Location: TelaLembretes.php');
                } else {
                    header('Location: TelaLembretes.php');
                }
            } else {
                header('Location: TelaLembretes.php');
            }
        }
    } else {
        header('Location: TelaLembretes.php');
    }
} else {
    header('Location: TelaLembretes.php');
}
