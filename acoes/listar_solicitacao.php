<?php
    include '../classes/solicitacao/class.solicitacao.php';
    include_once '../classes/class.Sessao.php';

    $sessao = new Sessao();

    $codUsuario = $nome = $sessao->pegaValorSessao("CodUsuario");
    $tipoUsuario = $nome = $sessao->pegaValorSessao("TipoUsuario");
    $nomeUsuario = $nome = $sessao->pegaValorSessao("NomeUsuario");

    if($codUsuario){

        $Solicitacao = new Solicitacao();
        $retorno = array();
        $resultado = $Solicitacao->listaSolicitacao($codUsuario,$tipoUsuario);
        $html = '';

        foreach($resultado as $res)
        {
            $html .='<div class="card" cod-solicitacao="'.$res['ID_SOLICITACAO'].'">
                        <div class="card-header collapsed" id="solicitacao'.$res['ID_SOLICITACAO'].'" data-toggle="collapse" data-target="#corpoSolictacao'.$res['ID_SOLICITACAO'].'" aria-expanded="false" aria-controls="corpoSolictacao">
                            <h5 class="mb-0 d-flex justify-content-between align-items-center text-dark">
                                '.$res['TITULO_SOLICITACAO'].'
                                <span class="badge '.$res['CLASSE_HTML'].'">'.$res['STATUS_NOME'].'</span>
                            </h5>
                        </div>
                        <div id="corpoSolictacao'.$res['ID_SOLICITACAO'].'" class="collapse" aria-labelledby="solicitacao'.$res['ID_SOLICITACAO'].'" data-parent="#listaSolicitacao">
                            <form id="formSolicitacao" class="form-solicitacao m-auto">
                                <div id="dvCadastro" class="card-body">
                                    <div class="form-row mt-1">
                                        <div class="col-md-12">
                                            <div class="form-group col-md-3 p-0">
                                                <label for="txtCodigo">Código da solicitação</label>
                                                <input type="text" class="form-control" id="txtCodigo" name="txtCodigo" value="'.$res['ID_SOLICITACAO'].'" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="txtCodigo">Usuario</label>
                                            <input type="text" class="form-control" id="txtApartamento" name="txtApartamento" value="'.$res['NOME_MORADOR'].'" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="txtCodigo">Apartamento</label>
                                            <input type="text" class="form-control" id="txtApartamento" name="txtApartamento" value="'.$res['N_APARTAMENTO'].'"disabled>
                                        </div>

                                        <!--<div class="form-group col-md-12">
                                            <label for="txtTitulo">Título *</label>
                                            <input type="text" class="form-control obrigatorio" id="txtTitulo" name="txtTitulo" placeholder="Título da solicitação"  value="'.$res['TITULO_SOLICITACAO'].'" disabled>
                                        </div>-->
                                        <div class="form-group col-md-12">
                                            <label for="txtDescricao">Descrição da solicitação *</label>
                                            <textarea class="form-control " id="txtDescricao" name="txtDescricao" placeholder="Informe detalhes de sua solicitação aqui" rows="3" disabled>'.$res['DESCRICAO_SOLICITACAO'].'</textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="sltTipoSolicitacao">Tipo de solicitação </label>
                                            <!--<select class="form-control " id="sltTipoSolicitacao" name="sltTipoSolicitacao" value="'.$res['ID_TIPO_SOLICITACAO'].'" disabled>
                                                <option value="1">Solicitação</option>
                                                <option value="2">Evento</option>
                                            </select>-->
                                            <div>'.$res['TITULO_TIPO_SOLICITACAO'].'</div>
                                        </div>
                                        <div class="form-group col-md-4 evento">
                                            <label for="txtDataEnvento">Data do Evento *</label>
                                            <input type="text" class="form-control calendario dd-mm-yyyy " id="txtDataEnvento" name="txtDataEnvento" placeholder="dd/mm/aaaa" value="'.$res["DATA_EVENTO"].'" disabled>
                                        </div>
                                        <div class="form-group col-md-4 evento">    
                                            <label for="txtDuracaoEnvento">Duração do Evento *</label>
                                            <input type="text" class="form-control hora " id="txtDuracaoEnvento" name="txtDuracaoEnvento" placeholder="00:00" value="'.$res['DURACAO_EVENTO'].'" disabled>
                                        </div>

                                    </div>
                                    <div class="acoesForm justify-content-around row col-md-12">
                                    ';
                                    if($tipoUsuario != 3 && $res['STATUS'] != 3){
                                        $html.='<button class="btn btn-md btn-success col-md-3" onclick="Solicitacao.alterarSolicitacao(3, '.$res['ID_SOLICITACAO'].');">Concluir</button>
                                        <button class="btn btn-md btn-secondary col-md-3" onclick="Solicitacao.alterarSolicitacao(2, '.$res['ID_SOLICITACAO'].');">Em atendimento</button>';
                                    }
                                    $html.='<!--<button class="btn btn-md btn-danger col-md-3" onclick="Solicitacao.reset();">Cancelar</button>-->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>';
        }

        $retorno["SOLICITACOES"] = $html;
        $retorno["SUCESSO"]= true;
    }else{
        $retorno["SUCESSO"]=false;
        $retorno["MSG"]="Login inativo";
    }
    
    echo json_encode($retorno);
?>