<?php
include("conexao.php");

$sql = "SELECT * FROM guerreiros";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Batalha</title>
</head>
<body>

<h1>Escolha seu Guerreiro</h1>

<form action="arena.php" method="post">
    <label>Escolha seu personagem:</label><br><br>

    <select name="player_id" required>
        <?php
        while ($guerreiro = $resultado->fetch_assoc()) {
            echo "<option value='" . $guerreiro["id"] . "'>";
            echo $guerreiro["nome"] . " - " . $guerreiro["classe"];
            echo "</option>";
        }
        ?>
    </select>

    <br><br>

    <button type="submit">Ir para Batalha</button>
</form>

<br>
<a href="cadastro.php">Cadastrar novo guerreiro</a>

</body>
</html>