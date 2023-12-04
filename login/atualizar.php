<?php
include 'login/db.php';

if (!isset($_GET['id'])) {
    header('Location: login/listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM login WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;
}

$nome = $appointment['nome'];
$senha = $appointment['senha'];




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
   
    

    // validacao dos dados do formulario aqui
    $stmt = $pdo->prepare('UPDATE entrar SET nome = ?, senha = ?WHERE id = ?');
    $stmt->execute([$nome, $senha,$id]);
    header('Location: login/listar.php');
    exit;
}
?>