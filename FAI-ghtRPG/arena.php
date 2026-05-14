<?php
include("conexao.php");

if (!isset($_POST["player_id"])) {
    echo "Acesse esta página pela tela de batalha.";
    exit;
}

$player_id = $_POST["player_id"];

// Buscar guerreiro escolhido pelo jogador
$sqlPlayer = "SELECT * FROM guerreiros WHERE id = $player_id";
$resPlayer = $conn->query($sqlPlayer);
$player = $resPlayer->fetch_assoc();

// Escolher guerreiro aleatório para o computador
$sqlComp = "SELECT * FROM guerreiros WHERE id != $player_id ORDER BY RAND() LIMIT 1";
$resComp = $conn->query($sqlComp);
$computador = $resComp->fetch_assoc();

if (!$computador) {
    echo "É necessário ter pelo menos 2 guerreiros cadastrados.";
    exit;
}

// Vidas iniciais
$vida_player = $player["vida"];
$vida_computador = $computador["vida"];

// Sorteia quem começa
$inicio = rand(1, 2);

if ($inicio == 1) {
    $turno = "player";
} else {
    $turno = "computador";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Arena</title>
</head>
<body>

<h1>Arena de Batalha</h1>

<h2>Player: <?php echo $player["nome"]; ?> | HP: <?php echo $vida_player; ?></h2>
<h2>Computador: <?php echo $computador["nome"]; ?> | HP: <?php echo $vida_computador; ?></h2>

<hr>

<?php
if ($turno == "player") {
    echo "<h3>O PLAYER começa!</h3>";
} else {
    echo "<h3>O COMPUTADOR começa!</h3>";
}

while ($vida_player > 0 && $vida_computador > 0) {

    if ($turno == "player") {

        $ataque = 0.1*rand(0, $player["ataque"]);

        $vida_computador = $vida_computador - $ataque;

        if ($vida_computador < 0) {
            $vida_computador = 0;
        }

        echo "<p><b>" . $player["nome"] . "</b> atacou causando <b>$ataque</b> de dano.</p>";
        echo "<p>HP do computador: $vida_computador</p>";

        if ($vida_computador == 0) {
            echo "<h2>Computador morreu! PLAYER venceu!</h2>";
            break;
        }

        $turno = "computador";

    } else {

        $ataque = rand(0, $computador["ataque"]);

        $vida_player = $vida_player - $ataque;

        if ($vida_player < 0) {
            $vida_player = 0;
        }

        echo "<p><b>" . $computador["nome"] . "</b> atacou causando <b>$ataque</b> de dano.</p>";
        echo "<p>HP do player: $vida_player</p>";

        if ($vida_player == 0) {
            echo "<h2>Player morreu! COMPUTADOR venceu!</h2>";
            break;
        }

        $turno = "player";
    }

    echo "<hr>";
}
?>

<br>
<a href="batalha.php">Batalhar novamente</a><br>
<a href="cadastro.php">Cadastrar novo guerreiro</a>

</body>
</html>