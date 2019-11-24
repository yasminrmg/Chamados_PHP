var Apartamento = 
{
    popular : function()
    {
        var Ajax = new RunAjax();
        Ajax._url = 'acoes/listar_apartamento.php';
        Ajax._method = 'POST';
        Ajax._tipo_data = 'json';
        Ajax._postdata ={'condominio': $(".condominio").val() };
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
                    + item.CODIGO
                    + '">'
                    + item.NOME
                    + '</option>'
                );
            });
        }
        else
            Master.exibeModalAviso("erro", "Ocorreu um erro ao carregar os apartamentos.", "Atenção!")
    }
};