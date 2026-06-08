<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: views/login.php");
    exit;
}

require_once './controllers/dashboardcontroller.php';

$controller = new DashboardController();
$controller->index();