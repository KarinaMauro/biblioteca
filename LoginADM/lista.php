<?php

require_once 'db.php';
require_once 'App/Controller/UserController.php';
require_once 'App/Controller/emprestimoController.php';

$emprestimoController = new emprestimoController($pdo);
$emprestimos = $emprestimoController->listarEmprestimo();
$historicos = $emprestimoController->listarHistorico();

$userController = new UserController($pdo);
$users = $userController->listarUsers();



$html = '<h2>Lista de Usuário</h2>
<ul>';
foreach ($users as $user) {
    $html .= '<li>' . $user['id'] . ' - ' . $user['nome'] . ' Anos - ' . $user['cpf'] . ' - ' . $user['telefone'] . ' - ' . $user['senha'] .  ' - ' . $user['tipo_usuario'] . '</li>';
}
$html .= '</ul>

<h2>Histórico</h2>
<ul>';
foreach ($historicos as $historico) {
    $html .= '<li>' . $historico['id'] . ' - ' . $historico['livro'] . ' Anos - ' . $historico['user'] . ' - ' . $historico['data_devolucao'] . '</li>';
}
$html .= '</ul>

<h2>Emprestimo</h2>
<ul>';
foreach ($emprestimos as $emprestimo) {
    $html .= '<li><strong>Livro: </strong>' . $emprestimo['livro'] . ';<br> <strong>Usuário:</strong> ' . $emprestimo['user'] . '<br> <strong>Horário da devolução:</strong> ' . $emprestimo['data'] . '<br><br></li>';
}
$html .= '</ul>';

require_once '../vendor/autoload.php';

// referenciando o namespace do dompdf
use Dompdf\Dompdf;

// instanciando o dompdf
$dompdf = new Dompdf();

// inserindo o HTML que queremos converter
$dompdf->loadHtml($html);

// Definindo o papel e a orientação
$dompdf->setPaper('A4', 'landscape');

// Renderizando o HTML como PDF
$dompdf->render();

// Enviando o PDF para o browser
$dompdf->stream();

?>
