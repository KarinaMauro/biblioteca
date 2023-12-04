<?php 
require_once 'db.php';

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
      
        
        $stmt = $pdo->prepare('SELECT * FROM entrar WHERE nome = ? AND senha = ?');
        $stmt->execute([$nome, $senha]);
        $count = $stmt->fetch();

        
        if ($count > 0 ) {
                    echo "sucesso";
        } else {
                echo "erro ao realizar Login";
        }
        
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">

    <div class="container">
    <div class="login">
        <img src="../img/10412454.png">
    </div>
<br><br><br>

<form method="post">
        <input type="text" name="nome" placeholder="Nome" required><br><br>
        <input type="password" name="senha" placeholder="Senha" required><br><br>
      
        <br>
        <div>
        <button type="submit" name="submit" value="Cadastrar">Continuar</button>
</div>
</form>

<div class="perfil">
    <img src="../img/big-data-developer-header-banner-vector-23242237.jpg">
</div>