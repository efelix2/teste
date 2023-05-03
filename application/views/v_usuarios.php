<div class="container-fluid mt-4">
    <div class="row mt-1">
        <div class="col-xl-12 mb-12 mb-xl-12 px-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">USUÁRIOS</h3>
                        </div>

                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-success btn-lg" data-toggle="modal" data-toggle="modal" data-target="#ModalDireotosAcessos">ADICIONAR USUARIOS</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive pb-3 ">
                    <div class="col">
                        <div class="card shadow col">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush" id="table_direitosAcesso" data-toggle="table" data-flat="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-show-export="true" data-detail-formatter="detailFormatter" data-page-list="[2, 5, 25, 50, 100, ALL]" data-url="<?= base_url('/usuarios/retUsuarios') ?>">
                                    <thead class="thead-light">
                                        <tr>
                                            <th data-field="id_users" data-align="center" data-sortable="true">ID</th>
                                            <th data-field="registro" data-halign="center" data-align="right" data-sortable="true">Registro</th>
                                            <th data-field="nome" data-halign="center" data-align="left" data-sortable="true">Nome</th>
                                            <th data-field="descricao" data-halign="center" data-align="left" data-sortable="true">Departamento</th>
                                            <th data-field="usuario" data-halign="center" data-align="left" data-sortable="true">Email</th>
                                            <th data-halign="center" data-align="center" data-formatter="opcoesUsuarios">Opções</th>
                                        </tr>
                                    </thead>
                                </table>
                                <script>
                                    function opcoesUsuarios(value, row) {
                                        return '<button type="button" class="btn btn-outline-primary btn-sm" onclick="retUsuarios(' + row.id_users + ');"><i class="fas fa-user-edit"></i></button>\n\
                                               <button type="button" class="btn btn-outline-danger btn-sm" onclick="del_usuarios(' + row.id_users + ');"><i class="fas fa-trash-alt"></i></button>';
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" data-backdrop="static" id="ModalDireotosAcessos" tabindex="-1" role="dialog" aria-labelledby="modalCadastro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="modalCadastro">Cadastro / Alteração de Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" onclick="limpaUsers();">&times;</span>
                </button>
            </div>
            <form method="post" id="usuarios">
                <div class="modal-body">
                    <div class="row">

                        <input type="text" name="id_users" id="id_users" class="d-none">

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Nome do funcionário:</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do funcionario">
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Registro:</label>
                            <input type="number" class="form-control" name="registro" id="registro" placeholder="Registro do funcionario">
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Selecione o departamento:</label>
                            <select class="form-control selectpicker" data-style="btn-success" id="sldepto" name="sldepto">
                                <option value="">Selecione o departamento</option>
                                <?php foreach ($depto->result() as $linha) :
                                ?>
                                    <option value="<?= $linha->id_departamento ?>"><?= $linha->descricao ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nome do usuario">
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Senha:</label>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha de login">
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Repetir senha:</label>
                            <input type="password" class="form-control" name="rsenha" id="rsenha" placeholder="Repetir senha">
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Nível de acesso:</label>
                            <select class="form-control selectpicker" data-style="btn-success" id="slnivel" name="slnivel">
                                <option value="">Selecione</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuários</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-success" style="background-color: #fff6ef;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpaUsers();">Sair</button>
                    <button type="submit" class="btn btn-dark btn-mini">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

//#################################################
//######### BUSCA USUARIOS
//#################################################
function retUsuarios(value) {
        $.ajax({
            url: base_url + 'usuarios/retUsuarios',
            dataType: 'json',
            type: 'POST',
            data: { id_users: value },
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Buscando dados...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                $('#ModalDireotosAcessos').modal('show');
                $('#id_users').val(data[0].id_users);
                $('#nome').val(data[0].nome);
                $('#registro').val(data[0].registro);
                $('#sldepto').selectpicker('val', data[0].id_departamento);
                $('#usuario').val(data[0].usuario);
                $('#slnivel').selectpicker('val', data[0].nivel);
                $('.senhas').addClass('d-none');
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Buscando dados...',
                    showConfirmButton: false,
                    timer: 100
                })
            },
            error: function(xhr, er) {
                msgSuporte()
            }
        });
  
}

//#################################################
//######### LINPA FORMULÁRIOS
//#################################################
function limpaUsers(){
    $('#usuarios').trigger('reset')
    $('.selectpicker').selectpicker('val', '');
}

//#################################################
//######### DELETAR USUARIOS       ################
//#################################################
function del_usuarios(value) {
    Swal.fire({
        title: 'Tem certeza que deseja deletar esse usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Sair!'
    }).then((result) => {
        if (result['value'] == true) {
            $.ajax({
                url: base_url + 'usuarios/del_usuarios',
                dataType: 'json',
                type: 'POST',
                data: { id_users: value },
                beforeSend: function() {
                    Swal.fire({
                        imageUrl: base_url + '/assets/alert/loader.gif',
                        title: 'Deletando dados...',
                        showConfirmButton: false
                    })
                },
                success: function(data) {
                    if (data[0].ret === 1) {
                        msgRetorno(data[0].msg);
                        $('#table_direitosAcesso').bootstrapTable('refresh');;
                    } else {
                        msgValida(data[0].msg);
                    }
                },
                error: function(xhr, er) {
                    msgSuporte()
                }
            })


        }
    });
}

</script>


