var acisionSDKV = null;
var clienteAgencia = '0000';
var clienteConta = '00000000';
var clienteDigito = '0';
var protocolo = document.location.protocol;


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');

    for (var i = 0; i < ca.length; i++) {
        var c = ca[i].replace(" ", "");
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

var agCookies = getCookie('bra_iscli');
if (agCookies.length > 0) {
    agCookies = agCookies.split('D');

    clienteAgencia = agCookies[1].slice(0, 4);
    clienteConta = agCookies[1].slice(4, 11);
    clienteDigito = agCookies[1].slice(11, 12);

    //console.log('Agência: %s / CC: %s / DV: %s', clienteAgencia, clienteConta, clienteDigito);
	if (clienteAgencia === '3100') {
		$('.posso_ajudar').show('slow');
	} else {
		var contaCorrente = {};
		var DTO = null;

		contaCorrente.agencia = parseInt(clienteAgencia);
		contaCorrente.conta = parseInt(clienteConta);
		contaCorrente.digito = parseInt(clienteDigito);

		DTO = { 'conta': contaCorrente };
		$.support.cors = true;
		$.ajax({
			type: "POST",
			crossDomain: true,
			url: protocolo + "//" + Global.TranslateAddress("wspf.banco.bradesco") + "/wsAtendimentoDigital/Contas.asmx/ExisteConta",
			data: JSON.stringify(DTO),
			dataType: "json",
			contentType: "application/json; charset=utf-8"
		}).done(function (response) {
			if (response.d) {
				$('.posso_ajudar').show('slow');
			}
		}).fail(function(xhr, errorString, exception) {
			console.log("xhr.status="+xhr.status+" error="+errorString+" exception=|"+exception+"|");
		})
	}
} else {
	$('.posso_ajudar').hide();
}

var cdCliente = Math.floor(Math.random() * (99999 - 00001) + 00001);
var nmCliente = 'client.' + clienteAgencia + '.' + clienteConta + '' + clienteDigito + '.' + cdCliente;

var user_agent = navigator.userAgent;
//console.log('User Agent: %O', user_agent);

if (!(user_agent.toLowerCase().indexOf('chrome') != -1 || user_agent.toLowerCase().indexOf('firefox') != -1)) {
    //$('.agencia_e_conta').hide();
    //$('.compatibilidade').show();
}

var coCookies = getCookie('bra_nav_cons_classic_online_track');

/*
if (coCookies.length > 0) {
    $('.termos_de_uso').css('display', 'none');
    $('.agencia_e_conta').css('display', 'block');
    //$('.controles_chat').css('display', 'block');
}
*/

function getTurnoAtual() {
    var turnoAtual;
    var horaAtual = new Date().getHours();

    if (horaAtual > 8 && horaAtual < 12) {
        turnoAtual = 'turno1';
    }
    else {
        if (horaAtual >= 12 && horaAtual < 18) {
            turnoAtual = 'turno2';
        }
        else {
            turnoAtual = 'turno3';
        }
    }

    return turnoAtual;
}

function abreChat(){
	window.open("http://icm.banco-virtual.com.br/website/banco-virtual-digital/banco-virtual-digital.jsp", "win_name","menubar=no, resizable=no, scrollbars=no, status=no, titlebar=no, toolbar=no,top=300,left=620,width=560,height=424");
	$('.toggle_chat').hide('slow');
}

function validaAgenciaConta(agencia, conta, digito) {
    var contaCorrente = {};
    var DTO = null;

    contaCorrente.agencia = parseInt(agencia);
    contaCorrente.conta = parseInt(conta);
    contaCorrente.digito = parseInt(digito);

    DTO = { 'conta': contaCorrente };

                //permitir todas as contas da 3100
                $('.agencia_e_conta').hide();
                if (agencia == '3100'){
                               if (coCookies.length > 0) {
                                               $('.controles_chat').show();
                                               window.open("http://icm.banco-virtual.com.br/website/banco-virtual-digital/banco-virtual-digital.jsp", "janela","top=300,left=620,width=560,height=424,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no");
                                               $('.toggle_chat').hide('slow');
                               } else {
                                               $('.termos_de_uso').show();
                               }
                } else {
	$.support.cors = true;
    $.ajax({
        type: "POST",
        crossDomain: true,
        url: protocolo + "//" + Global.TranslateAddress("wspf.banco.bradesco") + "/wsAtendimentoDigital/Contas.asmx/ExisteConta",
        data: JSON.stringify(DTO),
        dataType: "json",
        contentType: "application/json; charset=utf-8"
    }).done(function (response) {
        //console.log("done");

        $('.agencia_e_conta').hide();

        // limpa os valores previamente digitados para caso retorne à tela
        $('#txtAgencia').val('');
        $('#txtContaNumero').val('');
        $('#txtContaDigito').val('');

        if (response.d) {
		 //$('.posso_ajudar').show('slow');
            clienteAgencia = agencia;
            clienteConta = conta;
            clienteDigito = digito;
            nmCliente = 'client.' + clienteAgencia + '.' + clienteConta + '' + clienteDigito + '.' + cdCliente;

            if (coCookies.length > 0) {
                $('.controles_chat').show();
			   window.open("http://icm.banco-virtual.com.br/website/banco-virtual-digital/banco-virtual-digital.jsp", "janela","top=300,left=620,width=560,height=424,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no");
			   $('.toggle_chat').hide('slow');
            } else {
                $('.termos_de_uso').show();
            }
        } else {
            $('.sem_acesso').show();
        }

    }).fail(function (response) {
        //console.log("fail");
    });
                }
}


$(function () {
    // Exibir ou esconder menu dos chats
    $('.header_chat').click(function (e) {
	   $('.toggle_chat').slideToggle('slow', function () {
            if ($('.posso_ajudar').hasClass('ativo')) {
                $('.posso_ajudar').removeClass('ativo');

                //if (acisionSDKT === null) {
                    //$('.toggle_chat').hide('slow');
                    $('.controles_texto').hide();
                    $('.controles_video').hide();
                    $('.gerentes_ocupados').hide();
                    $('#possoAjudar_encerrar').hide();
                    $('.controles_menu').show();
                //}
            }
            else {
                $('.posso_ajudar').addClass('ativo');
            }
        });
    });

    $('#btnContinua').click(function () {
        if ($('#cbConfirma').prop('checked')) {
            $('.termos_de_uso').hide();

            // cria o cookie que registra se o usuario já aceito o termo de uso
            var cookie_track_name = 'bra_nav_cons_classic_online_track';
            var now = new Date();
            var year = '0' + now.getFullYear();
            var month = '0' + (now.getMonth() + 1);
            var day = '0' + now.getDate();
            var hours = '0' + now.getHours();
            var minutes = '0' + now.getMinutes();
            var seconds = '0' + now.getSeconds();
            var ts = year.substr(year.length - 4, 4) + month.substr(month.length - 2, 2) + day.substr(day.length - 2, 2) + hours.substr(hours.length - 2, 2) + minutes.substr(minutes.length - 2, 2) + seconds.substr(seconds.length - 2, 2);
            var string_timestamp = '[' + ts + ']';
            var termos_de_uso = 'termos_de_uso=true';
            var new_cookie_val = string_timestamp + '#' + termos_de_uso;

            setCookie(cookie_track_name, new_cookie_val, 360);

           // $('.controles_chat').show();
            //$('.agencia_e_conta').show();
			window.open( "http://icm.banco-virtual.com.br/website/banco-virtual-digital/banco-virtual-digital.jsp", "_blank","toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,top=300,left=620,width=560,height=420");
			$('.toggle_chat').hide('slow');
        }
    });

    $('#btnContinuaAC').click(function () {

        if ($('#txtAgencia').val() !== '' && $('#txtContaNumero').val() !== '' && $('#txtContaDigito').val() !== '') {

            // limpa os erros de validacao
            $('#erro_validacao_agencia').css('display', 'none');
            $('#erro_validacao_conta_numero').css('display', 'none');
            $('#erro_validacao_conta_digito').css('display', 'none');

            // verifica se a conta esta cadastrada no servico
            validaAgenciaConta($('#txtAgencia').val(), $('#txtContaNumero').val(), $('#txtContaDigito').val());

        }
        else {
            // validacao agencia
            if ($('#txtAgencia').val() === '') {
                $('#erro_validacao_agencia').html('');
                $('#erro_validacao_agencia').html('Favor preencher o campo agência');
                $('#erro_validacao_agencia').css('display', 'inline-block');
            }
            else {
                $('#erro_validacao_agencia').html('');
                $('#erro_validacao_agencia').css('display', 'none');
            }

            // validacao conta numero
            if ($('#txtContaNumero').val() === '') {
                $('#erro_validacao_conta_numero').html('');
                $('#erro_validacao_conta_numero').html('Favor preencher o campo conta');
                $('#erro_validacao_conta_numero').css('display', 'inline-block');
            }
            else {
                $('#erro_validacao_conta_numero').html('');
                $('#erro_validacao_conta_numero').css('display', 'none');
            }

            // validacao conta digito
            if ($('#txtContaDigito').val() === '') {
                $('#erro_validacao_conta_digito').html('');
                $('#erro_validacao_conta_digito').html('Favor preencher o campo digito');
                $('#erro_validacao_conta_digito').css('display', 'inline-block');
            }
            else {
                $('#erro_validacao_conta_digito').html('');
                $('#erro_validacao_conta_digito').css('display', 'none');
            }
        }
    });

    $('#txtAgencia, #txtContaNumero, #txtContaDigito').keypress(function (e) {
        //console.log(e.which);
        // Permitir apenas Backspace, Delete e Setas para Esquerda e Direita
        if (e.which != 0 && e.which != 8 && (e.which < 48 || e.which > 57)) {
            e.preventDefault();
        }
    });

    $('#txtAgencia, #txtContaNumero').keyup(function (e) {
        if (parseInt($(this).attr('maxlength')) === $(this).val().length) {
            $("#" + $(this).attr('proximo-campo')).focus();
        }
    });

    // Encerrar chamada
    $('#possoAjudar_encerrar').click(function (e) {
        if (acisionSDKT !== null) {
            ChatTextoLogoff();
        }

        if (acisionSDKV !== null) {
            if (mediaSession !== null && typeof mediaSession !== 'undefined') {
                ChatVideoLogoff();
            }
        }

        $('.posso_ajudar').removeClass('ativo');
        $('.toggle_chat').hide('slow');
        $('.controles_texto').hide();
        $('#gerenteStatus').hide();
        $('.controles_video').hide();
        $('.gerentes_ocupados').hide();
        $('#possoAjudar_encerrar').hide('slow');
        $('.controles_menu').show();
    });

    $('#btnFecharSemAcesso').click(function () {
        $('#possoAjudar_encerrar').click();
        $('.sem_acesso').hide();
        $('.agencia_e_conta').css('display', 'block');
    });
});