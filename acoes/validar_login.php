<?php
    include('../classes/usuario/class.Usuario.php');
    include_once('../classes/class.Sessao.php');

    $usuario= $_POST["usuario"];
    $senha= $_POST["senha"];

    $usuarioDao = new UsuarioDao();
    $retorno = array();
    $resultado = $usuarioDao->validaLogin($usuario, $senha);
  
    if($resultado[0]["SUCESSO"])
    {
        if($resultado[0]["PERMITIDO"] == 1)
        {	
            $retorno["TIPOUSUARIO"]= $resultado[0]["ID_TIPO_USUARIO"];
            
            $sessao = new Sessao();
            
            $sessao->gravaValorSessao('CodUsuario',$resultado[0]["ID_USUARIO"]);
            $sessao->gravaValorSessao('NomeUsuario',$resultado[0]["NOME_USUARIO"]);
            $sessao->gravaValorSessao('TipoUsuario',$retorno["TIPOUSUARIO"]);
        
            $retorno["SUCESSO"]= true;
        }
        else
            $retorno["SUCESSO"]= false;
    }
    else
        $retorno["SUCESSO"]= false;	

    echo json_encode($retorno);
?>