<div class="sidenav bg-gradient-success">
    <div class="login-main-text">
        <div class="btn-wrapper text-center">
            <div class="media align-items-center img-center">
                <img class="img-center img-fluid" src="<?= base_url('assets/img/brand/logo.png') ?>" class="navbar-brand-img" width="80%"> 
            </div>
        </div>
        <h2>Di Mármore Projetos </h2>
    </div>
</div>

<div class="sidenav_mobile">
    <div class="login-main-text">
        <div class="btn-wrapper text-center">
            <div class="media align-items-center img-center">
                <img class="img-center img-fluid" src="<?= base_url('assets/img/brand/logo.png') ?>" class="navbar-brand-img" width="80%"> 
            </div>
        </div>
    </div>
</div>

<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <?= $msg; ?> 
            <form method="post" action="<?= base_url('login/logar') ?>">
                <div class="form-group">
                    <label>Usuário</label>
                    <input type="text" name="usuario" class="form-control" placeholder="Nome de usuário">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" placeholder="Senha">
                </div>
                <button type="submit" class="btn btn-success btn-outline-success float-right">Logar no sistema</button>
            </form>
        </div>
    </div>
</div>