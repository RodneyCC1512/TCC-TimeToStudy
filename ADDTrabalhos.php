<?php
session_start();
require_once('conexao.php');

if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $dataEntrega = $_POST['dataEntrega'];
    $materia = $_POST['materia'];
    $user_id = $_SESSION['user_id'];


    $sql = "INSERT INTO trabalhos (Titulo, DataEntrega, Materia, usuario_id) VALUES ('$titulo', '$dataEntrega', '$materia', $user_id)";
    if ($conexao->query($sql) === TRUE) {
        header("location: TelaAtividades.php");
    } else {
        echo "Erro ao registrar o trabalho: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSSs/ADDativLemb.css">
    <link rel="stylesheet" href="CSSs/style.css" />
    <title>Registrar Trabalhos</title>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li><a href="home.php">Home</a></li>
                <li><a href="horario.php">Horários</a></li>
                <li><a href="TelaAtividades.php">Trabalhos</a></li>
                <li><a href="TelaLembretes.php">Lembretes</a></li>
                <li><a href="Perfil.php">Perfil</a></li>
                <li><a href="Sobrenos.php">Sobre nós</a></li>
                <li><a href="sair.php">Sair</a></li>
            </ul>
            <h1 class="logo">Time to Study</h1>
        </div>
    </nav>

    <main class="container">
        <div class="Centralizar">
            <div class="TabelaFuction">
                <h1>Registro de Trabalhos</h1>

                <form method="post" action="">

                    <div class="input-field">
                        <input type="text" name="titulo" placeholder="Insira o título do trabalho" required><br>
                        <div class="underline"></div>
                    </div>

                    <div class="input-field">
                        <input type="date" name="dataEntrega" placeholder="Insira a data de entrega do trabalho" required><br>
                        <div class="underline"></div>
                    </div>

                    <div class="input-field">
                        <input type="text" name="materia" placeholder="Insira a matéria do trabalho" required><br>
                        <div class="underline"></div>
                    </div>

                    <input type="submit" name="update" id="update" value="Registrar Trabalho"><br>
                    <a id="voltar" href="TelaAtividades.php">Voltar</a>
                </form>
            </div>

        </div>

    </main>


</body>

</html>