<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Responsivo</title>
    <link rel="stylesheet" href="../menu.css">
    <link rel="stylesheet" href="../reservalancamentos/crud.css">
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
    <option value="livro1">O gambito da rainha</option>
    <option value="livro2">Os cinco sobreviventes</option>
    <option value="livro3">Caixa de pássaros</option>
    <option value="livro4">It</option>
    <!-- Adicione mais opções conforme necessário -->
</select>

            <label for="dia">Dia de Reserva:</label>
            <input type="date" id="dia" name="dreserva" required>

            <label for="validade">Validade da Reserva (dias):</label>
            <input type="number" id="validade" name="vreserva" required>

            <button type="submit" name="submit">Reservar</button>
            
        </form>
    </div>

    <?php
require_once '../reservalancamentos/db.php';

if (isset($_POST['submit'])) {
    $livroValue = $_POST['livro'];
    $dreserva = $_POST['dreserva'];
    $vreserva = $_POST['vreserva'];

    // Obtenha o texto do livro a partir do valor selecionado
    $livroOptions = [
        'livro1' => 'O gambito da rainha',
        'livro2' => 'Os cinco sobreviventes',
        'livro3' => 'Caixa de pássaros',
        'livro4' => 'It',
        // Adicione mais opções conforme necessário
    ];

    $livro = $livroOptions[$livroValue];

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM fantasia WHERE livro = ? AND dreserva = ? AND vreserva = ?');
    $stmt->execute([$livro, $dreserva, $vreserva]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $error = 'Esse livro já foi reservado';
    } else {
        // Inserindo os valores nas colunas corretas da tabela "fantasia"
        $stmt = $pdo->prepare('INSERT INTO fantasia(livro, dreserva, vreserva) VALUES(:livro, :dreserva, :vreserva)');
        $stmt->execute(['livro' => $livro, 'dreserva' => $dreserva, 'vreserva' => $vreserva]);
       
        if ($stmt->rowCount()) {
            echo '<span>Reserva realizada com sucesso!</span>';
        } else {
            echo '<span>Erro ao reservar. Tente Novamente mais tarde.</span>';
        }
    }

    if (isset($error)) {
        echo '<span>' . $error . '</span>';
    }
}
?>

</body>
</html>

   