<?php

/** @var array{
 *     ID_MUSICA:int,
 *     NOME:string,
 *     DESCRICAO:string
 * } $musica
 */
?>
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>SpotiPobre - Dashboard</title>
       <link rel="stylesheet" href="../css/style.css">
</head>
<form method="POST">
       <div class="container">
              <h1>Editar Música</h1>

              <div style="position: absolute; top: 20px; right: 30px;">
                     <a href="../index.php"> Voltar </a>
              </div>
              <input type="hidden"
                     name="id"
                     value="<?= $musica['ID_MUSICA'] ?>" required>

              <input type="text"
                     name="nome"
                     value="<?= htmlspecialchars($musica['NOME']) ?>">

              <textarea name="descricao"><?= htmlspecialchars($musica['DESCRICAO']) ?></textarea>

              <button type="submit">Salvar</button>
       </div>
</form>