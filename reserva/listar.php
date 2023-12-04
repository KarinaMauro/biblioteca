<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../reserva/listar.css">
</head>
<body>
<div class="listar">
<?php
include_once '../reserva/db.php';

$stmt = $pdo->prepare('SELECT * FROM fantasia');
$stmt->execute();
$ingressos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($ingressos) == 0) {
    echo '<p>Nenhuma reserva realizada.</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>livro</th><th>dreserva</th><th>vreserva</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($reservasss as $reserva) {
        echo "<tr>";
        echo "<td>" . $reserva['livro'] . '</td>';
        echo "<td>" . $reserva['dreserva'] . '</td>';
        echo "<td>" . $reserva['vreserva'] . '</td>';
    
        echo '<td><a style="color:;" href="reserva/atualizar.php?id=' . $reserva['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:;" href="reserva/deletar.php?id=' . $reserva['id'] . '">Deletar</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
?>
    </center>
   
</body>
</html>