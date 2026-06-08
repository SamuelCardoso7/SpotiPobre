<?php
session_start();

// Se o usuário NÃO estiver logado, redireciona para o login
if (!isset($_SESSION['id'])) {
    header("Location: views/login.php");
    exit;
}

require_once './controllers/dashboardcontroller.php';

$controller = new DashboardController();
$controller->index();