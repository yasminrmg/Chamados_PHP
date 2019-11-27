var Apartamento = 
{
    popular : function(condominio = null)
    {
        var Ajax = new RunAjax();
        Ajax._url = 'acoes/listar_apartamento.php';
        Ajax._method = 'POST';
        Ajax._tipo_data = 'json';
        Ajax._postdata ={'condominio': condominio != null ? condominio : $(".condominio").val() };
        Ajax.setMostraCarregando(true);
        Ajax.setFechaCarregando(true);
        Ajax.setMostraErro(true);
        Ajax.setFuncaoInicia(null);
        Ajax.setFuncaoFinaliza(Apartamento.trataRetorno);
        Ajax.setFuncaoErro(null);
        Ajax.Execute();
    },
    trataRetorno : function(dados)
    {
        if (dados.SUCESSO == true)
        {	
            $('.apartamento *').remove();

            $.each(dados.APARTAMENTOS, function(indice, item) {
                $('.apartamento').append
                (
                    '<option value="'
                    + item.id_apartamento
                    + '">'
                    + item.bloco + ' - Nº ' + item.n_apartamento
                    + '</option>'
                );
            });
        }
        else
            Master.exibeModalAviso("erro", "Ocorreu um erro ao carregar os apartamentos.", "Atenção!")
    },
    cadastrar : function()
    {
        event.preventDefault();
        if(Master.validaFormulario("formCadastroAP"))
        {
            var Ajax = new RunAjax();
            Ajax._url = 'acoes/inserir_apartamento.php';
            Ajax._method = 'POST';
            Ajax._tipo_data = 'json';
            Ajax._postdata ={'dados': $("#formCadastroAP").serializeArray() };
            Ajax.setMostraCarregando(true);
            Ajax.setFechaCarregando(true);
            Ajax.setMostraErro(true);
            Ajax.setFuncaoInicia(null);
            Ajax.setFuncaoFinaliza(Apartamento.trataRetornoCadastroAP);
            Ajax.setFuncaoErro(null);
            Ajax.Execute();
        }
        else
            return false;
    },
    trataRetornoCadastroAP : function(dados)
    {
        if (dados.SUCESSO == true)
        {	
            $("#dvCadastro").hide();
            $("#dvConclusao").show();
            $("#dvConclusao").removeClass('d-none');
        }
        else
            Master.exibeModalAviso("erro", "Ocorreu um erro ao realizar o cadastro.", "Atenção!")
    },
};