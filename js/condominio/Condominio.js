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
    },
    cadastrar: function() {
        event.preventDefault();
        if (Master.validaFormulario("formCadastroCondominio")) {
            var Ajax = new RunAjax();
            Ajax._url = "acoes/inserir_condominio.php";
            Ajax._method = "POST";
            Ajax._tipo_data = "json";
            Ajax._postdata = {
                dados: $("#formCadastroCondominio").serializeArray()
            };
            Ajax.setMostraCarregando(true);
            Ajax.setFechaCarregando(true);
            Ajax.setMostraErro(true);
            Ajax.setFuncaoInicia(null);
            Ajax.setFuncaoFinaliza(Condominio.trataRetornoCadastroCondominio);
            Ajax.setFuncaoErro(null);
            Ajax.Execute();
        } else return false;
    },
    trataRetornoCadastroCondominio: function(dados) {
        if (dados.SUCESSO == true) {
            $("#dvCadastro").hide();
            $("#dvConclusao").show();
            $("#dvConclusao").removeClass("d-none");
        } else
            Master.exibeModalAviso(
                "erro",
                "Ocorreu um erro ao realizar o cadastro.",
                "Atenção!"
            );
    }
};