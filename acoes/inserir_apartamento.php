<?php
    include '../classes/condominio/class.Apartamento.php';

    foreach($_POST['dados'] as $itens)
	{
		$dados[$itens['name']]= str_replace("'", "''", $itens['value']) ;
    }


    $bloco = $dados['txtBloco'];
    $ap = $dados['txtAP'];
    $vaga = $dados['txtVaga'];
    $condominio = $dados['sltCondominio'];

    $apartamentoDao = new ApartamentoDao();
    $retorno = array();
    $apartamentoDao->inserirApartamento($bloco,$ap,$vaga,$condominio);
    $retorno["SUCESSO"]= true;	

    echo json_encode($retorno);
?>