<!DOCTYPE html>
<html>
<head>
  <title>Cabeçalho do Site</title>
</head>
<body>
<center>
    <?php
$host = 'localhost' ;
$dbname= 'crud-biblioteca';
$username = 'root';
$password = '';

try
{
    $pdo = new PDO ("mysql:host=$host;dbname=$dbname;charset=utf8", $username , $password);
    $pdo-> setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION) ;
} 
catch (PDOException $e) {
    echo 'Erro ao realizar o cadastro:'
    . $e->getMessage();
    exit;
}
?>
</center>
</body>
</html>