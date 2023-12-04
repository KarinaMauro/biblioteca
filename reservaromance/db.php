<?php


$host = 'localhost';
$dbname = 'crud-biblioteca';
$username = 'root';
$password = '';




try {
    
    
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 

catch (PDOException $e) {
    
  
echo 'Erro ao realizar o cadastro: ' . $e->getMessage();
    
    
// Adicione informações adicionais para depuração ou resgistro de erros
    
    
// Exemplo: error_log('Erro na conexão ao banco de dados: ' . $e->getMessage());
    
    

 
// Ou: echo 'Erro na conexão ao banco de dados. Detalhes: ' . $e->getMessage();
    exit;
}
?>
