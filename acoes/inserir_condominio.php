<?php
    include '../classes/condominio/class.Condominio.php';
    include_once '../classes/class.Sessao.php';

    $sessao = new Sessao();

    $codUsuario = $nome = $sessao->pegaValorSessao("CodUsuario");
    $tipoUsuario = $nome = $sessao->pegaValorSessao("TipoUsuario");

    if($codUsuario){
        
        foreach($_POST['dados'] as $itens)
        {
            $dados[$itens['name']]= str_replace("'", "''", $itens['value']) ;
        }

        $nome_condominio = $dados['txtNomeCondominio'];
        $endereco = $dados['txtEndereco'];
        $cidade = $dados['txtCidade'];
        $uf = $dados['txtEstado'];

        $condominioDao = new CondominioDao();
        $retorno = array();
        $condominioDao->inserirCondominio($nome_condominio,$endereco,$cidade,$uf,$codUsuario);
        $retorno["SUCESSO"]= true;
    }else{
        $retorno["SUCESSO"]=false;
        $retorno["MSG"]="Login inativo";
    }
    echo json_encode($retorno);
?>