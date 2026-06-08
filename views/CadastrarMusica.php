<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ./views/login.php");
    exit();
}

require_once '../controllers/CadastrarMusicaController.php';

$controller = new MusicasController();
$controller->CadastrarMusica();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SpotiPobre</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
    <a href="../index.php">
        Início
    </a>
    <a href="MinhasMusicas.php">
        Voltar
    </a>

    <form method="POST">
        <label class="">Nome</label>
        <input type="text" name="nomeMusica" placeholder="Nome">
        <label class="">Descrição</label>
        <input type="text" name="descMusica" placeholder="Descrição">
        <button type="submit">Enviar</button>
    </form>
    </div>
</body>

</html>