<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM cadastro WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;
}

$nome = $appointment['nome'];
$cpf = $appointment['cpf'];
$telefone = $appointment['telefone'];
$senha = $appointment['senha'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    

    // validacao dos dados do formulario aqui
    $stmt = $pdo->prepare('UPDATE cadastro SET nome = ?, cpf = ?, telefone = ?, senha = ?WHERE id = ?');
    $stmt->execute([$nome, $cpf, $telefone, $senha, $id]);
    header('Location: listar.php');
    exit;
}
?>