<?php
session_start();
// Verificar se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    header("location: index.php"); // Redirecionar para a página de login
    exit();
}
?>