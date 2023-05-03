<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="#">
            <img src="<?= base_url('/assets/img/brand/logo.png') ?>" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="#">Nenhuma mensagem no momento</a>
                    <!-- <a class="dropdown-item" href="#">Another action</a> -->
                    <!-- <div class="dropdown-divider"></div> -->
                    <!-- <a class="dropdown-item" href="#"></a> -->
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="<?= base_url('/assets/img/brand/nlogo.jpg') ?>">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Bem Vindo!</h6>
                    </div>
                    <a href="<?= base_url('usuarios')?>" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>Minha conta</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url("login/sair");?>" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Sair</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="#">
                            <img src="<?= base_url('/assets/img/brand/nlogo.jpg'); ?>">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-chart-pie text-success"></i>Resumo</a>
                </li>
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">PROJETOS</h6>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('projetos') ?>"><i class="fas fa-project-diagram text-success"></i>Projetos</a>
                </li>
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">PROCESSOS</h6>
            <ul class="navbar-nav">
                <?php
                if ($this->session->userdata('nivel') == 1) {
                    print '<li class="nav-item"><a class="nav-link" href="' . base_url('tarefas') . '"><i class="ni ni-align-left-2 text-success"></i>Tarefas</a></li>';
                    print '<li class="nav-item"><a class="nav-link" href="' . base_url('consultas') . '"><i class="ni ni-search text-success"></i>Consultas</a></li>';
                }
                ?>
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">RELATÓRIOS</h6>
            <ul class="navbar-nav mb-md-3">
                <?php
                if ($this->session->userdata('nivel') == 1) {
                    print '<li class="nav-item"><a class="nav-link" href="' . base_url('consultas') . '"><i class="ni ni-single-02 text-success"></i>Projetos / Tarefas</a></li>';
                }
                ?>
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">CONFIGURAÇÕES</h6>
            <ul class="navbar-nav mb-md-3">
                <?php
                if ($this->session->userdata('nivel') == 1) {
                    print '<li class="nav-item"><a class="nav-link" href="' . base_url('usuarios') . '"><i class="ni ni-single-02 text-success"></i>Usuários</a></li>';
                    print '<li class="nav-item"><a class="nav-link" href="' . base_url('depto') . '"><i class="ni ni-building text-success"></i>Departamentos</a></li>';
                }
                ?>
                <li class="nav-item"><a class="nav-link" href="<?= base_url("login/sair");?>"><i class="ni ni-user-run text-brand text-success"></i><strong>Sair</strong></a></li>
            </ul>
        </div>
    </div>
</nav>