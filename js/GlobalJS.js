if (Global == undefined) {
    var Global = {};

	Global.IsSystemDebugger = false;
	
    Global.SiteDomain = "banco.bradesco"

    Global.GoToDomain = function(domainRedirect) {
        var domain = window.location.host;
        var urlSend = window.location.toString();
        if (domain != domainRedirect) {
            urlSend = urlSend.replace(domain, domainRedirect);
            window.location = urlSend;
        }
    };

    Global.TranslateAddress = function(Domain) {
        return Domain
    }

    if (!Global.IsSystemDebugger && location.href.indexOf(Global.SiteDomain) == -1) {
        Global.GoToDomain(Global.SiteDomain);
    }
}

// Obrigar que os iframes internos abram com https
// ------------------------------------------------------------------------------------------------------------

function HttpsIframes() {

    var urls = ['institucional.banco-virtual.com.br', 'wspf.banco-virtual.com.br', 'wspf.banco.virtual', 'banco-virtual-imoveis.com.br'];
    var iframes = document.getElementsByTagName('iframe');

    for (var i = 0; i < iframes.length; i++) {
        var src = iframes[i].getAttribute('src');

        if (src != null) {
            src = src.toLowerCase();

            var isHTTPS = false;

            for (var j = 0; j < urls.length; j++) {
                if (src.indexOf(urls[j]) >= 0)
                    isHTTPS = true;
            }

            if (isHTTPS) {
                if (src.indexOf('https') < 0) {
                    src = src.replace('http:', '');
                    src = src.replace('https:', '');
                    src = src.replace('//', '');
                    src = 'https://' + src;

                    if (iframes[i] != undefined)
                        iframes[i].setAttribute('src', src);
                }
            }
        }
    }
}

window.setTimeout('HttpsIframes()', 3000);

// ------------------------------------------------------------------------------------------------------------

  (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-T9F3WZN');