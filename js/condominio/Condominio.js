var Condominio = 
{
    popular : function()
    {
        var Ajax = new RunAjax();
        Ajax._url = 'acoes/listar_condominio.php';
        Ajax._method = 'POST';
        Ajax._tipo_data = 'json';
        Ajax._postdata ={};
        Ajax.setMostraCarregando(true);
        Ajax.setFechaCarregando(true);
        Ajax.setMostraErro(true);
        Ajax.setFuncaoInicia(null);
        Ajax.setFuncaoFinaliza(Condominio.trataRetorno);
        Ajax.setFuncaoErro(null);
        Ajax.Execute();
    },
    trataRetorno : function(dados)
    {
        if (dados.SUCESSO == true)
        {	
            $('.condominio *').remove();

            $.each(dados.CONDOMINIOS, function(indice, item) {
                $('.condominio').append
                (
                    '<option value="'
                    + item.id_condominio
                    + '">'
                    + item.nome_condominio
                    +'</option>'
                );
            });

            Apartamento.popular(dados.CONDOMINIOS[0].id_condominio);  
        }
        else
            Master.exibeModalAviso("erro", "Ocorreu um erro ao carregar os condomínios.", "Atenção!")
    }
};