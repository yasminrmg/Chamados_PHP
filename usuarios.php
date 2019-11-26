<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Libraries CSS -->
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="lib/datepicker/bootstrap-datepicker.css">

    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/usuario.css">

    <title>SCO</title>
</head>

<body>
    <?php include "menu_index.php"; ?>
        <main class="container mt-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="card-header">
                        mostrar por:
                    </div>
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                    </div>
                </div>
                <div class=" col-md-9">
                    <div class="accordion" id="lista_usuarios">
                        <!-- aqui fica a lista de usuarios 
                        <div class="card cardModelo">
                            <div class="card-header" id="abaNovaSolicitacao">
                                <h5 class="mb-0 d-flex justify-content-between align-items-center">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#corpoSolictacao" aria-expanded="true" aria-controls="corpoSolictacao">
                                        Criar Solicitação
                                    </button>
                                    <span class="badge badge-warning">Nova solicitação</span>
                                </h5>
                            </div>

                            <div id="corpoSolictacao" class="collapse show" aria-labelledby="abaNovaSolicitacao" data-parent="#listaSolicitacao">
                                <form id="formSolicitacao" class="form-solicitacao m-auto">
                                    <div id="dvCadastro" class="card-body">
                                        <div class="form-row mt-1">
                                            <div class="form-group col-md-3 p-0" style="display: none;">
                                                <label for="txtCodigo">Código da solicitação</label>
                                                <input type="text" class="form-control" id="txtCodigo" name="txtCodigo">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="txtTitulo">Título *</label>
                                                <input type="text" class="form-control obrigatorio" id="txtTitulo" name="txtTitulo" placeholder="Título da solicitação">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="txtDescricao">Descrição da solicitação *</label>
                                                <textarea class="form-control obrigatorio" id="txtDescricao" name="txtDescricao" placeholder="Informe detalhes de sua solicitação aqui" rows="3"></textarea>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="sltTipoSolicitacao">Tipo de solicitação *</label>
                                                <select class="form-control obrigatorio" id="sltTipoSolicitacao" name="sltTipoSolicitacao">
                                                    <option value="1">Solicitação</option>
                                                    <option value="2">Evento</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 evento">
                                                <label for="txtDataEnvento">Data do Evento *</label>
                                                <input type="text" class="form-control calendario dd-mm-yyyy obrigatorio" id="txtDataEnvento" name="txtDataEnvento" placeholder="dd/mm/aaaa">
                                            </div>
                                            <div class="form-group col-md-4 evento">
                                                <label for="txtDuracaoEnvento">Duração do Evento *</label>
                                                <input type="text" class="form-control hora obrigatorio" id="txtDuracaoEnvento" name="txtDuracaoEnvento" placeholder="00:00">
                                            </div>

                                        </div>
                                        <div class="acoesForm justify-content-around row col-md-12">
                                            <button class="btn btn-md btn-primary col-md-3" onclick="Solicitacao.cadastrar();">Criar Solicitação</button>
                                             <button class="btn btn-sm btn-success col-md-2" onclick="Solicitacao.AlteraSolicitacao();">Concluir</button>
                                            <button class="btn btn-sm btn-success col-md-2" onclick="Solicitacao.AlteraSolicitacao();">Em atendimento</button> 
                                            <button class="btn btn-md btn-danger col-md-3" onclick="Solicitacao.reset();">Cancelar</button>
                                        </div>
                                    </div>
                                    <div id="dvConclusao" class="card-body d-none text-center">
                                        <h3 class="card-title">Sua solicitação de cadastro foi recebida. Fique de olho: acompanhe sua solicitação em breve será respondida</h3>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </main>
        <div class="modal modalAviso" id="modal_aviso_generico" data-backdrop="static" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <strong>
                                <span id="lblTituloAviso" class="modalErro">Atenção</span>
                            </strong>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div role="form">
                            <div class="text-center">
                                <span id="lblTextoAviso" style="font-size: 16px;">Preencha os campos em destaque.</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="btnFecharModalAvisos" value="Fechar" onclick="return false;" id="btnFecharModalAvisos" class="btn btn-default btn-danger" data-dismiss="modal">
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>        <!-- Libraries -->
        <script src="lib/jquery-3.4.1.min.js"></script>
        <script src="lib/jquery.maskedinput.min.js"></script>
        <script src="lib/popper.min.js"></script>
        <script src="lib/bootstrap/bootstrap.min.js"></script>
        <script src="lib/datepicker/bootstrap-datepicker.min.js"></script>
        <script src="lib/datepicker/locales/bootstrap-datepicker.pt-BR.min.js"></script>

        <script src="js/geral/Master.js"></script>
        <script src="js/geral/Ajax.js"></script>
        <script src="js/usuario/Usuario.js"></script>
        <script src="js/geral/Init.js"></script>

        <script>
            $(document).ready(function() {
                Usuario.popularCadastro();
                $(".evento").hide();
            });
            // $("#sltTipoSolicitacao").change(function(){
            //     if($("#sltTipoSolicitacao").val() != 2)
            //         $(".evento").hide();
            //     else
            //         $(".evento").show();
            // });
        </script>

        <?php include "rodape.php"; ?>
</body>