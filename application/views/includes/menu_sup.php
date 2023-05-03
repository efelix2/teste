<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"> <img alt="#" src="<?= base_url('/assets/img/brand/preview.png') ?>" width="180"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-success" href="<?= base_url('projetos') ?>">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Relatórios</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="#">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <!-- <a class="nav-link nav-link-icon" href="#">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                </a>
                 -->
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?= base_url('usuarios') ?>">Usuários</a>
                    <a class="dropdown-item" href="<?= base_url('depto') ?>">Departamentos</a>
                    <a class="dropdown-item" href="<?= base_url('cadProjetos') ?>">Projetos</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav pr-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?= base_url('/assets/img/brand/logo3.png') ?>" width="40" height="40" class="rounded-circle">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Meu perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('login/sair') ?>">Sair</a>

                </div>
            </li>
        </ul>
    </div>
</nav>