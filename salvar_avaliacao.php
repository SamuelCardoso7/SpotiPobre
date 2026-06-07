<?php
session_start();

// Ativar exibição de erros para debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h3>Salvando Avaliação...</h3>"; // debug temporário

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $musica_id = isset($_POST['musica_id']) ? (int)$_POST['musica_id'] : 0;
    $nota      = isset($_POST['nota']) ? (int)$_POST['nota'] : 0;
    $comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : '';

    echo "Música ID: $musica_id | Nota: $nota | Comentário: $comentario<br>"; // debug

    if ($musica_id > 0 && $nota >= 1 && $nota <= 5 && !empty($comentario)) {
        if (!isset($_SESSION['avaliacoes'])) {
            $_SESSION['avaliacoes'] = [];
        }

        $_SESSION['avaliacoes'][] = [
            'musica_id' => $musica_id,
            'nota'      => $nota,
            'comentario'=> $comentario,
            'data'      => date('d/m/Y H:i')
        ];

        echo "Avaliação salva com sucesso!";
    } else {
        echo "Dados inválidos!";
    }
} else {
    echo "Método inválido!";
}

// Redireciona
header('Location: index.php');
exit;
?>