<?php
session_start();

//Vereficação se o usuario esta logado
if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
    exit();
}

//Verificação se o trabalho requisitado para edição é um trabalho dentro do banco de dados
if (!empty($_GET['id'])) {
    include_once('conexao.php');

    //Pegar o ID da URL - ID vem do usuario clicar em editar trabalho
    $id = $_GET['id'];

    //SQL para usar na verificação entre ID do usuario na sessão com o 'usuario_id' atrelado ao trabalho
    $sqlVerific = "SELECT usuario_id FROM trabalhos WHERE trabalho_id = '{$id}'";
    $resultVerific = $conexao->query($sqlVerific);

    if ($resultVerific->num_rows > 0) {
        while ($verific = mysqli_fetch_assoc($resultVerific)) {
            $TrabalhoUserID = $verific['usuario_id'];

            //Verificação se o usuario que esta fazendo a edição é o usario a qual o trabalho esta atrelado
            if ($TrabalhoUserID == $_SESSION['user_id']) {

                //SQL que responsavel por pegar os dados de dentro do banco de dados para atribuir a edição do trabalho
                $sqlSelect = "SELECT trabalho_id, usuario_id, Titulo, Materia, DATE_FORMAT(DataEntrega, '%d/%m/%Y') AS data_formatada,  DATE_FORMAT(DataEntrega, '%Y-%m-%d') AS data_formatada1 FROM trabalhos WHERE trabalho_id = '{$id}'";
                $result = $conexao->query($sqlSelect);

                if ($result->num_rows > 0) {
                    while ($user_data = mysqli_fetch_assoc($result)) {
                        $tituloTrabalho = $user_data['Titulo'];
                        $DatatrabalhoAnterior = $user_data['data_formatada'];
                        $DATAEntrega = $user_data['data_formatada1'];
                        $MateriaTrabalho = $user_data['Materia'];
                    }
                } else {
                    header('Location: TelaAtividades.php');
                }
            } else {
                header("Location: TelaAtividades.php");
            }
        }
    } else {
        header('Location: TelaAtividades.php');
    }
} else {
    header('Location: TelaAtividades.php');
}

//Receber os novos valores do trabalho
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $dataEntrega = $_POST['dataEntrega'];
    $materia = $_POST['materia'];
    $user_id = $_SESSION['user_id'];

    $sqlUpdate = "UPDATE trabalhos SET Titulo ='$titulo', DataEntrega ='$dataEntrega', Materia ='$materia' WHERE trabalho_id ='$id'";
    if ($conexao->query($sqlUpdate) === TRUE) {
        header("location: TelaAtividades.php");
    } else {
        echo "Erro ao atualizar o trabalho: " . $conexao->error;
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
    <title>Editar - Trabalho</title>
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
                <h1>Edição de Trabalho</h1>
                <form method="post" action="">

                    <div class="input-field">
                    <input type="text" name="titulo" required value="<?php echo $tituloTrabalho ?>"><br>
                        <div class="underline"></div>
                    </div>

                    <div class="input-field">
                    <label for="DataEntregaAntiga"><?php echo "Data de Entrega anterior: " . $DatatrabalhoAnterior ?></label><br>
                    <input type="date" name="dataEntrega" required value="<?php echo $DATAEntrega ?>"><br>
                        <div class="underline"></div>
                    </div>

                    <div class="input-field">
                    <input type="text" name="materia" required value="<?php echo $MateriaTrabalho ?>"><br>
                        <div class="underline"></div>
                    </div>

                    <input type="submit" id="update" value="Atualizar Trabalho">
                    <a id="voltar" href="TelaAtividades.php">Voltar</a>
                </form>
            </div>
        </div>



    </div>

</body>

</html>