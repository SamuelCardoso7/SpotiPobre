<?php

require_once __DIR__ . '/../models/MinhasMusicas.php';

$musicaModel = new Musica();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = (int)$_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    if (trim($_POST['nome'])) {
        $musicaModel->Editar($id, $nome, $descricao);
        header('Location: ../views/MinhasMusicas.php');
        exit;
    }
}

$id = $_GET['id'] ?? null;

if (!$id) {
    die('Música não encontrada.');
}

$musica = $musicaModel->buscarPorId($id);

if (!$musica) {
    die('Música não encontrada.');
}

require_once __DIR__ . '/../views/EditarMusica.php';
