<?php

session_start();

require_once __DIR__ . '/../models/MinhasMusicas.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $idUsuario = $_SESSION['id'];

    $musicaModel = new Musica();

    $musicaModel->Cadastrar(
        $nome,
        $descricao,
        $idUsuario
    );

    header('Location: ../views/MinhasMusicas.php');
    exit;
}

require_once __DIR__ . '/../views/CadastrarMusica.php';