<?php
    include '../classes/usuario/class.Usuario.php';
    include_once '../classes/class.Sessao.php';

    $sessao = new Sessao();

    $codUsuario = $nome = $sessao->pegaValorSessao("CodUsuario");
    $tipoUsuario = $nome = $sessao->pegaValorSessao("TipoUsuario");
    $nomeUsuario = $nome = $sessao->pegaValorSessao("NomeUsuario");

    if($codUsuario){

        $usuario  = new UsuarioDao();
        $retorno = array();
        $resultado = $usuario->listarUsuarios();
        $html = '';

        foreach($resultado as $res)
        {
            $html .='<div class="card" cod-usuario="'.$res['ID_USUARIO'].'">
                        <div class="card-header collapsed" id="user'.$res['ID_USUARIO'].'" data-toggle="collapse" data-target="#corpoSolictacao'.$res['ID_USUARIO'].'" aria-expanded="false" aria-controls="corpoSolictacao">
                            <h5 class="mb-0 d-flex justify-content-between align-items-center text-dark">
                                '.$res['NOME_USUARIO'].'
                                <span class="badge badge-primaty">'.$res['APROVADO'].'</span>
                            </h5>
                        </div>
                        <div id="corpoSolictacao'.$res['ID_USUARIO'].'" class="collapse" aria-labelledby="user'.$res['ID_USUARIO'].'" data-parent="#lista_usuarios">
                            <form id="formCadastro" class="form-cadastro m-auto">
                                <div id="dvCadastro" class="card-body">
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-12">
                                            <label for="txtNome">Nome completo *</label>
                                            <input type="text" class="form-control obrigatorio" id="txtNome" name="txtNome" placeholder="Nome completo" value="'.$res['NOME_USUARIO'].'">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="txtNascimento">Nascimento *</label>
                                            <input type="text" class="form-control calendario dd-mm-yyyy obrigatorio" id="txtNascimento" name="txtNascimento" placeholder="dd/mm/aaaa" value="'.$res['DATA_NASCIMENTO'].'">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="txtCPF">CPF *</label>
                                            <input type="text" class="form-control cpf obrigatorio" id="txtCPF" name="txtCPF" placeholder="99.999.999-99" value="'.$res['CPF'].'">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="sltSexo">Sexo *</label>
                                            <select class="form-control obrigatorio" id="sltSexo" name="sltSexo" value="">
                                                <option value="M">Masculino</option>
                                                <option value="F">Feminino</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="txtEmail">E-mail *</label>
                                            <input type="text" class="form-control obrigatorio" id="txtEmail" name="txtEmail" placeholder="email@dominio.com" value="'.$res['EMAIL'].'">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="txtUsuario">Usuário *</label>
                                            <input type="text" class="form-control obrigatorio" id="txtUsuario" name="txtUsuario" placeholder="Usuário" value="'.$res['LOGIN'].'">
                                        </div>
                                        <!--<div class="form-group col-md-3">
                                            <label for="txtSenha">Senha *</label>
                                            <input type="password" class="form-control obrigatorio" id="txtSenha" name="txtSenha" value="'.$res['SENHA'].'">
                                        </div>-->
                                        <div class="form-group col-md-8">
                                            <label for="sltCondominio">Condominio *</label>
                                            <select class="form-control condominio obrigatorio" id="sltCondominio" name="sltCondominio" onchange="Apartamento.popular();" value="'.$res['ID_APARTAMENTO'].'">
                    
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="sltApartamento">Apartamento *</label>
                                            <select class="form-control apartamento obrigatorio" id="sltApartamento" name="sltApartamento" value="'.$res['ID_APARTAMENTO'].'">
                    
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-md btn-primary btn-block" type="submit">Alterar</button>                
                                    <!--<button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar-me</button>-->
                                </div>
                            </form>
                        </div>
                    </div>';
        }

        $retorno["USUARIOS"] = $html;
        $retorno["SUCESSO"]= true;
    }else{
        $retorno["SUCESSO"]=false;
        $retorno["MSG"]="Login inativo";
    }
    
    echo json_encode($retorno);
?>