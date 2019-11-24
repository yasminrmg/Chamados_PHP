<?php
    include '../classes/condominio/class.Apartamento.php';

    $condominio= $_POST["condominio"];

    $apartamentoDao = new ApartamentoDao();
    $retorno = array();
    $resultado = $apartamentoDao->listarApartamentos($condominio);


    $retorno["APARTAMENTOS"] = $resultado;
    $retorno["SUCESSO"]= true;	

    echo json_encode($retorno);
?>