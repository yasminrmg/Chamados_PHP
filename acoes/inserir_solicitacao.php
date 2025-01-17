<?php
    include '../classes/solicitacao/class.solicitacao.php';
    include_once '../classes/class.Sessao.php';

    $sessao = new Sessao();

    $codUsuario = $nome = $sessao->pegaValorSessao("CodUsuario");
    $tipoUsuario = $nome = $sessao->pegaValorSessao("TipoUsuario");

    if($codUsuario){
        
        foreach($_POST['dados'] as $itens)
        {
            $dados[$itens['name']]= str_replace("'", "''", $itens['value']) ;
        }
        if($dados['txtDuracaoEnvento']!=null){
            $data = date("Y-m-d", strtotime($dados['txtDuracaoEnvento']));
        }else{
            $data = null;
        }

        $usuarioDao = new Solicitacao();
        $retorno = array();
        $usuarioDao->criaSolicitacao($dados['txtTitulo'], $dados['txtDescricao'], $codUsuario, $dados['sltTipoSolicitacao'], $data, $dados['txtDuracaoEnvento'], $statusSolicitacao = 1);
        $retorno["SUCESSO"]= true; 
    }else{
        $retorno["SUCESSO"]=false;
        $retorno["MSG"]="Login inativo";
    }
    echo json_encode($retorno);
?>