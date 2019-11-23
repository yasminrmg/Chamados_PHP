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
    <link rel="stylesheet" href="css/index.css">

    <title>SCO</title>
  </head>
  <body>
    <?php include "menu_index.php"; ?>

    <div class="position-relative overflow-hidden m-md-3 text-center bg-light">
      <div class="col-md-5 p-lg-2 mx-auto my-5">
        <h1 class="display-4 font-weight-normal">Bem vindo!</h1>
        <p class="lead font-weight-normal">Este é o sistema mais moderno e completo de gerenciamento e solicitações para condominios.</p>
        <a class="btn btn-outline-secondary" href="cadastro.php">Cadastre-se</a>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="bolinhas float-left border border-dark bg-secondary rounded-circle text-center font-weight-bold mr-auto ml-auto mb-1" onclick="$('#txtUsuario').focus();">IDENTIFIQUE-SE</div>
            <div class="bolinhas float-left border border-dark bg-secondary rounded-circle text-center font-weight-bold mr-auto ml-auto mb-1">SOLICITE</div>
            <div class="bolinhas float-left border border-dark bg-secondary rounded-circle text-center font-weight-bold mr-auto ml-auto mb-1">ACOMPANHE</div>
        </div>
    </div>

    <?php include "rodape.php"; ?>

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
    <script src="js/Geral.js"></script>
    <script src="js/geral/Ajax.js"></script>
    <script src="js/Login.js"></script>
  </body>
</html>