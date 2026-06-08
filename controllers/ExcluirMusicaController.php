<?php

require_once __DIR__ . '/../models/MinhasMusicas.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die('Música não encontrada.');
}

$musicaModel = new Musica();

$musicaModel->Excluir($id);

header('Location: ../views/MinhasMusicas.php');
exit;