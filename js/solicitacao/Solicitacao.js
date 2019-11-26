var Solicitacao =
{
    carregar : function()
    {
        //event.preventDefault();
        var Ajax = new RunAjax();
        Ajax._url = 'acoes/listar_solicitacao.php';
        Ajax._method = 'POST';
        Ajax._tipo_data = 'json';
        Ajax._postdata ={};
        Ajax.setMostraCarregando(true);
        Ajax.setFechaCarregando(true);
        Ajax.setMostraErro(true);
        Ajax.setFuncaoInicia(null);
        Ajax.setFuncaoFinaliza(Solicitacao.trataRetornoSolicitacoes);
        Ajax.setFuncaoErro(null);
        Ajax.Execute();
    },
    trataRetornoSolicitacoes : function(dados)
    {
        if (dados.SUCESSO == true)
        {	
            $(dados.SOLICITACOES).appendTo("#listaSolicitacao");
        }
        else
            Master.exibeModalAviso("erro", "Ocorreu um erro ao cadastrar a solicitaçaõ.", "Atenção!")
    },
    cadastrar : function()
    {
        event.preventDefault();
        if(Master.validaFormulario("formSolicitacao"))
        {
            var Ajax = new RunAjax();
            Ajax._url = 'acoes/inserir_solicitacao.php';
            Ajax._method = 'POST';
            Ajax._tipo_data = 'json';
            Ajax._postdata ={'dados': $("#formSolicitacao").serializeArray() };
            Ajax.setMostraCarregando(true);
            Ajax.setFechaCarregando(true);
            Ajax.setMostraErro(true);
            Ajax.setFuncaoInicia(null);
            Ajax.setFuncaoFinaliza(Solicitacao.trataRetornoCadastro);
            Ajax.setFuncaoErro(null);
            Ajax.Execute();
        }
        else
            return false;
    },
    trataRetornoCadastro : function(dados)
    {
        if (dados.SUCESSO == true)
        {	
            Master.exibeModalAviso("sucesso", "Solicitação criada com sucesso", "Sucesso!");
            Solicitacao.reset();
            //$('#formSolicitacao ')[0].reset(); //reset formulario
            //$('#corpoSolictacao').removeClass('show');//escondo o formulario de criação
        }
        else
            Master.exibeModalAviso("erro", "Ocorreu um erro ao cadastrar a solicitação.", "Atenção!")
    },
    alterarSolicitacao : function(s_status, id_solicitacao)
    {
        //event.preventDefault();
        var dados = {'ID_SOLICITACAO':id_solicitacao, 'STATUS':s_status};
        
        if(Master.validaFormulario("formSolicitacao"))
        {
            var Ajax = new RunAjax();
            Ajax._url = 'acoes/alterar_solicitacao.php';
            Ajax._method = 'POST';
            Ajax._tipo_data = 'json';
            Ajax._postdata ={'dados': dados };
            Ajax.setMostraCarregando(true);
            Ajax.setFechaCarregando(true);
            Ajax.setMostraErro(true);
            Ajax.setFuncaoInicia(null);
            Ajax.setFuncaoFinaliza(Solicitacao.trataRetornoAlteracao);
            Ajax.setFuncaoErro(null);
            Ajax.Execute();
        }
        else
            return false;
    },
    trataRetornoAlteracao : function(dados)
    {
        if (dados.SUCESSO == true)
        {	
            $("#dvCadastro").hide();
            $("#dvConclusao").show();
            $("#dvConclusao").removeClass('d-none');
        }
        else
            Master.exibeModalAviso("erro", "Ocorreu um erro ao cadastrar a solicitaçaõ.", "Atenção!");
    },
    reset: function(){
        event.preventDefault();
        $('#formSolicitacao ')[0].reset(); //reset formulario
        $('#corpoSolictacao').removeClass('show');//escondo o formulario de criação
        $('#abaNovaSolicitacao h2 button').attr('aria-expanded','false');
    }
};