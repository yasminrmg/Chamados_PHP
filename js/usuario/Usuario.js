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
    },
    popularCadastro : function()
    {
        //event.preventDefault();
        var Ajax = new RunAjax();
        Ajax._url = 'acoes/listar_usuario.php';
        Ajax._method = 'POST';
        Ajax._tipo_data = 'json';
        Ajax._postdata ={};
        Ajax.setMostraCarregando(true);
        Ajax.setFechaCarregando(true);
        Ajax.setMostraErro(true);
        Ajax.setFuncaoInicia(null);
        Ajax.setFuncaoFinaliza(Usuario.trataRetornoUsuarios);
        Ajax.setFuncaoErro(null);
        Ajax.Execute();
    },
    trataRetornoUsuarios : function(dados)
    {
        if (dados.SUCESSO == true)
        {	
            // $("#dvCadastro").hide();
            // $("#dvConclusao").show();
            // $("#dvConclusao").removeClass('d-none');
            
            $(dados.USUARIOS).appendTo("#lista_usuarios");
            Condominio.popular();
            Apartamento.popular();
            $('#lista_usuarios #sltApartamento').val($('#lista_usuarios #sltApartamento').attr('ap'));
            
                // var ap = $(index).find('sltApartamento');
                // var valor = $(index).attr('ap');
                // ap.select(valor);
             
        }
        else
            Master.exibeModalAviso("erro", "Ocorreu um erro ao realizar o cadastro.", "Atenção!")
    },
    alteraCadastro : function(form)
    {
        event.preventDefault();
        if(Master.validaFormulario($(form).attr('id')))
        {
            var Ajax = new RunAjax();
            Ajax._url = 'acoes/alteracao_usuario.php';
            Ajax._method = 'POST';
            Ajax._tipo_data = 'json';
            Ajax._postdata ={'dados': form.serializeArray() };
            Ajax.setMostraCarregando(true);
            Ajax.setFechaCarregando(true);
            Ajax.setMostraErro(true);
            Ajax.setFuncaoInicia(null);
            Ajax.setFuncaoFinaliza(Usuario.trataRetornoAlteracaoUsuario);
            Ajax.setFuncaoErro(null);
            Ajax.Execute();
        }
        else
            return false;
    },
    trataRetornoAlteracaoUsuario : function(dados)
    {
        if (dados.SUCESSO == true)
        {	
            // $("#dvCadastro").hide();
            // $("#dvConclusao").show();
            // $("#dvConclusao").removeClass('d-none');
            
            $(dados.USUARIOS).appendTo("#lista_usuarios");
        }
        else
            Master.exibeModalAviso("erro", "Ocorreu um erro ao realizar o cadastro.", "Atenção!")
    }
};