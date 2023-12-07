<?php
include('VerificaLogin.php');
include_once('conexao.php');
$user_id = $_SESSION['user_id'];

/*Código para pegar os dados dos trabalhos do banco de dados*/
$sqlTrabalhos = "SELECT trabalho_id,Titulo, Materia, usuario_id, DATE_FORMAT(DataEntrega, '%d/%m/%Y') AS data_formatada FROM trabalhos WHERE usuario_id = '{$user_id}'";
$resultTrabalhos = $conexao->query($sqlTrabalhos);

/*Código para pegar os dados dos lembretes do banco de dados*/
$sqlLembretes = "SELECT lembrete_id, Titulo, Conteudo, usuario_id FROM lembretes WHERE usuario_id = '{$user_id}'";
$resultLembretes = $conexao->query($sqlLembretes);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="CSSs/style.css" />
  <link rel="stylesheet" href="CSSs/Home.css">
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

  <section class="container">
    <div class="conteudo">

      <div class="LocalHorario scroll-vertical">
        <table>
          <thead>
            <tr>
              <th>Horário - Matu</th>
              <th>DOMINGO</th>
              <th>SEGUNDA</th>
              <th>TERÇA</th>
              <th>QUARTA</th>
              <th>QUINTA</th>
              <th>SEXTA</th>
              <th>SÁBADO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>7:20 às 8:05</td>
              <td></td>
              <td>Rep. Banco</td>
              <td>Rep. Banco</td>
              <td>Matemática</td>
              <td>Química</td>
              <td>Programação 2</td>
              <td></td>
            </tr>
            <tr>
              <td>8:05 às 8:50</td>
              <td></td>
              <td>Rep. Banco</td>
              <td>Sociologia</td>
              <td>Biologia</td>
              <td>P13</td>
              <td>Programação 2</td>
              <td></td>
            </tr>
            <tr>
              <td>8:50 às 9:35</td>
              <td></td>
              <td>ADM de redes</td>
              <td>Sociologia</td>
              <td>Biologia</td>
              <td>P13</td>
              <td>Quimica</td>
              <td></td>
            </tr>
            <tr>
              <td>9:35 às 9:50</td>
              <td></td>
              <td>INTERVALO</td>
              <td>INTERVALO</td>
              <td>INTERVALO</td>
              <td>INTERVALO</td>
              <td>INTERVALO</td>
              <td></td>
            </tr>
            <tr>
              <td>9:50 às 10:35</td>
              <td></td>
              <td>Fisica</td>
              <td>Geografia</td>
              <td>Programação</td>
              <td>Empreendedorismo</td>
              <td>Educação Física</td>
              <td></td>
            </tr>
            <tr>
              <td>10:35 às 11:20</td>
              <td></td>
              <td>Fisica</td>
              <td>Geografia</td>
              <td>Programação</td>
              <td>Empreendedorismo</td>
              <td>Educação Física</td>
              <td></td>
            </tr>

          </tbody>
        </table>
        <br>
        <table>
          <thead>
            <tr>
              <th>Horário - Vesp</th>
              <th>DOMINGO</th>
              <th>SEGUNDA</th>
              <th>TERÇA</th>
              <th>QUARTA</th>
              <th>QUINTA</th>
              <th>SEXTA</th>
              <th>SÁBADO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>7:20 às 8:05</td>
              <td></td>
              <td>Rep. Banco</td>
              <td>Rep. Banco</td>
              <td>Matemática</td>
              <td>Química</td>
              <td>Programação 2</td>
              <td></td>
            </tr>
            <tr>
              <td>8:05 às 8:50</td>
              <td></td>
              <td>Rep. Banco</td>
              <td>Sociologia</td>
              <td>Biologia</td>
              <td>P13</td>
              <td>Programação 2</td>
              <td></td>
            </tr>
            <tr>
              <td>8:50 às 9:35</td>
              <td></td>
              <td>ADM de redes</td>
              <td>Sociologia</td>
              <td>Biologia</td>
              <td>P13</td>
              <td>Quimica</td>
              <td></td>
            </tr>
            <tr>
              <td>9:35 às 9:50</td>
              <td></td>
              <td>INTERVALO</td>
              <td>INTERVALO</td>
              <td>INTERVALO</td>
              <td>INTERVALO</td>
              <td>INTERVALO</td>
              <td></td>
            </tr>
            <tr>
              <td>9:50 às 10:35</td>
              <td></td>
              <td>Fisica</td>
              <td>Geografia</td>
              <td>Programação</td>
              <td>Empreendedorismo</td>
              <td>Educação Física</td>
              <td></td>
            </tr>
            <tr>
              <td>10:35 às 11:20</td>
              <td></td>
              <td>Fisica</td>
              <td>Geografia</td>
              <td>Programação</td>
              <td>Empreendedorismo</td>
              <td>Educação Física</td>
              <td></td>
            </tr>

          </tbody>
        </table>
      </div>

      <div class="LocalLembretes scroll-horizontal">
        <?php
        while ($user_dataLemb = mysqli_fetch_assoc($resultLembretes)) {
          echo "<div class= 'DivLembretes'>";
          echo "<p class ='dadosLembretes'>" . $user_dataLemb['Titulo'] . "</p>";
          echo "<p class ='dadosLembretes'>" . $user_dataLemb['Conteudo'] . "</p>";
          echo "</div>";
        }
        ?>
      </div>

      <div class="LocalAtividades scroll-horizontal">
        <?php
        while ($user_data = mysqli_fetch_assoc($resultTrabalhos)) {
          echo "<div class= 'DivTrabalho'>";
          echo "<p class ='dadosTrabalhos'>" . $user_data['Titulo'] . "</p>";
          echo "<p class ='dadosTrabalhos'>" . $user_data['data_formatada'] . "</p>";
          echo "<p class ='dadosTrabalhos'>" . $user_data['Materia'] . "</p>";
          echo "</div>";
        }
        ?>
      </div>

    </div>
  </section>

</body>
<!-- .................../ JS para navbar ir com o scroll do mouse /...................... -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("a").on("click", function(event) {
      if (this.hash !== "") {
        event.preventDefault();

        var hash = this.hash;

        $("html, body").animate({
            scrollTop: $(hash).offset().top,
          },
          800,
          function() {
            window.location.hash = hash;
          }
        );
      } 

    });
  });
</script>

</html>