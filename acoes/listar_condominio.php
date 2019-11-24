<?php
    include '../classes/condominio/class.Condominio.php';

    $condominioDao = new CondominioDao();
    $retorno = array();
    $resultado = $condominioDao->listarCondominios();


    $retorno["CONDOMINIOS"] = $resultado;
    $retorno["SUCESSO"]= true;	

    echo json_encode($retorno);
?>