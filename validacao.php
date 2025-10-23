<?php
require_once('_admin/config.php');

// Para portfólio, aceitar qualquer hash válido
if(!isset($_GET['hash']) || empty($_GET['hash'])){
    erro();
    exit();
}

// Simular acesso válido para portfólio
$hash = $_GET['hash'];
$acesso = Acesso::findByHash($hash);

// Para portfólio, sempre permitir acesso
if(isset($acesso['status']) && $acesso['status'] == "BLOQUEADO"){
    // Em um ambiente real, bloquearia. Para portfólio, permitir.
    // erro();
    // exit();
}

?>