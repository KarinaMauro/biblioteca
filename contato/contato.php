<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Responsivo</title>
    <link rel="stylesheet" href="../menu.css">
    <link rel="stylesheet" href="contato.css">
  </head>
<body>
      <header>
        <div class="logo">
          <img src="../img/logo_MB-01-1.png", height="45px">
        </div>
        <nav>
          <ul>
            <li><a href="../index.html">Início</a></li>
            <li><a href="../sobre/sobre.html">Sobre</a></li>
            <li class="dropdown">
              <a href="#categorias">Categorias</a>
              <ul class="dropdown-menu">
                <li><a href="../fantasia/fantasia.html">Fantasia</a></li>
                <li><a href="../romance/romance.html">Romance</a></li>
                <li><a href="../ficcao/ficcao.html">Fic</a></li>
                <li><a href="../lancamento/lancamento.html">Lançamentos</a></li>
              </ul>
            </li>
            <li><a href="contato/contato.html">Contato</a></li>
          </ul>
        </nav>
      </header>
 

    <section class="contact-form">
        <h2>Entre em Contato conosco</h2>
        <form action="processar_formulario.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" rows="4" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </section>
    
    <?php 
require_once '../contato/db.php';

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];
        

        $stmt = $pdo->prepare('SELECT COUNT(*) FROM contato WHERE email = ? AND msg = ?');
        $stmt->execute([$email, $msg]);
        $count = $stmt->fetchColumn();

        if ($count > 0 ) {
            $error = 'Mensagem invalida';
        } else {
            $stmt = $pdo->prepare('INSERT INTO contato(nome, email, msg)
            VALUES(:nome, :email, :msg)');
            $stmt ->execute(['nome' => $nome, 'email' => $email, 'msg' => $msg]);

            if ($stmt->rowCount()) {
            echo '<span>Mensagem enviada com sucesso! O administrador entrará em contrato com voce atravez do email</span>';
            } else {
            echo '<span>Erro ao enviar a mensagem. Tente Novamente mais tarde.</span>';
            }
        }
        if (isset($error)) {
            echo '<span>' . $error . '</span>';
        }
    }
    ?>

<footer>
        <p>&copy; 2023 Biblioteca Virtual. Todos os direitos reservados.</p>
    </footer>

   