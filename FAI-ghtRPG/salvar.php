<?php
include("conexao.php");

$nome = $_POST["nome"];
$classe = $_POST["classe"];
$vida = $_POST["vida"];
$ataque = $_POST["ataque"];
$defesa = $_POST["defesa"];

$sql = "INSERT INTO guerreiros (nome, classe, vida, ataque, defesa)
        VALUES ('$nome', '$classe', '$vida', '$ataque', '$defesa')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Personagem cadastrado com sucesso!</h2>";
    echo "<a href='cadastro.php'>Cadastrar outro</a><br>";
    echo "<a href='batalha.php'>Ir para batalha</a>";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>