<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: ../contato/listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM contato WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../contato/listar.php');
    exit;
}

$nome = $appointment['nome'];
$email = $appointment['email'];
$msg = $appointment['msg'];




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    

    // validacao dos dados do formulario aqui
    $stmt = $pdo->prepare('UPDATE contato SET nome = ?, email = ?, msg = ?WHERE id = ?');
    $stmt->execute([$nome, $email, $msg, $id]);
    header('Location:../contato/ listar.php');
    exit;
}
?>