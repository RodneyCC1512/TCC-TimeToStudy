<?php
include_once("conexao.php");
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Redirecionar para a página de login se o usuário não estiver logado
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dias_da_semana = $_POST["dia_semana"];
    $horario_inicio = $_POST["horario_inicio"];
    $horario_fim = $_POST["horario_fim"];
    $materia = $_POST["materia"];
    $user_id = $_SESSION['user_id'];

    // Inserir os dados na tabela do banco de dados
    for ($i = 0; $i < count($horario_inicio); $i++) {
        $dia_da_semana = $dias_da_semana;
        $inicio = $horario_inicio[$i];
        $fim = $horario_fim[$i];
        $materia_aula = $materia[$i];

        $sql = "INSERT INTO horario_escolar (usuario_id, dia_da_semana, horario_inicio, horario_fim, materia)  VALUES ('$user_id','$dia_da_semana', '$inicio', '$fim', '$materia_aula')";
        if ($conexao->query($sql) !== TRUE) {
            echo "Erro ao inserir dados: " . $conexao->error;
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSs/RegHorario.css">
    <link rel="stylesheet" href="CSSs/style.css">
    <title>Horário Escolar</title>
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

    <div style='padding-top: 50px;' class="container">
        <div class="conteudo">

            <h1>Horário Escolar</h1>
            <form method="post" action="">

                <label for="dia_semana">Dia da Semana:</label>
                <select name="dia_semana" id="dia_semana">
                    <option value="SEGUNDA">Segunda-feira</option>
                    <option value="TERÇA">Terça-feira</option>
                    <option value="QUARTA">Quarta-feira</option>
                    <option value="QUINTA">Quinta-feira</option>
                    <option value="SEXTA">Sexta-feira</option>
                    <option value="SÁBADO">Sábado</option>
                    <option value="DOMINGO">Domingo</option>
                </select>
                <table>
                    <tr>
                        <th>Horário de Início</th>
                        <th>Horário de Término</th>
                        <th>Matéria</th>
                    </tr>
                    <?php
                    for ($i = 1; $i <= 7; $i++) {
                        echo "<tr>";
                        echo '<td><input type="time" name="horario_inicio[]" class ="time"></td>';
                        echo '<td><input type="time" name="horario_fim[]" class ="time"></td>';
                        echo '<td><input type="text" name="materia[]" class ="materia"></td>';
                        echo "</tr>";
                    }
                    ?>
                </table>
                <input type="submit" value="Enviar Horário">
            </form>

        </div>

    </div>

</body>

</html>