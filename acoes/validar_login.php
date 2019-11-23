<?php
    include '../classes/usuario/class.Usuario.php';
    include_once '../classes/class.Sessao.php';

    $usuario= $_POST["usuario"];
    $senha= $_POST["senha"];

    $usuarioDao = new UsuarioDao();
    $retorno = array();
    $resultado = $usuarioDao->validaLogin($usuario, $senha);


    if($resultado[0]["SUCESSO"])
    {
        if($resultado[0]["PERMITIDO"] == 1)
        {	
            $retorno["ADMINISTRATIVO"]= $resultado[0]["ADMINISTRATIVO"] == 1 ? true : false;
            
            $sessao = new Sessao();
            
            $sessao->gravaValorSessao('CodUsuario',$resultado[0]["ID_USUARIO"]);
            $sessao->gravaValorSessao('NomeUsuario',$resultado[0]["NOME_USUARIO"]);

            if(!$retorno["ADMINISTRATIVO"])
                $sessao->gravaValorSessao('Administrativo',false);
            else
                $sessao->gravaValorSessao('Administrativo',true);
        
            $retorno["SUCESSO"]= true;
        }
        else
            $retorno["SUCESSO"]= false;
    }
    else
        $retorno["SUCESSO"]= false;	

    echo json_encode($retorno);
?>