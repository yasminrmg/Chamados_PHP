var Usuario =
{
    cadastrar : function()
    {
        event.preventDefault();
        if(Master.validaFormulario("formCadastro"))
        {
            var Ajax = new RunAjax();
            Ajax._url = 'acoes/inserir_usuario.php';
            Ajax._method = 'POST';
            Ajax._tipo_data = 'json';
            Ajax._postdata ={'dados': $("#formCadastro").serializeArray() };
            Ajax.setMostraCarregando(true);
            Ajax.setFechaCarregando(true);
            Ajax.setMostraErro(true);
            Ajax.setFuncaoInicia(null);
            Ajax.setFuncaoFinaliza(Usuario.trataRetornoCadastro);
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
            $("#dvCadastro").hide();
            $("#dvConclusao").show();
            $("#dvConclusao").removeClass('d-none');
        }
        else
            Master.exibeModalAviso("erro", "Ocorreu um erro ao realizar o cadastro.", "Atenção!")
    }
};