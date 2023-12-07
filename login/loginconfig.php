<?php 
session_start();
include 'db.php';

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM cadastro WHERE nome = :nome AND senha = :senha";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $_SESSION['usuarioId'] = $resultado['id'];
        $_SESSION['usuarioNomedeUsuario'] = $resultado['nome'];
        $_SESSION['usuarioNiveisAcessoId'] = $resultado['tipo_usuario'];

        
        if ($_SESSION['usuarioNiveisAcessoId'] == "1") {
            header("Location: ../LoginADM/index.php");
        } elseif ($_SESSION['usuarioNiveisAcessoId'] == "2") {
            header("Location: ../index.html");
        }
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: login.php');
        exit();
    }
} 
?>