<?php 
session_start();
unset($_SESSION['usuarioNomedeUsuario']);
header('Location: login.php');
exit();