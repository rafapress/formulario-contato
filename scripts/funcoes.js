$(function () {

  $('#botao-enviar-contato').click(function () {

    if ($('#txtNome').val() == '') {
      $('#txtNome').addClass('erro').attr('placeholder', 'Informe o nome').focus();
      return;
    }

    if ($('#txtEmail').val() == '') {
      $('#txtEmail').addClass('erro').attr('placeholder', 'Informe o e-mail').focus();
      return;
    }

    if ($('#txtMensagem').val() == '') {
      $('#txtMensagem').addClass('erro').attr('placeholder', 'Escreva sua mensagem').focus();
      return;
    }

    $.ajax({
      type: 'POST',
      url: 'formulario.php',
      data: $('#formulario').serializeArray(),
      success: function (retorno) {

        $('input, textarea').val('');

        $('#txtNome').attr('placeholder', 'Nome *');
        $('#txtEmail').attr('placeholder', 'E-mail *');
        $('#txtTelefone').attr('placeholder', 'Telefone ou Skype');
        $('#txtMensagem').attr('placeholder', 'Mensagem *');

        $('#formulario-retorno-envio').fadeIn('fast');

      }

    });

  });

});