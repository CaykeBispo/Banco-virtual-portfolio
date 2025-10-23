<?php
// Teste para verificar o mobile/index.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testando mobile/index.php...\n";

// Simular variáveis de sessão
session_start();
$_SESSION['agencia'] = '1234';
$_SESSION['conta'] = '12345-6';
$_SESSION['s4'] = '1234';

// Simular GET hash
$_GET['hash'] = 'teste123';

// Incluir o arquivo
include 'mobile/index.php';
?>
