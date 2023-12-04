<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../contato/listar.css">
</head>
<body>
<div class="listar">
<?php
include_once '../contato/db.php';

$stmt = $pdo->prepare('SELECT * FROM contato');
$stmt->execute();
$ingressos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($ingressos) == 0) {
    echo '<p>Nenhuma mensagem enviada.</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>email</th><th>msg</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($ingressos as $cadastro) {
        echo "<tr>";
        echo "<td>" . $cadastro['nome'] . '</td>';
        echo "<td>" . $cadastro['email'] . '</td>';
        echo "<td>" . $cadastro['msg'] . '</td>';
        echo '<td><a style="color:;" href="../contato/atualizar.php?id=' . $contato['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:;" href="../contato/deletar.php?id=' . $conato['id'] . '">Deletar</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
?>
    </center>
   
</body>
</html>