function justNumbers(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
};

$('document').ready(function(){
    $( '#agencia' ).keyup(function(e) {
        var valor = $(e.target).val();
        let maxLength = $(e.target).attr('maxLength');
        if(valor.length == maxLength) {
            $('#conta').focus();
        }
    });
    $( '#conta' ).keyup(function(e) {
        var valor = $(e.target).val();
        let maxLength = $(e.target).attr('maxLength');
        if(valor.length == maxLength) {
            $('#digito').focus();
        }
    });
});

function ValidaDigito()

{

	var lsoma = 0;

	var ipeso = 2;

	var dv_informado = $( '#digito' ).val();

	var dv_conta = $( '#conta' ).val();

	var tam = $( '#conta' ).val().length;

	var conta = new Array(tam);

	for (i=0; i<=tam; i++) 

	{conta[i] = dv_conta.substr( i, 1);}

	 while (tam > 0)

	{

		digito = conta[--tam];

		if ((digito >= 0) && (digito <= 9)) 

		{ 

			lsoma = lsoma + (digito - 0) * ipeso; 

			ipeso = ipeso + 1; 

			if (ipeso > 7) 

			{ipeso = 2;}

		} 

	}

	lsoma %= 11; 

	lsoma = 11 - lsoma;

	if ((lsoma == 11) || (lsoma == 10))

	{lsoma = 0;}

	if (parseInt(dv_informado) == parseInt(lsoma))

	{RetDig = true;}

	else

	{RetDig = false;}

	return RetDig;	

}

function ValidaLogin(event) {
    
    let agencia = $( '#agencia' ).val();
    let conta = $( '#conta' ).val();
    let digito = $( '#digito' ).val();



    if (isNaN(parseInt(agencia))== true) {
        alert("Favor preencher o campo agência");
        $( '#agencia' ).focus();
        return false;
    }

    if (isNaN(parseInt(conta))== true) {
        alert("Favor preencher o campo conta");
        $( '#conta' ).focus();
        return false;
    }

    if (isNaN(parseInt(digito))== true) {
        alert("Favor preencher o dígito de sua conta");
        $( '#digito' ).focus();
        return false;
    }

    if(!ValidaDigito()){
        alert("Informações inválidas. Por favor, verifique agência, conta e dígito");
        $( '#conta' ).val('');
        $( '#digito' ).val('');
        $( '#conta' ).focus();
        return false;
    }
    return true;
}