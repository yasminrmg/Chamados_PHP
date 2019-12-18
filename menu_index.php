<?php include_once 'classes/class.Sessao.php';

    $sessao = new Sessao();

    $codUsuario = $nome = $sessao->pegaValorSessao("CodUsuario");
    $tipoUsuario = $nome = $sessao->pegaValorSessao("TipoUsuario");
?>
<header>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="index.php">Momento Boulevard</a>

    <?php 
        if(!$codUsuario){
    ?>
            <form id="formLogin" class="navbar-form navbar-right" onsubmit="return Login.validar();">
                <div class="form-row">
                    <div class="form-group col-md-5 mb-0">
                        <input type="text" class="form-control obrigatorio" id="txtUsuario" placeholder="Usuario">
                    </div>
                    <div class="form-group col-md-5 mb-0">
                        <input type="password" class="form-control obrigatorio" id="txtSenha" placeholder="Senha">
                    </div>
                    <div class="form-group col-md-2 mb-0">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in" style="padding-right: 5px;"></span>Entrar</button>
                    </div>
                </div>
            </form>
    <?php 
        }elseif($codUsuario){?>
            <div class=" navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="solicitacoes.php">Solicitações</a>
                    </li>

                <?php if($tipoUsuario == 1){?>
                    <li class="nav-item">
                        <a class="nav-link" href="apartamentos.php">Cadastrar Apartamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="condominios.php">Cadastrar Condomínio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">Usuarios</a>
                    </li>                
                <?php }else{?>
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">Perfil</a>
                    </li>                
                <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link btn-danger" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>     
        <?php } ?>
  </div>
</nav>
    
</header>