<?php
require_once('_admin/config.php');
clearSession();

if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
}

$hash = getHash();
Acesso::registrarAcesso($hash);

// Página de escolha em vez de redirecionamento automático
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco Virtual - Portfólio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0066cc 0%, #004499 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 500px;
        }
        h1 {
            color: #0066cc;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            background: #0066cc;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #004499;
        }
        .info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏦 Banco Virtual - Portfólio</h1>
        <p>Escolha a versão que deseja visualizar:</p>
        
        <a href="home.php?hash=<?php echo $hash; ?>" class="btn">
            🖥️ Versão Desktop
        </a>
        
        <a href="mobile/index.php?hash=<?php echo $hash; ?>" class="btn">
            📱 Versão Mobile
        </a>
        
        <div class="info">
            <strong>Hash da sessão:</strong> <?php echo $hash; ?><br>
            <strong>Dispositivo detectado:</strong> <?php echo isMobile() ? 'Mobile' : 'Desktop'; ?><br>
            <strong>Status:</strong> Sistema funcionando corretamente ✅
        </div>
        
        <p><small>Este é um projeto de portfólio demonstrativo.</small></p>
    </div>
</body>
</html>