<div class="container-fluid mt-4">
    <div class="row mt-1">
        <div class="col-xl-12 mb-12 mb-xl-12">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0 text- uppercase">Tarefas</h3>
                        </div>

                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-outline-success btn-lg p-2 toobar" data-toggle="modal" data-target="#ModalTarefas">ADICIONAR NOVAS TAREFAS</a>
                        </div>
                    </div>
                </div>
                <div class="table-tarefas pb-3">
                    <div class="col">
                        <div class="card shadow col">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush" id="table_tarefas" data-toggle="table" data-toolbar=".toobar" data-flat="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-show-export="true" data-detail-formatter="detailFormatter" data-page-list="[2, 5, 25, 50, 100, ALL]" data-url="<?= base_url('/tarefas/retTarefas') ?>">
                                    <thead class="thead-light">
                                        <tr>
                                        <th data-field="responsavel" data-halign="center" data-align="left" data-sortable="true">Responsável</th>
                                            <th data-field="nome_projeto" data-halign="center" data-align="left" data-sortable="true">Projeto</th>
                                            <th data-field="nome_tarefa" data-halign="center" data-align="left" data-sortable="true">Tarefa</th>
                                            <th data-field="descricao_tarefa" data-halign="center" data-align="left" data-sortable="true">Descroção</th>
                                            <th data-field="prioridade" data-halign="center" data-align="left" data-formatter="prioridade" data-sortable="true">Prióridade</th>
                                            <th data-field="responsavel" data-halign="center" data-align="center" data-formatter="situacao">situação</th>
                                            <th data-field="anexo" data-halign="center" data-align="center" data-sortable="true" data-formatter="download">Docs</th>
                                            <th data-halign="center" data-align="center" data-formatter="opcoes_tarefas">Opções</th>
                                        </tr>
                                    </thead>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" data-backdrop="static" id="detalheTarefas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="">Detalhe /alteração de tarefas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" onclick="LimparDados();">&times;</span>
                </button>
            </div>
            <div class="modal-body p-1">
                <div class="alert alert-secondary p-1 m-1"><strong>ID DO PROJETO: </strong><span id="v_id_tarefa"></span></div>
                <div class="alert alert-secondary p-1 m-1"><strong>PROJETO: </strong><span id="v_nome_projeto"></span></div>
                <div class="alert alert-secondary p-1 m-1"><strong>TAREFA: </strong><span id="v_nome_tarefa"></span></div>
                <div class="alert alert-secondary p-1 m-1"><strong>DESCRIÇÂO: </strong><span id="v_descricao_tarefa"></span></div>
                <div class="alert alert-secondary p-1 m-1"><strong>RESPONSÁVEL: </strong><span id="v_responsavel"></span></div>
                <div class="alert alert-secondary p-1 m-1"><strong>DEPARTAMENTO: </strong><span id="v_departamento"></span></div>
                <div class="alert alert-secondary p-1 m-1"><strong>DATA: </strong><span id="v_data_criacao"></span></div>
            </div>

            <div class="tableLogtarefas pb-3">
                <div class="card col">
                    <div class="table-responsive my-3">
                        <table class="table align-items-center table-flush" id="tableLogtarefas" data-toggle="table">
                            <thead class="thead-light">
                                <tr>
                                    <th data-field="id_movimento" data-align="center" data-sortable="true">ID</th>
                                    <th data-field="data_criacao" data-align="center" data-sortable="true">Data</th>
                                    <th data-field="hora_criacao" data-align="center" data-sortable="true">Hora</th>
                                    <th data-field="situacao" data-halign="center" data-align="left" data-formatter="situacao" data-sortable="true">Status</th>
                                    <th data-field="descricao" data-halign="center" data-align="left" data-sortable="true">Descrição</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>

            <div class="modal-footer bg-success p-2">
                <button type="button" class="btn btn-outline-warning" data-dismiss="modal" onclick="LimparDados();">Sair</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" data-backdrop="static" id="detalheSituacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm " role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="">Alterar situação da terefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" onclick="LimparDados();">&times;</span>
                </button>
            </div>
            <form method="post" id="cadastroSituacao" enctype="multipart/form-data">
                <input name="id_situacao" id="id_situacao" class="d-none">
                <input name="id_situacaoP" id="id_situacaoP" class="d-none">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label>Selecione:</label>
                            <select class="form-control selectpicker" data-style="btn-success" id="slSituacao" name="slSituacao">
                                <option value="">Selecione</option>
                                <option value="A">Em andamento</option>
                                <option value="P">Tarafa pausada</option>
                                <option value="F">Tarafa finalizada</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Descrição do andamento:</label>
                            <textarea type="text" class="form-control" name="situacaoTarefa" id="situacaoTarefa" rows="5" placeholder="Descrição"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-success">
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal" onclick="LimparDados();">Sair</button>
                    <button type="submit" class="btn btn-outline-dark">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function opcoes_tarefas(valu, row) {
        return '<button type="button" class="btn btn-outline-warning btn-sm" onclick="det_tarefas(' + row.id_tarefa + ');">Detalhe</button>';
    }

    function situacao(value, row) {
        if (row.situacao == '') {
            return '<button type="button" class="btn btn-info btn-sm btn-block" onclick="edit_situacao(\'' + row.id_tarefa + '\', ' + row.id_projeto + ');">Pendente</button>';
        } else if (row.situacao == 'A') {
            return '<button type="button" class="btn btn-success btn-sm btn-block" onclick="edit_situacao(\'' + row.id_tarefa + '\', ' + row.id_projeto + ');">Em andamento</button>';
        } else if (row.situacao == 'F') {
            return '<button type="button" class="btn btn-dark btn-sm btn-block" disabled>Finalizado</button>';
        } else if (row.situacao == 'P') {
            return '<button type="button" class="btn btn-warning btn-sm btn-block" onclick="edit_situacao(\'' + row.id_tarefa + '\', ' + row.id_projeto + ');">Pausado</button>';
        }

    }

    function prioridade(value, row) {
        if (row.prioridade == 'P') {
            return '<button type="button" class="btn btn-outline-success btn-sm btn-block">Padão</button>';
        } else if (row.prioridade == 'U') {
            return '<button type="button" class="btn btn-outline-warning btn-sm btn-block">Urgente</button>';
        } else if (row.prioridade == 'S') {
            return '<button type="button" class="btn btn-outline-danger btn-sm btn-block" disabled>Urgentíssimo</button>';
        }

    }

    function download(value, row) {
        if (row.anexo != "") {
            return '<a href="' + base_url + 'assets/uploads/' + row.anexo + '" download><button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-cloud-download-alt"></i></button></a>';
        }else{
            return  'Sem anexo';
        }
    }

    function det_tarefas(value) {
        $.ajax({
            url: base_url + '/tarefas/retDetTarefas',
            dataType: 'json',
            type: 'POST',
            data: {
                id_tarefa: value
            },
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Buscando dados...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                console.log(data.logTarefas);
                $('#v_id_tarefa').text(data.tarefas[0].id_tarefa);
                $('#v_nome_projeto').text(data.tarefas[0].nome_projeto);
                $('#v_nome_tarefa').text(data.tarefas[0].nome_tarefa);
                $('#v_descricao_tarefa').text(data.tarefas[0].descricao_tarefa);
                $('#v_responsavel').text(data.tarefas[0].responsavel);
                $('#v_departamento').text(data.tarefas[0].nome_dep);
                $('#v_data_criacao').text(data.tarefas[0].data_criacao);
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Buscando dados...',
                    showConfirmButton: false,
                    timer: 1
                })

                $('#detalheTarefas').modal('show');
                $('#tableLogtarefas').bootstrapTable('removeAll')
                $('#tableLogtarefas').bootstrapTable('append', data.logTarefas)
            },
            error: function(xhr, er) {
                msgSuporte();
            }
        })
    }

    function edit_situacao(id_tarefa,id_projeto) {
        $('#id_situacao').val(id_tarefa);
        $('#id_situacaoP').val(id_projeto);
        $('#detalheSituacao').modal('show');
    }
</script>