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
        $resultado = $usuario->listarUsuarios($codUsuario,$tipoUsuario);
        $html = '';
        
        $mostra='';//exibe perfil ao abrir tela
        if($tipoUsuario != 1){
            $mostra = 'show';
        }else{
            $mostra = '';
        }

        foreach($resultado as $res)
        {
            $html .='<div class="card" cod-usuario="'.$res['ID_USUARIO'].'">
                        <div class="card-header collapsed" id="user'.$res['ID_USUARIO'].'" data-toggle="collapse" data-target="#corpoPerfilUsuario'.$res['ID_USUARIO'].'" aria-expanded="" aria-controls="corpoPerfilUsuario'.$res['ID_USUARIO'].'">
                            <h5 class="mb-0 d-flex justify-content-between align-items-center text-dark">
                                '.$res['NOME_USUARIO'].'
                                <span class="badge badge-primaty">'.$res['S_APROVADO'].'</span>
                            </h5>
                        </div>
                        <div id="corpoPerfilUsuario'.$res['ID_USUARIO'].'" class="collapse '.$mostra.'" aria-labelledby="user'.$res['ID_USUARIO'].'" data-parent="#lista_usuarios">
                            <form id="formCadastro-'.$res['ID_USUARIO'].'" class="class="form-cadastro m-auto" onsubmit="return Usuario.alteraCadastro($(this));">
                                <div id="dvCadastro" class="card-body">
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-3" style="display:none;">
                                            <label for="txtId">Código</label>
                                            <input type="text" class="form-control obrigatorio" id="txtId" name="txtId" value="'.$res['ID_USUARIO'].'">
                                        </div>';
                            if($tipoUsuario == 1 && $res['ID_TIPO_USUARIO'] != 1){
                                $html.=
                                        '
                                        <div class="form-group col-md-2">
                                            <label for="sltPerfilAprovado">Perfil *</label>
                                            <select id="sltPerfilAprovado" name="sltPerfilAprovado" class="form-control obrigatorio selectpicker bg-warning custom-select" value="'.$res['APROVADO'].'">
                                                <option selected>Escolha</option>
                                                <option value="1">Aprovado</option>
                                                <option value="0">Reprovado</option>
                                            </select>
                                        </div>';
                            }
                                $html.='        
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
                                        <div class="form-group col-md-3">
                                            <label for="txtSenha">Senha *</label>
                                            <input type="password" class="form-control obrigatorio" id="txtSenha" name="txtSenha" value="'.$res['SENHA'].'">
                                        </div>';
                                        if($res['ID_TIPO_USUARIO'] == 3){

                                        $html .='
                                            <div class="form-group col-md-8">
                                                <label for="sltCondominio">Condominio *</label>
                                                <select class="form-control condominio obrigatorio" id="sltCondominio" name="sltCondominio" onchange="" cond="'.$res['ID_CONDOMINIO'].'" >
                                                    <option selected></option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="sltApartamento">Apartamento *</label>
                                                <select class="form-control apartamento obrigatorio" id="sltApartamento" name="sltApartamento" onchange="" ap="'.$res['ID_APARTAMENTO'].'" >
                                                    <option selected></option>
                                                </select>
                                            </div>
                                        ';
                                        }
                                    $html .= '
                                    </div>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-md btn-primary btn-block col-md-4" type="submit">Salvar</button>                
                                        <!--<button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar-me</button>-->
                                    </div>
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