<?php
    include '../classes/solicitacao/class.solicitacao.php';
    include_once '../classes/class.Sessao.php';

    $sessao = new Sessao();

    $codUsuario = $nome = $sessao->pegaValorSessao("CodUsuario");
    $tipoUsuario = $nome = $sessao->pegaValorSessao("TipoUsuario");

    if($codUsuario){
        $idSolicitacao = $_POST['dados']['ID_SOLICITACAO'];
        $statusSolicitacao = $_POST['dados']['STATUS'];

        $usuarioDao = new Solicitacao();
        $retorno = array();
        $usuarioDao->alteraSolicitacao($idSolicitacao, $statusSolicitacao, $codUsuario);
        
        $retorno["SUCESSO"]= true;
    }else{
        $retorno["SUCESSO"] = false;
        $retorno["MSG"] = "Usuario não logado";
    }

    echo json_encode($retorno);
?>