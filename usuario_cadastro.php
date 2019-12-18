<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Libraries CSS -->
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="lib/datepicker/bootstrap-datepicker.css">
    
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/usuario.css">

    <title>SCO - Cadastre-se</title>
  </head>
  <body>
    <?php include "menu_index.php"; ?>
    <form id="formCadastro" class="form-cadastro col-md-6 m-auto p-4" onsubmit="return Usuario.cadastrar();">
        <div class="card">
            <div class="card-header text-center">
                <h2>Momento Boulevard</h2>
            </div>
            <div id="dvCadastro" class="card-body">
                <h4 class="card-title mb-0">Cadastre-se</h4>
                <small class="font-weight-bold">Os campos marcados com "*" são obrigatórios.</small>
                <div class="form-row mt-4">
                    <div class="form-group col-md-12">
                        <label for="txtNome">Nome completo *</label>
                        <input type="text" class="form-control obrigatorio" id="txtNome" name="txtNome" placeholder="Nome completo">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtNascimento">Nascimento *</label>
                        <input type="text" class="form-control calendario dd-mm-yyyy obrigatorio" id="txtNascimento" name="txtNascimento" placeholder="dd/mm/aaaa">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="txtCPF">CPF *</label>
                        <input type="text" class="form-control cpf obrigatorio" id="txtCPF" name="txtCPF" placeholder="999.999.999-99">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sltSexo">Sexo *</label>
                        <select class="form-control obrigatorio" id="sltSexo" name="sltSexo">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="txtEmail">E-mail *</label>
                        <input type="email" class="form-control obrigatorio" id="txtEmail" name="txtEmail" placeholder="email@dominio.com">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="txtUsuario">Usuário *</label>
                        <input type="text" class="form-control obrigatorio" id="txtUsuario" name="txtUsuario" placeholder="Usuário">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="txtSenha">Senha *</label>
                        <input type="password" class="form-control obrigatorio" id="txtSenha" name="txtSenha">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="sltCondominio">Condominio *</label>
                        <select class="form-control condominio obrigatorio" id="sltCondominio" name="sltCondominio" onchange="Apartamento.popular();">

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sltApartamento">Apartamento *</label>
                        <select class="form-control apartamento obrigatorio" id="sltApartamento" name="sltApartamento">

                        </select>
                    </div>
                </div>                    
                <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar-me</button>
            </div>
            <div id="dvConclusao" class="card-body d-none text-center">
                <h3 class="card-title">Sua solicitação de cadastro foi recebida, em breve o sindico entrará em contato para confirmar seu cadastro.</h3>
            </div>
        </div>
        <div class="rodape">
            <?php include "rodape.php"; ?>
        </div>
    </form>

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
    <script src="js/usuario/Usuario.js"></script>
    <script src="js/geral/Init.js"></script>
    <script src="js/condominio/Condominio.js"></script>
    <script src="js/condominio/Apartamento.js"></script>
    <script>
        $(document).ready(function()
        {
            Condominio.popular();
        });
    </script>
  </body>
</html>