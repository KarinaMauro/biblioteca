<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location:../reserva/listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM fantasia WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location:../reserva/listar.php');
    exit;
}

$livro = $appointment['livro'];
$dreserva = $appointment['dreserva'];
$vreserva= $appointment['vreserva'];




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $livro = $_POST['livro'];
    $dreserva = $_POST['dreserva'];
    $vreserva = $_POST['vreserva'];
    
    

    // validacao dos dados do formulario aqui
    $stmt = $pdo->prepare('UPDATE fantasia SET livro = ?, dreserva = ?, vreserva = ?WHERE id = ?');
    $stmt->execute([$livro, $dreserva, $vreserva, $id]);
    header('Location: reserva/listar.php');
    exit;
}
?>