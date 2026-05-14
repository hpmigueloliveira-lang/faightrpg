<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Guerreiro</title>
</head>
<body>

<h1>Cadastrar Guerreiro</h1>

<form action="salvar.php" method="post">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Classe:</label><br>
    <select name="classe" required>
        <option value="Guerreiro">Guerreiro</option>
        <option value="Mago">Mago</option>
        <option value="Arqueiro">Arqueiro</option>
        <option value="Paladino">Paladino</option>
    </select><br><br>

    <label>Vida:</label><br>
    <input type="number" name="vida" required><br><br>

    <label>Ataque:</label><br>
    <input type="number" name="ataque" required><br><br>

    <label>Defesa:</label><br>
    <input type="number" name="defesa" required><br><br>

    <button type="submit">Cadastrar</button>
</form>

<br>
<a href="batalha.php">Ir para Batalha</a>

</body>
</html>