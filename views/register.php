<?php
session_start();

require_once '../controllers/AuthController.php';

$auth = new AuthController();
$auth->register();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - SpotiPobre</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

    <h1>SpotiPobre</h1>
    <h2>Criar Conta</h2>

    <?php if(isset($_SESSION['erro'])): ?>
        <div class="alert erro">
            <?= $_SESSION['erro']; ?>
        </div>
        <?php unset($_SESSION['erro']); ?>
    <?php endif; ?>

    <form method="POST">

        <input
            type="text"
            name="nome"
            placeholder="Digite seu nome"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Digite seu email"
            required
        >

        <input
            type="password"
            name="senha"
            placeholder="Crie uma senha"
            required
        >

        <button type="submit">
            Criar Conta
        </button>

    </form>

    <a href="login.php">
        Já possui conta? Entrar
    </a>

</div>

</body>
</html>