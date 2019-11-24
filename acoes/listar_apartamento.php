<?php
    include '../classes/condominio/class.Apartamento.php';

    $condominio= $_POST["condominio"];

    $apartamentoDao = new ApartamentoDao();
    $retorno = array();
    $resultado = $apartamentoDao->listarApartamentos($condominio);


    $retorno["APARTAMENTOS"] = $resultado;

    if($retorno[0]["SUCESSO"] != true)
        $retorno["SUCESSO"]= false;
    else
        $retorno["SUCESSO"]= true;	

    echo json_encode($retorno);
?>