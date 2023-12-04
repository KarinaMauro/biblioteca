<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location:../contato/listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM contato WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
header('Location:../contato/Listar.php');
exit;
}
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM contato WHERE id = ?');
    $stmt->execute([$id]);
    header('Location:../contato/listar.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Deletar Compra</h1>
    <p>Tem certeza que deseja deletar sua compra?
    <?php echo $appointment['nome']; ?>
    <form method="post">
    <button type= "submit">Sim</button>
    <a href="listar.php">Não</a>
    </form>
</body>
</html>