 // Cria modal
 function abreModal(modalID) {

     if (localStorage.lgpd_bradesco !== modalID) {

         var modal = document.getElementById(modalID);

         if (modal) {
             modal.classList.add("active");

             modal.addEventListener("click", function (e) {

                 if (e.target.id == modalID || e.target.className == "c-closed") {
                     modal.classList.remove("active");

                 } else if (e.target.className == "js-salvar") {
                     localStorage.lgpd_bradesco = modalID;
                 }
             });
         }
     }
 }

// Inicia modal de configuração dos cookies
 function configurarCookie() {
    var btnConfigurar = document.querySelector('.js-configurar');

    btnConfigurar.addEventListener('click', function(e){
        abreModal("js-modal");
    })
 }

// Variaveis globais
 var ctaCookie = document.querySelector(".js-cookie");
 var nomeClasse, arr;
//  Variavel criada para evitar conflito com outras bibliotecas
 var CookiesSemConflito = Cookies.noConflict();

 // Função para gravar cookie
 function aceitarCookie() {
     var btnAceitar = document.querySelector(".js-aceitar");

     nomeClasse = "is-hidden";
     arr = ctaCookie.className.split(" ");

    // Verifica se há o nome do cookie se, existir ele não será exibido no proximo acesso no periodo de 12 meses
     if(CookiesSemConflito.get('lgpd')) {

        // adiciona classe is-hidden (compativel com todos navegadores)
        ctaCookie.className += " " + nomeClasse;
     }

     btnAceitar.addEventListener('click', function () {
        // Definição do Cookie - chave , valor e expires (data de expiração)
        CookiesSemConflito.set('lgpd', true, {
            expires: 365
        })

         if(arr.indexOf(nomeClasse) == -1) {
            ctaCookie.className += " " + nomeClasse;
        }
     });

 };

// Função apenas para fechar o elemnto cookies completo
 function fecharCookie(){
    var btnFechar = document.querySelector('.js-fechar');

    nomeClasse = "is-hidden";
    arr = ctaCookie.className.split(" ");

    btnFechar.addEventListener("click", function(){

        if(arr.indexOf(nomeClasse) == -1) {
            ctaCookie.className += " " + nomeClasse;
        }
    });
 };
 
 // Defini cookie nome, valor e dias
 function definirCookie(nome, valor, dias) {
     var hoje = new Date();
     hoje.setTime(hoje.getTime() + (dias * 24 * 60 * 60 * 1000));
     var expira = "expires=" + hoje.toGMTString();
     document.cookie = nome + "=" + valor + ";" + expira + ";path=/";
 };

 // Obtem o valor do cookie
 function obterCookie(cnome) {

     var nome = cnome + "=";
     var ca = document.cookie.split(';');
     for (var i = 0; i < ca.length; i++) {
         var c = ca[i];
         while (c.charAt(0) == ' ') {
             c = c.substring(1);
         }
         if (c.indexOf(nome) == 0) {
             return c = c.substring(nome.length, c.length);
         }
     }
     return " ";
 };

// troca o tagueamento no botao aceitar e fechar das diretivas de privacidade

        var urlPrivacidade = window.location.href;
        urlPrivacidade = urlPrivacidade.split("/");
        var lnk = document.querySelector(".js-href");
        var aceitar = document.querySelector(".js-aceitar");
        var fechar = document.querySelector(".js-fechar");
        var urlPF = "https://www.bradescoseguranca.com.br/html/seguranca_corporativa/pf/seguranca-informacao/privacidade.shtm";
        var urlPJ = "https://www.bradescoseguranca.com.br/html/seguranca_corporativa/pj/seguranca-informacao/privacidade.shtm";


 function trocarTagueamento(url) {

    if (!url) {
 
        if (urlPrivacidade[4] === "classic") {
            lnk.setAttribute("href", urlPF);
            lnk.setAttribute("onclick", "trackBradesco('Portal Classic - Home','Menu Inferior - Informações Uteis','Botão - Diretiva de privacidade');");
            aceitar.setAttribute("onclick", "trackBradesco('Portal Classic - Home','Menu Inferior - Informações Uteis','Botão - Fechar');");
            fechar.setAttribute("onclick", "trackBradesco('Portal Classic - Home','Menu Inferior - Informações Uteis','Botão - Fechar');");

        }

        if (urlPrivacidade[4] === "exclusive") {
            lnk.setAttribute("href", urlPF);
            lnk.setAttribute("onclick", "trackBradesco('Portal Exclusive - Home','Menu Inferior - Informações Uteis','Botão - Diretiva de privacidade');");
            aceitar.setAttribute("onclick", "trackBradesco('Portal Exclusive - Home','Menu Inferior - Informações Uteis','Botão - Fechar');");
            fechar.setAttribute("onclick", "trackBradesco('Portal Exclusive - Home','Menu Inferior - Informações Uteis','Botão - Fechar');");

        }

        if (urlPrivacidade[4] === "prime") {
            lnk.setAttribute("href", urlPF);
            lnk.setAttribute("onclick", "trackBradesco('Portal Prime - Home','Menu Inferior - Informações Uteis','Botão - Diretiva de privacidade');");
            aceitar.setAttribute("onclick", "trackBradesco('Portal Prime - Home','Menu Inferior - Informações Uteis','Botão - Fechar');");
            fechar.setAttribute("onclick", "trackBradesco('Portal Prime - Home','Menu Inferior - Informações Uteis','Botão - Fechar');");

        }

        if (urlPrivacidade[3] === "semanadobrasil") {
            lnk.setAttribute("href", urlPF);
            lnk.setAttribute("onclick", "trackBradesco('LP Semana do Brasil','Aviso de Cookies','Diretiva de Privacidade');");
            aceitar.setAttribute("onclick", "trackBradesco('LP Semana do Brasil','Aviso de Cookies','Fechar');");
            fechar.setAttribute("onclick", "trackBradesco('LP Semana do Brasil','Aviso de Cookies','Fechar');");

        }

        if (urlPrivacidade[3] === "aguentefirme") {
            lnk.setAttribute("href", urlPF);
            lnk.setAttribute("onclick", "trackBradesco('LP Aguente Firme','Aviso de Cookies','Diretiva de Privacidade');");
            aceitar.setAttribute("onclick", "trackBradesco('LP Aguente Firme','Aviso de Cookies','Fechar');");
            fechar.setAttribute("onclick", "trackBradesco('LP Aguente Firme','Aviso de Cookies','Fechar');");

        }

        if(urlPrivacidade[4] === "private") {
            lnk.setAttribute("href", urlPF);
         }

        if(urlPrivacidade[4] === "corporate") {
           lnk.setAttribute("href", urlPJ);
        }

        if(urlPrivacidade[4] === "pessoajuridica") {
            lnk.setAttribute("href", urlPJ);
        }

        if(urlPrivacidade[3] === "semanadobrasil") {
            lnk.setAttribute("href", urlPF);
        }
        
        } else {
            lnk.setAttribute("onclick", "trackBradesco('Portal - Home','Menu Inferior - Informações Uteis','Botão - Diretiva de privacidade');");
            aceitar.setAttribute("onclick", "trackBradesco('Portal - Home','Menu Inferior - Informações Uteis','Botão - Aceitar');");
            fechar.setAttribute("onclick", "trackBradesco('Portal - Home','Menu Inferior - Informações Uteis','Botão - Fechar');");

        }
};

// Iniciliza todas as funções
 function init() {

    fecharCookie();
    aceitarCookie();
    configurarCookie();
    trocarTagueamento()
 };
 

 init();