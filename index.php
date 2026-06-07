<?php

session_start();

if(!isset($_SESSION['id']))
{
    header("Location: ./views/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>

<h1>
    Bem-vindo,
    <?= $_SESSION['nome']; ?>
</h1>

<p>Você está logado no SpotiPobre.</p>

<a href="logout.php">
    Sair
</a>

</body>

</html>