<?php
session_start();

//Vereficação se o usuario esta logado
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
}

//Verificação se o lembrete requisitado para edição é um lembrete dentro do banco de dados
if (!empty($_GET['id'])) {
    include_once('conexao.php');

    //Pegar o ID da URL - ID vem do usuario clicar em editar lembrete
    $id = $_GET['id'];

    //SQL para usar na verificação entre ID do usuario na sessão com o 'usuario_id' atrelado ao lembrete
    $sqlVerific = "SELECT usuario_id FROM Lembretes WHERE lembrete_id = '{$id}'";
    $resultVerific = $conexao->query($sqlVerific);

    if ($resultVerific->num_rows > 0) {
        while ($verific = mysqli_fetch_assoc($resultVerific)) {
            $LembreteUserID = $verific['usuario_id'];

            //Verificação se o usuario que esta fazendo a edição é o usario a qual o lembrete esta atrelado
            if ($LembreteUserID == $_SESSION['user_id']) {

                //SQL responsavel por pegar os dados de dentro do banco de dados para atribuir a edição do lembrete
                $sqlSelect = "SELECT lembrete_id, usuario_id, Titulo, Conteudo FROM Lembretes WHERE lembrete_id = '{$id}'";
                $result = $conexao->query($sqlSelect);

                if ($result->num_rows > 0) {
                    while ($user_data = mysqli_fetch_assoc($result)) {
                        $tituloLembrete = $user_data['Titulo'];
                        $ConteudoLembrete = $user_data['Conteudo'];
                    }
                } else {
                    header('Location: TelaLembretes.php');
                }
            } else {
                header("Location: TelaLembretes.php");
            }
        }
    } else {
        header('Location: TelaLembretes.php');
    }
} else {
    header('Location: TelaLembretes.php');
}

//Receber os novos valores do lembrete
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $user_id = $_SESSION['user_id'];

    $sqlUpdate = "UPDATE Lembretes SET Titulo ='$titulo', Conteudo ='$conteudo' WHERE lembrete_id ='$id'";
    if ($conexao->query($sqlUpdate) === TRUE) {
        header("location: TelaLembretes.php");
    } else {
        echo "Erro ao atualizar o lembrete: " . $conexao->error;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSs/ADDativLemb.css">
    <link rel="stylesheet" href="CSSs/style.css" />
    <title>Editar - lembrete</title>
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

    <div class="container">
        <div class="Centralizar">
            <div class="TabelaFuction">
                <h1>Edição de lembrete</h1>
                <form method="post" action="">

                    <div class="input-field">
                        <input type="text" name="titulo" value="<?php echo $tituloLembrete ?>" required><br>
                        <div class="underline"></div>
                    </div>

                    <div class="input-field">
                        <input type="text" name="conteudo" value="<?php echo $ConteudoLembrete ?>" required><br>
                        <div class="underline"></div>
                    </div>

                    <input type="submit" id="update" value="Atualizar lembrete">
                    <a id="voltar" href="TelaLembretes.php">Voltar</a>
                </form>
            </div>
        </div>



    </div>

</body>

</html>