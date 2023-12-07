<?php
include_once 'db.php';
session_start();

$stmt = $pdo->prepare('SELECT livro, user, data FROM emprestimos');
$stmt->execute();
$livrosEmprestados = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['devolver'])) {
    $livroDevolvido = $_POST['livro_devolvido'];

    // Excluir o registro da tabela emprestimos
    $stmtDelete = $pdo->prepare('DELETE FROM emprestimos WHERE livro = ? AND user = ?');
    $stmtDelete->execute([$livroDevolvido, $_SESSION['usuarioNomedeUsuario']]);

    // Se a exclusão for bem-sucedida, registre a devolução na tabela historico_emprestimos
    if ($stmtDelete->rowCount()) {
        $stmtHistorico = $pdo->prepare('INSERT INTO historico_emprestimos (livro, user, data_devolucao) VALUES (?, ?, NOW())');
        $stmtHistorico->execute([$livroDevolvido, $_SESSION['usuarioNomedeUsuario']]);

        echo '<span>Livro devolvido com sucesso!</span>';
        header('Location: reservaromance.php');
    } else {
        echo '<span>Erro ao devolver o livro. Tente novamente mais tarde.</span>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Responsivo</title>
    <link rel="stylesheet" href="../menu.css">
    <link rel="stylesheet" href="../reservaromance/crud.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="../img/logo_MB-01-1.png" height="45px">
        </div>
        <nav>
            <ul>
                <li><a href="../index.html">Início</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li class="dropdown">
                    <a href="#categorias">Categorias</a>
                    <ul class="dropdown-menu">
                        <li><a href="fantasia/fantasia.html">Fantasia</a></li>
                        <li><a href="#">Romance</a></li>
                        <li><a href="#">Fic</a></li>
                        <li><a href="#">Lançamentos</a></li>
                    </ul>
                </li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Reserva de Livros</h2>
        <form method="post">
            <label for="livro">Selecione o Livro:</label>
            <select id="livro" name="livro" required>
    <option value="livro1">Os sete maridos de Evelyn Hugo</option>
    <option value="livro2">Amor & Gelato</option>
    <option value="livro3">O lado feio do amor</option>
    <option value="livro4">Todo esse tempo</option>
    <!-- Adicione mais opções conforme necessário -->
</select>

            <label for="data">Data do Empréstimo:</label>
            <input type="date" id="data" name="data_emprestimo" required>


            <button type="submit" name="submit">Reservar</button>
            
        </form>
    </div>

    <?php
require_once '../reserva/db.php';

if (isset($_POST['submit'])) {
    $livroValue = $_POST['livro'];
    $user = $_SESSION['usuarioNomedeUsuario'];
    $data_emprestimo = $_POST['data_emprestimo'];

    $livroOptions = [
        'livro1' => 'A Rainha Vermelha',
        'livro2' => 'Biblioteca da Meia-Noite',
        'livro3' => 'As Crônicas de Nárnia',
        'livro4' => 'O Homem de Giz',
    ];

    $livro = $livroOptions[$livroValue];

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM emprestimos WHERE livro = ? AND data = ?');
    $stmt->execute([$livro, $data_emprestimo]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $error = 'Esse livro já foi reservado';
    } else {
        $stmtUserEmprestimo = $pdo->prepare('SELECT COUNT(*) FROM emprestimos WHERE user = ?');
        $stmtUserEmprestimo->execute([$user]);
        $countUserEmprestimo = $stmtUserEmprestimo->fetchColumn();
    
        if ($countUserEmprestimo > 0) {
            $error = 'Você já possui um empréstimo ativo. Devolva o livro antes de fazer uma nova reserva.';
        } else {
        $stmt = $pdo->prepare('INSERT INTO emprestimos (livro, user, data) VALUES (:livro, :user, :data_emprestimo)');
        $stmt->execute(['livro' => $livro, 'user' => $user, 'data_emprestimo' => $data_emprestimo]);

        if ($stmt->rowCount()) {
            echo '<span>Empréstimo realizado com sucesso!</span>';
            header('Location: reservaromance.php');
        } else {
            echo '<span>Erro ao realizar o empréstimo. Tente Novamente mais tarde.</span>';
        }
        }

    if (isset($error)) {
        echo '<span>' . $error . '</span>';
    }
}}
?>
<?php
if ($livrosEmprestados) {
    echo '<ul>';
    foreach ($livrosEmprestados as $livroEmprestado) {
        echo '<li>';
        echo '<strong>Livro: </strong>' . $livroEmprestado['livro'] . '<br>';
        echo '<strong>Usuário: </strong>' . $livroEmprestado['user'] . '<br>';
        echo '<strong>Data do Empréstimo: </strong>' . $livroEmprestado['data'] . '<br>';
        echo '<form method="post">';
        echo '<input type="hidden" name="livro_devolvido" value="' . $livroEmprestado['livro'] . '">';
        echo '<button type="submit" name="devolver">Devolver</button>';
        echo '</form>';
        echo '<br>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Nenhum livro emprestado no momento.</p>';
}

?>

</body>
</html>

   