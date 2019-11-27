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

    $usuarioDao = new ApartamentoDao();
    $retorno = array();
    $usuarioDao->inserirApartamento($bloco,$ap,$vaga,$condominio);
    $retorno["SUCESSO"]= true;	

    echo json_encode($retorno);
?>