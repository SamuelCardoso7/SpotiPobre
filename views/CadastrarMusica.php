<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpotiPobre - Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<form method="POST">
    <div class="container">
        <h1>Cadastrar Música</h1>
        <div style="position: absolute; top: 20px; right: 30px;">
            <a href="../index.php">Voltar</a>
        </div>
        <label><strong>Nome</strong></label>
        <input type="text" name="nome" required>

        <label><strong>Descrição</strong></label>

        <textarea name="descricao"></textarea>
        <button type="submit"> Cadastrar </button>
    </div>
</form>