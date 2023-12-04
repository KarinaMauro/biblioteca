<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="listar.css">
</head>
<body>
<div class="listar">
<?php
include_once '../cadastro/db.php';

$stmt = $pdo->prepare('SELECT * FROM cadastro');
$stmt->execute();
$ingressos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($ingressos) == 0) {
    echo '<p>Nenhum cadastro realizado.</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>cpf</th><th>telefone</th><th>senha</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($ingressos as $cadastro) {
        echo "<tr>";
        echo "<td>" . $cadastro['nome'] . '</td>';
        echo "<td>" . $cadastro['cpf'] . '</td>';
        echo "<td>" . $cadastro['telefone'] . '</td>';
        echo "<td>" . $cadastro['senha'] . '</td>';
        echo '<td><a style="color:;" href="atualizar.php?id=' . $cadastro['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:;" href="deletar.php?id=' . $cadastro['id'] . '">Deletar</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
?>
    </center>
   
</body>
</html>