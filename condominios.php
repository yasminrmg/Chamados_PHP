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
            <div class="row justify-content-center">
            <form id="formCadastroCondominio" class="form-cadastro col-md-8  m-auto p-4" onsubmit="return Condominio.cadastrar();">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Cadastro Condomínio</h2>
                    </div>
                    <div id="dvCadastroCondominio" class="card-body">
                        <small class="font-weight-bold">Os campos marcados com "*" são obrigatórios.</small>
                        <div class="form-row mt-4">
                            
                            <div class="form-group col-md-12">
                                <label for="txtNomeCondominio">Nome do Condomínio*</label>
                                <input type="text" class="form-control obrigatorio" id="txtNomeCondominio" name="txtNomeCondominio" placeholder="Nome Condomínio">
                            </div>
                            <div class="form-group col-md-9">
                                <label for="txtEndereco">Endereço*</label>
                                <input type="text" type="text" class="form-control obrigatorio" id="txtEndereco" name="txtEndereco" placeholder="Endereço">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="txtCidade">Cidade</label>
                                <input type="text" type="text" class="form-control obrigatorio" id="txtCidade" name="txtCidade" placeholder="Cidade">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="txtEstado">Estado</label>
                                <input type="text" type="text" class="form-control obrigatorio uf" id="txtEstado" name="txtEstado" placeholder="UF">
                            </div>
                        </div>
                        <button class="btn btn-md col-md-5 btn-primary btn-block" type="submit">Cadastrar</button>
                    </div>
                    <div id="dvConclusao" class="card-body d-none text-center">
                        <h3 class="card-title">O condomínio foi cadastrado.</h3>
                    </div>
                </card>
            </form>
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
        </div>        
        <!-- Libraries -->
        <script src="lib/jquery-3.4.1.min.js"></script>
        <script src="lib/jquery.maskedinput.min.js"></script>
        <script src="lib/popper.min.js"></script>
        <script src="lib/bootstrap/bootstrap.min.js"></script>
        <script src="lib/datepicker/bootstrap-datepicker.min.js"></script>
        <script src="lib/datepicker/locales/bootstrap-datepicker.pt-BR.min.js"></script>

        <script src="js/geral/Master.js"></script>
        <script src="js/geral/Ajax.js"></script>
        <script src="js/geral/Init.js"></script>
        <script src="js/condominio/Condominio.js"></script>



        <script>
            $(document).ready(function() {
                //Condominio.popular();
            });
        </script>

        <?php include "rodape.php"; ?>
</body>