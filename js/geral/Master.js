var Master =
{
    validaFormulario: function (idPai) {
        var txtNPreenchidos = 0;

        $('#' + idPai + ' input[type="password"].obrigatorio:visible, input[type="text"].obrigatorio:visible, select.obrigatorio:visible, textarea.obrigatorio:visible').each
            (
                function (indice, elemento) {
                    $(elemento).removeClass('nao-preenchido');

                    if ($.trim($(elemento).val()) == '') {
                        $(elemento).addClass('nao-preenchido');
                        txtNPreenchidos++;
                    }
                }
            );

        $('#' + idPai + ' label.obrigatorio > input[type="checkbox"]:visible').each
            (
                function (indice, elemento) {
                    $(elemento).removeClass('nao-preenchido');

                    if (!$(elemento).is(':checked')) {
                        $(elemento).addClass('nao-preenchido');
                        txtNPreenchidos++;
                    }
                }
            );

        $('#' + idPai + ' span.obrigatorio > input[type="checkbox"]:visible').each
            (
                function (indice, elemento) {
                    $(elemento).removeClass('nao-preenchido');

                    if (!$(elemento).is(':checked')) {
                        $(elemento).addClass('nao-preenchido');
                        txtNPreenchidos++;
                    }
                }
            );

        $('#' + idPai + ' input[type="checkbox"].obrigatorio:visible').each
            (
                function (indice, elemento) {
                    $(elemento).removeClass('nao-preenchido');

                    if (!$(elemento).is(':checked')) {
                        $(elemento).addClass('nao-preenchido');
                        txtNPreenchidos++;
                    }
                }
            );

        $('#' + idPai + ' .div_obrigatoria:visible').each
            (
                function (indice, elemento) {
                    $(elemento).removeClass('nao-preenchido');

                    if ($(elemento).find("label > input[type='radio']:checked").length == 0) {
                        $(elemento).addClass('nao-preenchido');
                        txtNPreenchidos++;
                    }
                }
            );

        $('#' + idPai + ' .div_obrigatoria_span:visible').each
            (
                function (indice, elemento) {
                    $(elemento).removeClass('nao-preenchido');

                    if ($(elemento).find("label > span > input[type='radio']:checked").length == 0) {
                        $(elemento).addClass('nao-preenchido');
                        txtNPreenchidos++;
                    }
                }
            );

        $('#' + idPai + ' .tabela-minimo-obrigatorio:visible').each
            (
                function (indice, elemento) {
                    $(elemento).removeClass('nao-preenchido');
                    var qnt = $(elemento).attr('class').split(' ')[3].replace('qntMinima-', '');

                    if ($(elemento).find("tbody tr").length < qnt) {
                        $(elemento).addClass('nao-preenchido');
                        txtNPreenchidos++;
                    }
                }
            );

        $('#' + idPai + ' .minlength-obrigatorio:visible').each
            (
                function (indice, elemento) {
                    $(elemento).removeClass('nao-preenchido');
                    var qnt = $(elemento).attr('class').split(' ')[2].replace('minlength-', '');

                    if ($(elemento).val().length < qnt) {
                        $(elemento).addClass('nao-preenchido');
                        txtNPreenchidos++;
                        $(elemento).next('.minlength-aviso').css('display', 'block')
                    }
                    else
                        $(elemento).next('.minlength-aviso').css('display', 'none')
                }
            );

        if (txtNPreenchidos > 0) {
            $('html').animate
                (
                    {
                        scrollTop: $(".nao-preenchido").first().parent().offset().top
                    }
                    ,
                    {
                        duration: 500
                        , complete: function () {
                            Master.exibeModalAviso("erro", 'Preencha os campos em destaque.', 'Atenção');
                            //alert('Atenção! Preencha os campos em destaque.');
                        }
                    }
                );
            return false;
        }
        else
            return true;
    },
    exibeModalAviso : function (strTipo, strMensagem, strTitulo)
    {
        switch (strTipo) {
            case "erro":
                $('#lblTituloAviso').text(strTitulo == null ? "ERRO!" : strTitulo);
                $('#lblTituloAviso').attr('class', "modalErro");
                $('#lblTextoAviso').text(strMensagem);
                $('#modal_aviso_generico').modal('show');
                break;
            case "sucesso":
                $('#lblTituloAviso').text(strTitulo == null ? "SUCESSO!" : strTitulo);
                $('#lblTituloAviso').attr('class', "modalSucesso");
                $('#lblTextoAviso').text(strMensagem);
                $('#modal_aviso_generico').modal('show');
                break;
            case "aviso":
                $('#lblTituloAviso').text(strTitulo == null ? "AVISO!" : strTitulo);
                $('#lblTituloAviso').attr('class', "modalAviso");
                $('#lblTextoAviso').text(strMensagem);
                $('#modal_aviso_generico').modal('show');
                break;
        }
    },
    //Exemplo de uso: Master.exibeAlerta($('#idpainel'), 'alerta1', 'danger', 'teste', true, 0);
    exibeAlerta: function (alvo, idAlerta, tipo, conteudo, permiteFechar, tempoFechamentoAutomatico) {
        var mensagem = '<div role="alert" class="alert alert-' + tipo + (permiteFechar ? ' alert-dismissible' : '') + '" id="' + idAlerta + '" style="display: none;">';

        if (permiteFechar)
        {
            mensagem += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            mensagem += '<span aria-hidden="true">&times;</span>';
            mensagem += '</button>';
        }

        mensagem += conteudo;
        mensagem += '</div>';

        $(alvo).append(mensagem);
        $('#' + idAlerta).slideDown();

        if (tempoFechamentoAutomatico > 0)
        {
            setTimeout
                (
                    function ()
                    {
                        $('#' + idAlerta).slideUp();
                        //setTimeout(function () { $('#' + idAlerta).alert('close'); }, 1000)
                    },
                    tempoFechamentoAutomatico
                );
        }
    },
    exibeCarregamento : function()
    {
        $('<div id="div_overlay" class="sombra-carregamento"><div class="area" style="top: 45%; left: 48%; position: absolute; padding-bottom: 10px; padding-right: 10px;z-index: 9999999;"><img src="imagens/carregando.gif" id="Img1" style="width: 80px; height: 40px; background-color: white; border-radius: 5px;"></div></div>').prependTo('body');
    },
    fechaCarregamento : function()
    {
        $("#div_overlay").remove();
    },
    ativaMascaras: function ()
    {
        $('.calendario.dd-mm').mask('99/99');
        $('.calendario.dd-mm-yyyy').mask('99/99/9999');

        $('.calendario.dd-mm-yyyy').datepicker(
            {
                format: "dd/mm/yyyy",
                language: "pt-BR",
                multidate: false,
                daysOfWeekHighlighted: "0, 6",
                autoclose: true,
                todayHighlight: true
            });

        $('.calendario.dd-mm').datepicker(
            {
                format: "dd/mm",
                language: "pt-BR",
                multidate: false,
                daysOfWeekHighlighted: "0, 6",
                autoclose: true,
                todayHighlight: true
            });
    }
}