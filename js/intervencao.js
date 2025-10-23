var novoIB = {

    _onLoad: function() {

        novoIB.topBar();

    },

    getCookie: function(c_name) {

        if (document.cookie.length > 0) {
            c_start = document.cookie.indexOf(c_name + "=");
            if (c_start != -1) {
                c_start = c_start + c_name.length + 1;
                c_end = document.cookie.indexOf(";", c_start);
                if (c_end == -1) {
                    c_end = document.cookie.length;
                }
                return unescape(document.cookie.substring(c_start, c_end));
            }
        }

        return "";

    },

    createCookie: function(name, value, days) {

        var expires;

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }

        document.cookie = name + "=" + value + expires + "; path=/";

    },

    openModalNovoIB: function(pathImage,segmentName) {

        var msgTitleModal = "Em um só lugar, você pega os Informes de Rendimentos pra declarar seu Imposto de Renda." + "\n" + "Acesse sua conta pelo Internet Banking e clique em Mais Opções, Informe de Rendimentos.";
        var msgAltModal   = "Em um só lugar, você pega os Informes de Rendimentos pra declarar seu Imposto de Renda." + "\n" + "Acesse sua conta pelo Internet Banking e clique em Mais Opções, Informe de Rendimentos.";

        $.magnificPopup.open({

            tClose: 'Fechar',
            tLoading: 'Carregando...',
            items: {
                src: pathImage,
                titleSrc: 'Fechar'
            },
            type: 'image',
            callbacks: {
                beforeClose: function() {
                    $("#Form60").submit();
                },
            },
        });

        $('.mfp-title').hide();
        $('img.mfp-img').attr('title', msgTitleModal).attr('alt', msgAltModal);
        $('.mfp-close').html('X');
        $('.mfp-close').css('color', 'white');
        $('.mfp-close').css('cursor', 'pointer');
        $('.mfp-close').attr('onclick', 'trackBradesco("Portal '+segmentName.toUpperCase()+' - Home","Cabeçalho","Acessar a conta - fechar")');
    },

    topBar: function() {

        var nib_urlSegmento       = window.location.href;
        var nib_urlImgIntervencao = "";
        var nib_segmento          = "";

        if ( nib_urlSegmento.indexOf( "/html/classic/" ) != -1 ) {
            nib_segmento="classic";
        }

        if ( nib_urlSegmento.indexOf( "/html/exclusive/" ) != -1 ) {
            nib_segmento="exclusive";
        }

        if ( nib_urlSegmento.indexOf( "/html/prime/" ) != -1 ) {
            nib_segmento="prime";
        }

        if ( nib_urlSegmento.indexOf( "/html/private/" ) != -1 ) {
            nib_segmento="private";
        }

        nib_urlImgIntervencao = "/assets/common/img/novoIb/"+nib_segmento+".jpg";

        $('.btn-ok').click(function(event) {

            event.preventDefault();
           
            if(nib_segmento == "private"){
                novoIB.createCookie("qtd-intervencao", 4);
                $("#Form60").submit();
            }

            var qtdViewsModal = novoIB.getCookie("qtd-intervencao");
            
            if(qtdViewsModal >= 3) {
                $("#Form60").submit();
            } else {
                qtdViewsModal++;                
                novoIB.createCookie("qtd-intervencao", qtdViewsModal);
                novoIB.openModalNovoIB(nib_urlImgIntervencao, nib_segmento);
            }            
        });
    }
}

novoIB._onLoad();
