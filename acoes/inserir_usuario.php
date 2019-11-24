<?php
    include '../classes/usuario/class.Usuario.php';

    foreach($_POST['dados'] as $itens)
	{
		$dados[$itens['name']]= str_replace("'", "''", $itens['value']) ;
    }
    
    $nome = $dados['txtNome'];
    $nascimento = implode("-",array_reverse(explode("/",$dados['txtNascimento'])));
    $cpf = $dados['txtCPF'];
    $sexo = $dados['sltSexo'];
    $email = $dados['txtEmail'];
    $usuario = $dados['txtUsuario'];
    $senha = $dados['txtSenha'];
    $condominio = $dados['sltCondominio'];
    $apartamento = $dados['sltApartamento'];

    $usuarioDao = new UsuarioDao();
    $retorno = array();
    $usuarioDao->inserirUsuario($nome, $nascimento, $cpf, $sexo, $email, $usuario, $senha, $condominio, $apartamento);
    $retorno["SUCESSO"]= true;	

    echo json_encode($retorno);
?>