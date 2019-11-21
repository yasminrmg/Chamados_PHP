<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- Navbar content -->
                <a class="navbar-brand" href="#">Momento Boulevard</a>
            </div>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler d-block d-sm-none" type="button" data-toggle="collapse" data-target="#formLogin">
                <span class="navbar-toggler-icon"></span>
            </button>

            <form id="formLogin" class="navbar-form navbar-right" onsubmit="return Login.validar();">
                <div class="form-row">
                    <div class="form-group col-md-5 mb-0">
                        <input type="text" class="form-control obrigatorio" id="txtUsuario" placeholder="Usuario">
                    </div>
                    <div class="form-group col-md-5 mb-0">
                        <input type="password" class="form-control obrigatorio" id="txtSenha" placeholder="Senha">
                    </div>
                    <div class="form-group col-md-2 mb-0">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in" style="padding-right: 5px;"></span> Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</header>