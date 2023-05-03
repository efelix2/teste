<style>
    .md-accordion .card .card-header {
        padding: 1rem 1.5rem;
        background: transparent;
        border-bottom: 0;
    }

    .accordion>.card>.card-header {
        border-radius: 0;
        margin-bottom: -1px;
    }

    .card-header:first-child {
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, 0.03);
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);

    }

    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 2px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
        font-weight: 400;
        border: 0;
        -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        margin-bottom: 10px;
    }
</style>
<div class="container-fluid p-2">
    <div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist" aria-multiselectable="true">
        <?php
        foreach ($depto->result() as $linha) :
        ?>
            <div class="card bg-dark">
                <div class="" role="tab" id="accord1">
                    <div class="row">
                        <div class="col-1">
                            <div class="dropdown float-left" style="padding: 10px;">
                                <i class="fa fa-bars fa-2x text-success" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-4 card-header">
                            <a onclick="retProjetos(<?= $linha->id_departamento; ?>);" data-toggle="collapse" data-parent="#accordionEx78" href="#collapseUnfiled<?= $linha->id_departamento; ?>" aria-expanded="false" aria-controls="collapseUnfiled" class="collapsed">
                                <h5 class="mt-1 mb-0">
                                    <span style="font-size: 20px;" class="text-uppercase font-weight-light text-white"><?= $linha->descricao; ?></span>
                                </h5>
                            </a>
                        </div>
                        <div class="col-3 card-header">
                            <a onclick="retProjetos(<?= $linha->id_departamento; ?>);" data-toggle="collapse" data-parent="#accordionEx78" href="#collapseUnfiled<?= $linha->id_departamento; ?>" aria-expanded="false" aria-controls="collapseUnfiled" class="collapsed">
                                <h5 class="mt-1 mb-0">
                                    <i class="fa fa-list fa-2x text-warning mr-2" aria-hidden="true"></i>
                                    <span style="font-size: 15px;" class="text-uppercase font-weight-light text-white">PROJETOS - 5</span>
                                </h5>
                            </a>
                        </div>
                        <div class="col-3 card-header">
                            <a onclick="retProjetos(<?= $linha->id_departamento; ?>);" data-toggle="collapse" data-parent="#accordionEx78" href="#collapseUnfiled<?= $linha->id_departamento; ?>" aria-expanded="false" aria-controls="collapseUnfiled" class="collapsed">
                                <h5 class="mt-1 mb-0">
                                    <i class="fa fa-list-ol fa-2x text-danger mr-2" aria-hidden="true"></i>
                                    <span style="font-size: 15px;" class="text-uppercase font-weight-light text-white">ETAPAS - 30</span>
                                </h5>
                            </a>
                        </div>
                        <div class="col-1 card-header">
                            <div class="dropdown float-right">
                                <a onclick="retProjetos(<?= $linha->id_departamento; ?>);" data-toggle="collapse" data-parent="#accordionEx78" href="#collapseUnfiled<?= $linha->id_departamento; ?>" aria-expanded="false" aria-controls="collapseUnfiled" class="collapsed">

                                    <h5 class="mt-1 mb-0">
                                        <i class="fas fa-angle-down rotate-icon fa-2x text-success"></i>
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="collapseUnfiled<?= $linha->id_departamento; ?>" class="collapse" role="tabpanel" aria-labelledby="accord1" data-parent="#accordionEx78" style="">
                    <div class="card-body p-1">
                        <div class="card shadow px-2">
                            <div class="row px-0">
                                <div class="col-6 text-left">
                                    <button href="#!" id="btnCadastro" class="btn btn-lg btn-outline-warning p-2 toolbar<?= $linha->id_departamento; ?>" onclick="modalCadastoProjeto(<?= $linha->id_departamento; ?>)">ADICIONAR PROJETOS</button>
                                    <button id="button" class="btn btn-success toolbar<?= $linha->id_departamento; ?>" onclick="$('.tableProjetos').bootstrapTable('expandAllRows');">Expandir etapas</button>
                                    <button id="button2" class="btn btn-danger toolbar<?= $linha->id_departamento; ?>" onclick="$('.tableProjetos').bootstrapTable('collapseAllRows');">Retrair etapas</button>
                                </div>
                            </div>
                            <table class="tablew align-items-center table-flush tableProjetos" id="tableProjeto<?= $linha->id_departamento; ?>" data-unique-id="id_projeto" data-mobile-responsive="true" data-toggle="table" data-toolbar=".toolbar<?= $linha->id_departamento; ?>" data-flat="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-show-export="true" data-id-field="id" data-page-list="[2, 5, 25, 50, 100, ALL]" data-toolbar="#toolbar" data-show-refresh="true" data-show-fullscreen="true" data-show-columns="true" data-show-columns-toggle-all="true" data-detail-view="true" data-sortable="true" data-sort-name="real_name" data-sort-order="asc">
                                <thead>
                                    <tr>

                                        <th data-field="responsavel" data-halign="center" data-align="left" data-sortable="true">Responsável</th>
                                        <th data-field="nome_projeto" data-halign="center" data-align="left" data-sortable="true">projeto</th>
                                        <th data-field="id_depto" data-halign="center" data-align="left" data-sortable="true">depto</th>
                                        <th data-field="descricao_projeto" data-halign="center" data-align="left" data-sortable="true">Descrição</th>
                                        <th data-field="criador" data-halign="center" data-align="left" data-sortable="true">Criado por:</th>
                                        <th data-field="datacria" data-halign="center" data-align="center" data-sortable="true">Data Criação </th>
                                        <th data-field="dtentrega" data-halign="center" data-align="center" data-sortable="true">Prev. Entrega </th>
                                        <th data-halign="center" data-align="center" data-formatter="anexo_projeto">Anexos</th>
                                        <th data-halign="center" data-align="center" data-formatter="opcoes_projeto">Açoes</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        endforeach;
        ?>
    </div>
</div>



<div class="container-fluid mt-2 p-2">
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
                    <div class="modal-body p-2">
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label>Selecione:</label>
                                <select class="form-control selectpicker" data-style="btn-success" id="slSituacao" name="slSituacao">
                                    <option value="">Selecione</option>
                                    <option value="A">Em andamento</option>
                                    <option value="P">Tarefa pausada</option>
                                    <option value="F">Tarefa finalizada</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12 col-sm-12">
                                <label>Descrição do andamento:</label>
                                <textarea type="text" class="form-control" name="situacaoTarefa" id="situacaoTarefa" rows="5" placeholder="Descrição"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-success p-2">
                        <button type="button" class="btn btn-outline-warning" data-dismiss="modal" onclick="LimparDados();">Sair</button>
                        <button type="submit" class="btn btn-outline-dark">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" id="modalCadastoProjeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro / Alteração de Projetos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" onclick="limpaFormProjetos();">&times;</span>
                </button>
            </div>

            <form method="post" id="cadastroProjeto" enctype="multipart/form-data">
                <div class="modal-body p-2">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12 d-none">
                            <label>ID Projeto:</label>
                            <input type="text" class="form-control" name="id_projeto" id="id_projeto" placeholder="ID do Projeto" readonly>
                        </div>

                        <div class="form-group col-md-8 col-sm-12">
                            <label>Nome do Projeto:</label>
                            <input type="text" class="form-control" name="nome_projeto" id="nome_projeto" placeholder="Nome do Projeto">
                        </div>

                        <div class="form-group col-md-4 col-sm-12 ">
                            <label>Previsão de entrega:</label>
                            <input type="date" class="form-control" name="dtentrega" id="dtentrega" placeholder="__ /__ /____">
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Descrição do Projeto:</label>
                            <textarea type="text" class="form-control" name="descricao_projeto" id="descricao_projeto" rows="7" placeholder="Descrição do Projeto"></textarea>
                        </div>
                        <input class="d-none" type="text" name="sldepto" id="sldepto">
                        <input class="d-none" type="text" name="edit_id_projeto" id="edit_id_projeto">
                        <div class="form-group col-md-12 col-sm-12">
                            <label>Selecione o responsável:</label>
                            <select class="form-control selectpicker" data-style="btn-success" id="slresp" name="slresp">
                                <option value="">Selecione o responsável</option>
                                <?php foreach ($usuarios->result() as $linha) :
                                ?>
                                    <option value="<?= $linha->id_users ?>"><?= $linha->nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Documentação:</label><br>
                            <input type="file" class="" name="arquivo" id="arquivo" accept=".doc, .docx, .pdf">
                        </div>

                        <div class="form-group col-md-12 col-sm-12 d-none">
                            <label>Anexo :</label>
                            <input type="text" class="form-control" name="caminho_anexo" id="caminho_anexo" placeholder="Anexo" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-success" style="background-color: #fff6ef;">
                    <button type="button" class="btn btn-warning" onclick="limpaFormProjetos();">Sair</button>
                    <button type="booton" class="btn btn-outline-dark btn-mini">Salvar Projeto</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" data-backdrop="static" id="modalCadastoEtapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro / Alteração de Etapas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" onclick="LimparDados();">&times;</span>
                </button>
            </div>
            <form method="post" id="cadastoEtapas" enctype="multipart/form-data">
                <div class="modal-body p-2">
                    <div class="row">
                        <div class="form-group col-12">
                            <input class="d-none" type="name" name="id_projetoEtapa" id="id_projetoEtapa">
                            <input class="d-none" type="name" name="edit_id_etapa" id="edit_id_etapa">
                            <input class="d-none" type="name" name="id_deptoEtapa" id="id_deptoEtapa">
                        </div>

                        <div class="form-group col-md- col-sm-8">
                            <label>Etapa:</label>
                            <input type="text" class="form-control" name="txtNomeEtapa" id="txtNomeEtapa" placeholder="Nome da Etapa">
                        </div>

                        <div class="form-group col-md-4 col-sm-12 ">
                            <label>Previsão de entrega:</label>
                            <input type="date" class="form-control" name="dtentregaEtapa" id="dtentregaEtapa">
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Descrição da etapa:</label>
                            <textarea type="text" class="form-control" name="descricaoEtapa" id="descricaoEtapa" rows="5" placeholder="Descrição da etapa"></textarea>
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Selecione o responsável:</label>
                            <select class="form-control selectpicker" data-style="btn-success" id="slrespEtapa" name="slrespEtapa">
                                <option value="">Selecione o responsável</option>
                                <?php foreach ($usuarios->result() as $linha) :
                                ?>
                                    <option value="<?= $linha->id_users ?>"><?= $linha->nome ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label>Documentação:</label><br>
                            <input type="file" name="fileEtapa" id="fileEtapa">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-success" style="background-color: #fff6ef;">
                    <button type="button" class="btn btn-warning" onclick="limpaFormProjetos();">Sair</button>
                    <button type="booton" id="cadastoEtapas" class="btn btn-outline-dark btn-mini">Salvar Etapa</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" data-backdrop="static" id="modalAtividades" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="container-fluid">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h2 class="modal-title text-white">ATIVIDADES</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="LimparDados();">&times;</span>
                    </button>
                </div>
                <form method="post" id="cadastroAtiv" enctype="multipart/form-data">
                    <div class="modal-body p-2">
                        <div class="row">
                            <div class="col-3">
                                <div class="card">
                                    <div class="form-group col-12">
                                        <input class="d-none" type="name" name="edit_id_Ativ" id="edit_id_Ativ">
                                        <input class="d-none" type="name" name="id_ativPorjeto" id="id_ativPorjeto">
                                        <input class="d-none" type="name" name="id_ativDepto" id="id_ativDepto">
                                        <input class="d-none" type="name" name="id_ativEtapa" id="id_ativEtapa">
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12">
                                        <label>Atividade:</label>
                                        <input type="text" class="form-control" name="Ativ" id="Ativ" placeholder="Nome da Atividade">
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 ">
                                        <label>Previsão de entrega:</label>
                                        <input type="date" class="form-control" name="dtentregaAtiv" id="dtentregaAtiv">
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12">
                                        <label>Selecione o responsável:</label>
                                        <select class="form-control selectpicker" data-style="btn-success" id="slrespAtiv" name="slrespAtiv">
                                            <option value="">Selecione o responsável</option>
                                            <?php foreach ($usuarios->result() as $linha) :
                                            ?>
                                                <option value="<?= $linha->id_users ?>"><?= $linha->nome ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label>Descrição da atividade:</label>
                                        <textarea type="text" class="form-control" name="descricaoAtiv" id="descricaoAtiv" rows="5" placeholder="Descrição da atividade"></textarea>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12">
                                        <label>Documentação:</label><br>
                                        <input type="file" name="fileAtiv" id="fileAtiv">
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <button type="booton" id="cadastroAtiv" class="btn btn-outline-dark btn-mini btn-block">Salvar Atividade</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-9">

                                <div id="card">
                                    <table class="table align-items-center" id="table_atividades" data-mobile-responsive="true" data-toggle="table" data-flat="true" data-search="true" data-show-pagination-switch="true" data-pagination="true" data-show-export="true" data-id-field="id" data-page-list="[2, 5, 25, 50, 100, ALL]" data-show-refresh="true" data-show-fullscreen="true" data-show-columns="true" data-show-columns-toggle-all="true" data-sort-order="asc" ?>
                                        <thead>
                                            <tr>
                                                <th data-field="id_atividade" data-halign="center" data-align="center" data-sortable="true">id</th>
                                                <th data-field="responsavel" data-halign="center" data-align="left" data-sortable="true">Responsável</th>
                                                <th data-field="atividade" data-halign="center" data-align="left" data-sortable="true">Atividade</th>
                                                <th data-field="descricao" data-halign="center" data-align="left" data-sortable="true">Descrição</th>
                                                <th data-field="data_criacao" data-halign="center" data-align="center" data-sortable="true">Data Criação </th>
                                                <th data-field="data_criacao" data-halign="center" data-align="center" data-sortable="true">Prev. Entrega </th>
                                                <th data-halign="center" data-align="center" data-formatter="downloadAtiv">Anexos</th>
                                                <th data-halign="center" data-align="center" data-formatter="opcoes_ativ">Açoes</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer bg-success" style="background-color: #fff6ef;">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







<script>
    function retProjetos(value) {
        // console.log(value)
        $.ajax({
            url: base_url + '/projetos/retProjetos',
            dataType: 'json',
            type: 'POST',
            data: {
                id_departamento: value
            },
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Buscando dados...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                $('.tableProjetos').bootstrapTable('removeAll');
                $('#tableProjeto' + value).bootstrapTable('append', data);
                //$('.tableProjetos').bootstrapTable('expandAllRows', value);
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Buscando dados...',
                    showConfirmButton: false,
                    timer: 100
                })
            },
        })
    }

    function editAtividades(id_atividade) {
        alert(1);
        $.ajax({
            url: base_url + '/atividades/retAtividades',
            dataType: 'json',
            type: 'POST',
            data: {
                id_atividade: id_atividade,
            },
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Buscando dados...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                console.log(data);
                $('#edit_id_Ativ').val(data[0].id_atividade),
                    $('#Ativ').val(data[0].atividade),
                    $('#dtentregaAtiv').val(data[0].dtentregaAtiv),
                    $('#descricaoAtiv').val(data[0].descricao),
                    $('#slrespAtiv').selectpicker('val', data[0].id_responsavel),
                    Swal.fire({
                        imageUrl: base_url + '/assets/alert/loader.gif',
                        title: 'Buscando dados...',
                        showConfirmButton: false,
                        timer: 100
                    })
            },
        })
    }

    function retatividades(id_etapa) {
        $.ajax({
            url: base_url + '/atividades/retAtividades',
            dataType: 'json',
            type: 'POST',
            data: {
                id_etapa: id_etapa
            },
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Buscando dados...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                console.log(data);
                $('#table_atividades').bootstrapTable('removeAll')
                $('#table_atividades').bootstrapTable('append', data)
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Buscando dados...',
                    showConfirmButton: false,
                    timer: 100
                })
            },
        })
    }



    function modalCadastoProjeto(value) {
        $('#modalCadastoProjeto').modal('show');
        $('#sldepto').val(value);
    }

    function modalCadastoEtapa(value, depto) {
        $('#modalCadastoEtapa').modal('show');
        $('#id_projetoEtapa').val(value);
        $('#id_deptoEtapa').val(depto);
    }
</script>