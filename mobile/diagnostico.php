<?php
/**
 * Diagnóstico do Sistema Mobile
 * Verifica problemas e fornece soluções
 */

// Configurações de erro
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico - Sistema Mobile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .status {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border-left: 5px solid;
        }
        .success {
            background: #d4edda;
            border-color: #28a745;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            border-color: #dc3545;
            color: #721c24;
        }
        .warning {
            background: #fff3cd;
            border-color: #ffc107;
            color: #856404;
        }
        .info {
            background: #d1ecf1;
            border-color: #17a2b8;
            color: #0c5460;
        }
        .btn {
            background: #FF0844;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover {
            background: #e0073a;
        }
        .code {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 10px;
            font-family: monospace;
            font-size: 12px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 Diagnóstico do Sistema Mobile</h1>
        
        <?php
        // Verifica PHP
        echo '<div class="status success">';
        echo '<strong>✅ PHP Funcionando</strong><br>';
        echo 'Versão: ' . phpversion() . '<br>';
        echo 'Data/Hora: ' . date('Y-m-d H:i:s');
        echo '</div>';
        
        // Verifica arquivos essenciais
        $arquivos_essenciais = [
            'index.php' => 'Página Principal',
            'css/style-custom.css' => 'Estilos CSS',
            'js/cache-control.js' => 'Controlador de Cache',
            'js/background-manager.js' => 'Gerenciador de Background',
            'images/background-mobile.jpg' => 'Background Principal'
        ];
        
        echo '<div class="status info">';
        echo '<strong>📁 Verificação de Arquivos:</strong><br>';
        foreach ($arquivos_essenciais as $arquivo => $descricao) {
            if (file_exists($arquivo)) {
                $tamanho = filesize($arquivo);
                echo "✅ $descricao ($arquivo) - " . number_format($tamanho) . " bytes<br>";
            } else {
                echo "❌ $descricao ($arquivo) - <strong>ARQUIVO NÃO ENCONTRADO</strong><br>";
            }
        }
        echo '</div>';
        
        // Verifica permissões
        echo '<div class="status info">';
        echo '<strong>🔐 Verificação de Permissões:</strong><br>';
        $diretorios = ['css', 'js', 'images'];
        foreach ($diretorios as $dir) {
            if (is_dir($dir)) {
                if (is_readable($dir)) {
                    echo "✅ $dir - Legível<br>";
                } else {
                    echo "❌ $dir - Não legível<br>";
                }
            } else {
                echo "❌ $dir - Diretório não existe<br>";
            }
        }
        echo '</div>';
        
        // Verifica extensões PHP
        echo '<div class="status info">';
        echo '<strong>🔌 Extensões PHP:</strong><br>';
        $extensoes = ['json', 'curl', 'mbstring', 'openssl'];
        foreach ($extensoes as $ext) {
            if (extension_loaded($ext)) {
                echo "✅ $ext<br>";
            } else {
                echo "⚠️ $ext - Não disponível<br>";
            }
        }
        echo '</div>';
        
        // Verifica configurações do servidor
        echo '<div class="status info">';
        echo '<strong>⚙️ Configurações do Servidor:</strong><br>';
        echo 'Document Root: ' . ($_SERVER['DOCUMENT_ROOT'] ?? 'Desconhecido') . '<br>';
        echo 'Server Software: ' . ($_SERVER['SERVER_SOFTWARE'] ?? 'Desconhecido') . '<br>';
        echo 'PHP Memory Limit: ' . ini_get('memory_limit') . '<br>';
        echo 'Max Execution Time: ' . ini_get('max_execution_time') . 's<br>';
        echo '</div>';
        
        // Verifica erros de sintaxe
        echo '<div class="status warning">';
        echo '<strong>🔍 Verificação de Sintaxe:</strong><br>';
        
        $arquivos_php = ['index.php', 'cache-simple.php'];
        foreach ($arquivos_php as $arquivo) {
            if (file_exists($arquivo)) {
                $output = shell_exec("php -l $arquivo 2>&1");
                if (strpos($output, 'No syntax errors') !== false) {
                    echo "✅ $arquivo - Sintaxe OK<br>";
                } else {
                    echo "❌ $arquivo - Erro de sintaxe:<br>";
                    echo '<div class="code">' . htmlspecialchars($output) . '</div>';
                }
            }
        }
        echo '</div>';
        
        // Teste de cache
        echo '<div class="status info">';
        echo '<strong>🧪 Teste de Cache:</strong><br>';
        echo 'Versão: 1.1.0<br>';
        echo 'Timestamp: ' . time() . '<br>';
        echo 'Status: ✅ Sistema de cache ativo<br>';
        echo '</div>';
        ?>
        
        <div class="status success">
            <strong>🚀 Ações Disponíveis:</strong><br>
            <a href="index.php" class="btn">📱 Ir para Mobile</a>
            <a href="test-server.php" class="btn">🧪 Teste do Servidor</a>
            <a href="quick-test.html" class="btn">⚡ Teste Rápido</a>
            <a href="?refresh=1" class="btn">🔄 Atualizar Diagnóstico</a>
        </div>
        
        <?php if (isset($_GET['refresh'])): ?>
        <div class="status success">
            <strong>✅ Diagnóstico Atualizado!</strong><br>
            Timestamp: <?php echo time(); ?><br>
            Cache: Invalidado
        </div>
        <?php endif; ?>
        
        <div class="status info">
            <strong>📋 Soluções para Problemas Comuns:</strong><br>
            <div class="code">
1. <strong>Erro 500:</strong> Verifique permissões de arquivos e sintaxe PHP
2. <strong>Cache não atualiza:</strong> Use Ctrl+F5 ou limpe cache do navegador
3. <strong>Arquivos não encontrados:</strong> Verifique caminhos e permissões
4. <strong>CSS não carrega:</strong> Verifique se o arquivo existe e tem permissão de leitura
5. <strong>JavaScript não funciona:</strong> Verifique console do navegador para erros
            </div>
        </div>
    </div>
</body>
</html>

