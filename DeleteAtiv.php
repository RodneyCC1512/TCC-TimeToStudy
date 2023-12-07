<?php
session_start();

//Vereficação se o usuario esta logado
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
}

//Verificação se o trabalho requisitado para deletar é um trabalho dentro do banco de dados
if (!empty($_GET['id'])) {
    include_once('conexao.php');

    //Pegar o ID da URL - ID vem do usuario clicar em deletar trabalho
    $id = $_GET['id'];

    //SQL para usar na verificação entre ID do usuario na sessão com o 'usuario_id' atrelado ao trabalho
    $sqlVerific = "SELECT usuario_id FROM trabalhos WHERE trabalho_id = '{$id}'";
    $resultVerific = $conexao->query($sqlVerific);

    if ($resultVerific->num_rows > 0) {
        while ($verific = mysqli_fetch_assoc($resultVerific)) {
            $TrabalhoUserID = $verific['usuario_id'];

            //Verificação se o usuario que esta fazendo a edição é o usario a qual o trabalho esta atrelado
            if ($TrabalhoUserID == $_SESSION['user_id']) {

                $sqlSelect = "SELECT * FROM trabalhos WHERE trabalho_id = '{$id}'";
                $result = $conexao->query($sqlSelect);

                if ($result->num_rows > 0) {
                    $sqlDelete = "DELETE FROM trabalhos WHERE trabalho_id = '{$id}'";
                    $resultDelete = $conexao->query($sqlDelete);
                    header('Location: TelaAtividades.php');
                } else {
                    header('Location: TelaAtividades.php');
                }
            } else {
                header('Location: TelaAtividades.php');
            }
        }
    } else {
        header('Location: TelaAtividades.php');
    }
} else {
    header('Location: TelaAtividades.php');
}
