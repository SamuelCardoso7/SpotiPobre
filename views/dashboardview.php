<?php 
session_start();
require_once __DIR__ . '/../models/dashboardmodels.php';

$model = new DashboardModel();
$musicas = $model->listarMusicas();

// Recupera avaliações da sessão
$avaliacoes = isset($_SESSION['avaliacoes']) ? $_SESSION['avaliacoes'] : [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpotiPobre - Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>SpotiPobre</h1>
        </div>

        <div style="padding: 30px;">
            
            <!-- Botão Cadastrar Música -->
            <div style="text-align: right; margin-bottom: 20px;">
                <a href="cadastrar_musica.php">
                    <button style="padding: 12px 25px; font-size: 16px;">+ Cadastrar Música</button>
                </a>
            </div>

            <h2>Músicas Disponíveis</h2>

            <?php foreach($musicas as $musica): 
                $avals = array_filter($avaliacoes, fn($a) => $a['musica_id'] === $musica['id']);
            ?>
            <div class="card musica">
                <div>
                    <h3><?= htmlspecialchars($musica['nome']) ?></h3>
                    <p><?= htmlspecialchars($musica['artista']) ?></p>
                    
                    <?php if (count($avals) > 0): ?>
                        <strong>Avaliações recebidas:</strong><br>
                        <?php foreach($avals as $aval): ?>
                            <small style="display:block; margin:8px 0; color:#555;">
                                ⭐ <?= $aval['nota'] ?>/5 — <?= htmlspecialchars($aval['comentario']) ?> 
                                <em>(<?= $aval['data'] ?>)</em>
                            </small>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <small style="color:#888;">Ainda não foi avaliada</small>
                    <?php endif; ?>
                </div>
                
                <a href="avaliar.php?id=<?= $musica['id'] ?>">
                    <button>Avaliar Música</button>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>