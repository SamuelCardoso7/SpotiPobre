<?php
session_start();

require_once '../controllers/AuthController.php';

$auth = new AuthController();
$auth->login();
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

    <h1>SpotiPobre</h1>
    <h2>Entrar</h2>

    <?php if(isset($_SESSION['erro'])): ?>
        <div class="alert erro">
            <?= $_SESSION['erro']; ?>
        </div>
        <?php unset($_SESSION['erro']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['sucesso'])): ?>
        <div class="alert sucesso">
            <?= $_SESSION['sucesso']; ?>
        </div>
        <?php unset($_SESSION['sucesso']); ?>
    <?php endif; ?>

    <form method="POST">

        <input
            type="email"
            name="email"
            placeholder="Digite seu email"
            required
        >

        <input
            type="password"
            name="senha"
            placeholder="Digite sua senha"
            required
        >

        <button type="submit">
            Entrar
        </button>

    </form>

    <a href="register.php">
        Não possui conta? Cadastre-se
    </a>

</div>

</body>
</html>