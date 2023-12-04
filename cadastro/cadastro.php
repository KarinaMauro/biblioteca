<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="crudcadastro.css">
</head>
<div class="perfil">
    <img src="../img/big-data-developer-header-banner-vector-23242237.jpg">
</div>
    <div class="container">
        <p style= "font-family:monospace;font-size:30px;color:white">Registrar</p>
<br>

<form method="post">
        <input type="text" name="nome" placeholder="Nome" required><br><br>
        <input type="text" name="cpf" placeholder="CPF" required><br><br>
        <input type="text" name="telefone" placeholder="Telefone" required><br><br>
        <input type="text" name="senha" placeholder="Registrar Senha" required><br>
        <br>
        <div>
        <button type = "submit" name="submit" value="Cadastrar"><a href="../login/login.php">Cadastrar</a></bottun>
</div>
</form>
<div class="login">
    <a href="../login/login.php">Login</a>
</div>

<?php 
require_once '../cadastro/db.php';

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        

        $stmt = $pdo->prepare('SELECT COUNT(*) FROM cadastro WHERE telefone = ? AND senha = ?');
        $stmt->execute([$telefone, $senha]);
        $count = $stmt->fetchColumn();

        if ($count > 0 ) {
            $error = 'Está senha já foi cadastrada.';
        } else {
            $stmt = $pdo->prepare('INSERT INTO cadastro(nome, cpf, telefone, senha)
            VALUES(:nome, :cpf, :telefone, :senha)');
            $stmt ->execute(['nome' => $nome, 'cpf' => $cpf, 'telefone' => $telefone, 'senha' => $senha]);

            if ($stmt->rowCount()) {
            echo '<span>Cadastro realizado com sucesso!</span>';
            } else {
            echo '<span>Erro ao Cadastrar. Tente Novamente mais tarde.</span>';
            }
        }
        if (isset($error)) {
            echo '<span>' . $error . '</span>';
        }
    }
    ?>


</head>
<body>
    
</body>
</html>
