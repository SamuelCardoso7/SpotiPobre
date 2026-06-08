<?php
session_start();

if (!isset($musicaAtual)) {
    header('Location: /SpotiPobre/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliar - <?= htmlspecialchars($musicaAtual['NOME']) ?></title>

    <link rel="stylesheet" href="/SpotiPobre/css/style.css">
</head>

<body>

<div class="container" style="max-width: 600px;">

    <div class="header">
        <h1>Avaliar Música</h1>
    </div>

    <div style="padding: 40px;">

        <h2><?= htmlspecialchars($musicaAtual['NOME']) ?></h2>

        <p style="color: #555; margin-bottom: 25px;">
            <?= htmlspecialchars($musicaAtual['DESCRICAO'] ?? 'Sem descrição') ?>
        </p>

        <form action="/SpotiPobre/salvar_avaliacao.php" method="POST">

            <input type="hidden" name="musica_id" value="<?= $musicaAtual['ID_MUSICA'] ?>">

            <label><strong>Escolha sua nota (1 a 5):</strong></label>

            <select name="nota" required>
                <option value="">-- Selecione a nota --</option>
                <option value="1">⭐ 1 - Péssima</option>
                <option value="2">⭐⭐ 2 - Ruim</option>
                <option value="3">⭐⭐⭐ 3 - Regular</option>
                <option value="4">⭐⭐⭐⭐ 4 - Boa</option>
                <option value="5">⭐⭐⭐⭐⭐ 5 - Excelente</option>
            </select>

            <label><strong>Sua avaliação:</strong></label>

            <textarea 
                name="comentario" 
                placeholder="Escreva sua opinião sobre a música..."
                rows="6"
                required
            ></textarea>

            <div style="margin-top: 30px; display: flex; gap: 15px;">

                <button type="submit" style="flex: 1;">
                    Postar Avaliação
                </button>

                <a href="/SpotiPobre/index.php" style="flex: 1; text-decoration: none;">
                    <button type="button" style="background: #666; width: 100%;">
                        Cancelar
                    </button>
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>