var Login = 
{
    validar : function()
    {
        event.preventDefault();
        if(Master.validaFormulario("formLogin"))
        {
            var Ajax = new RunAjax();
            Ajax._url = 'acoes/validar_login.php';
            Ajax._method = 'POST';
            Ajax._tipo_data = 'json';
            Ajax._postdata ={'usuario': $("#txtUsuario").val(), 'senha': $("#txtSenha").val()};
            Ajax.setMostraCarregando(true);
            Ajax.setFechaCarregando(true);
            Ajax.setMostraErro(true);
            Ajax.setFuncaoInicia(null);
            Ajax.setFuncaoFinaliza(Login.trataRetorno);
            Ajax.setFuncaoErro(null);
            Ajax.Execute();
        }
        else
            return false;
    },
    trataRetorno : function(dados)
    {
        if (dados.SUCESSO == true)
        {	
            $(location).attr('href', 'solicitacoes.php');
        }
        else
            Master.exibeModalAviso("aviso", "Usuário e/ou senha inválidos.", "Atenção!")
    }
};