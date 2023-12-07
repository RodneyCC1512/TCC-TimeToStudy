<?php
include('VerificaLogin.php');
include_once('conexao.php');
$user_id = $_SESSION['user_id'];

/*Código para pegar os dados dos lembretes do banco de dados*/
$sql = "SELECT lembrete_id, Titulo, Conteudo, usuario_id FROM lembretes WHERE usuario_id = '{$user_id}'";
$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSs/TabelaLemb.css">
    <link rel="stylesheet" href="CSSs/style.css" />
    <title>Lembretes</title>

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
            <div class="Tabela">
                <h1>Lista de Lembretes</h1>
                <table class="TabelaLembretes">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Conteudo</th>
                            <th>...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div>
                            <?php
                            while ($user_data = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $user_data['Titulo'] . "</td>";
                                echo "<td class='conteudo'>" . $user_data['Conteudo'] . "</td>";
                                echo "<td>
                                    <a class = 'btn editar' href='EditLemb.php?id=$user_data[lembrete_id]'>Editar</a>
                                    <a class = 'btn excluir' href='DeleteLemb.php?id=$user_data[lembrete_id]'>Excluir</a>
                                </td>";
                                echo "</tr>";
                            }
                            ?>
                        </div>

                    </tbody>
                </table>

                <a href="ADDLembretes.php" class="botao-adicionar">Adicionar lembrete</a>
            </div>
        </div>

    </div>
</body>

</html>