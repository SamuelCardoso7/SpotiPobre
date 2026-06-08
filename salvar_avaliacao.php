<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: views/login.php');
    exit;
}

require_once 'models/AvaliacaoModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_musica   = (int)$_POST['musica_id'];
    $nota        = (int)$_POST['nota'];
    $comentario  = trim($_POST['comentario']);
    $id_usuario  = $_SESSION['id'];

    if ($id_musica > 0 && $nota >= 1 && $nota <= 5 && !empty($comentario)) {
        $avaliacaoModel = new AvaliacaoModel();
        
        if ($avaliacaoModel->salvarAvaliacao($id_usuario, $id_musica, $nota, $comentario)) {
            $_SESSION['sucesso'] = "Avaliação salva com sucesso!";
        } else {
            $_SESSION['erro'] = "Erro ao salvar avaliação.";
        }
    } else {
        $_SESSION['erro'] = "Dados inválidos.";
    }
}

header('Location: index.php');
exit;