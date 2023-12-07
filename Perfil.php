<?php
require_once('conexao.php');
include('VerificaLogin.php');
$user_id = $_SESSION['user_id'];

$sqlUser = "SELECT * FROM usuario WHERE usuario_id = $user_id";
$resultUser = mysqli_query($conexao, $sqlUser);
$userData = mysqli_fetch_assoc($resultUser);

// Consulta para obter a quantidade de trabalhos cadastrados pelo usuário
$sqlTrabalhos = "SELECT COUNT(*) as quantidade FROM trabalhos WHERE usuario_id = $user_id";
$resultTrabalhos = mysqli_query($conexao, $sqlTrabalhos);
$quantidadeTrabalhos = mysqli_fetch_assoc($resultTrabalhos)['quantidade'];

// Consulta para obter a quantidade de lembretes cadastrados pelo usuário
$sqlLembretes = "SELECT COUNT(*) as quantidade FROM lembretes WHERE usuario_id = $user_id";
$resultLembretes = mysqli_query($conexao, $sqlLembretes);
$quantidadeLembretes = mysqli_fetch_assoc($resultLembretes)['quantidade'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSs/Perfil.css">
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
    <div class="Centralizar">
        <div class="profile-container">
            <img class="profile-image" src="user.png" alt="Foto do Usuário">

            <div class="profile-info">
                <h2><?php echo $userData['usuario']; ?></h2>
                <p><?php echo $userData['email']; ?></p>
            </div>

            <div class="profile-stats">
                <h3>Estatísticas</h3>
                <table>
                    <tr>
                        <th>Trabalhos</th>
                        <th>Lembretes</th>
                    </tr>
                    <tr>
                        <td><?php echo $quantidadeTrabalhos; ?></td>
                        <td><?php echo $quantidadeLembretes; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


</body>

</html>