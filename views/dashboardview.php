<?php 
require_once __DIR__ . '/../models/dashboardmodels.php';
require_once __DIR__ . '/../models/avaliacaomodel.php';

$model = new DashboardModel();
$musicas = $model->listarMusicas();

$avaliacaoModel = new AvaliacaoModel();
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
            
            <!-- Botão Logout no header -->
            <div style="position: absolute; top: 20px; right: 30px;">
                <a href="login.php" style="text-decoration: none;">
                    <button style="background: #dc3545; padding: 8px 16px; font-size: 14px;">Sair</button>
                </a>
            </div>
        </div>

        <div class="content">
            
            <!-- Botão Cadastrar Música -->
            <div style="text-align: right; margin-bottom: 25px;">
                <a href="cadastrar_musica.php">
                    <button>+ Cadastrar Música</button>
                </a>
            </div>

            <h2>Músicas Disponíveis</h2>

            <?php foreach($musicas as $musica): 
                $avals = $avaliacaoModel->listarAvaliacoesPorMusica($musica['ID_MUSICA']);
            ?>
            <div class="card">
                <div>
                    <h3><?= htmlspecialchars($musica['NOME']) ?></h3>
                    <p><?= htmlspecialchars($musica['DESCRICAO'] ?? 'Sem descrição') ?></p>
                    
                    <?php if (count($avals) > 0): ?>
                        <strong>Avaliações recebidas:</strong><br>
                        <?php foreach($avals as $aval): ?>
                            <small>
                                ⭐ <?= $aval['QTD_ESTRELAS'] ?>/5 — <?= htmlspecialchars($aval['DESCRICAO']) ?> 
                                <em>(por <?= htmlspecialchars($aval['nome_usuario']) ?>)</em>
                            </small><br>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <small style="color:#888;">Ainda não foi avaliada</small>
                    <?php endif; ?>
                </div>
                
                <a href="/SpotiPobre/avaliar.php?id=<?= $musica['ID_MUSICA'] ?>">
                    <button>Avaliar Música</button>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>