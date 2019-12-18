<?php
    include "classes/class.Sessao.php";
    
    $sessao = new Sessao();

    $sessao->logout();
    header("Location: index.php");
	exit;
?>