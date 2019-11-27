<?php
    include '../classes/usuario/class.Usuario.php';
    include_once '../classes/class.Sessao.php';

    $sessao = new Sessao();

    $codUsuario = $nome = $sessao->pegaValorSessao("CodUsuario");
    $tipoUsuario = $nome = $sessao->pegaValorSessao("TipoUsuario");
    $nomeUsuario = $nome = $sessao->pegaValorSessao("NomeUsuario");

    if($codUsuario)
    {
        $usuario  = new UsuarioDao();
        $retorno = array();
        $resultado = $usuario->listarUsuarios($codUsuario,$tipoUsuario);

        foreach($_POST['dados'] as $itens)
        {
            $dados[$itens['name']]= str_replace("'", "''", $itens['value']) ;
        }
        
        $id_usuario = $dados['txtId'];
        $nome = $dados['txtNome'];
        $nascimento = implode("-",array_reverse(explode("/",$dados['txtNascimento'])));
        $cpf = $dados['txtCPF'];
        $sexo = $dados['sltSexo'];
        $email = $dados['txtEmail'];
        $usuario = $dados['txtUsuario'];
        $senha = $dados['txtSenha'];
        
        $condominio =null;
        $apartamento =null;
        $aprovado=null;

        if (isset($dados['sltCondominio']) && isset($dados['sltApartamento']))
        {
            $condominio = $dados['sltCondominio'];
            $apartamento = $dados['sltApartamento'];
        }else{
            ;
        }
        if(isset($dados['sltPerfilAprovado']) && $tipoUsuario!=3)
        {   
            if (is_numeric($dados['sltPerfilAprovado']))
                $aprovado = $dados['sltPerfilAprovado'];
        }

        $usuarioDao = new UsuarioDao();
        $retorno = array();
        $usuarioDao->alteraUsuario($id_usuario, $nome, $nascimento, $cpf, $sexo, $email, $usuario, $senha, $condominio, $apartamento, $aprovado);
        $retorno["SUCESSO"]= true;
    }else{
        $retorno["SUCESSO"]=false;
        $retorno["MSG"]="Login inativo";
    }

    echo json_encode($retorno);
?>