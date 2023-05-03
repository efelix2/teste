/*################################################
 #####    FUNÇÕES PADRÕES DO SISTEMA        ######
 #####    CRIADO EM 26/06/2019              ######
 #####    MARCIO SILVA                      ######
 ################################################*/

//#################################################
//######### CADASTAR E ALTERAR TAREFAS
//#################################################
$(document).ready(function() {
    $('#cadastroTarefas').submit(function(e) {
        e.preventDefault()
        var serializeDados = $('#cadastroTarefas').serialize()
        $.ajax({
            url: base_url + 'tarefas/cadTarefas',
            dataType: 'json',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Validando formulário...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                if (data[0].ret === 3) {
                    msgValida(data[0].msg)
                } else {
                    msgRetorno(data[0].msg)
                    $('#ModalTarefas').modal('hide');
                    $('#table_tarefas').bootstrapTable('refresh');
                    $('.selectpicker').selectpicker('val', '');
                    $('#cadastroTarefas').trigger('reset');
                }
            },
            error: function(xhr, er) {
                msgSuporte()
            }
        })
    });
});


//#################################################
//######### CADASTAR E ALTERAR ATIVIDADES 
//#################################################
$(document).ready(function() {

    $('#cadastroAtiv').submit(function(e) {
        e.preventDefault()
        var serializeDados = $('#cadastroAtiv').serialize()

        // if(($('#edit_id_Ativ').val()).trim() == ''){
        //     destino = 'cadAtividades';
        // } else {
        //     destino = 'edtAtividades';
        // }
        

        $.ajax({
            url: base_url + 'atividades/cadAtividades',
            dataType: 'json',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Validando formulário...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                console.log(data[0].data.id_etapa);
                if (data[0].cod == 3) {
                    msgValida(data[0].msg)
                } else {


                    
                    if($('#edit_id_Ativ').val() == ''){
                    $('#'+projeto_atividade).append('<div class="notice notice-dark alert fade show box-shadow" role="alert"> \n\
                    <button type="button" class="close" onclick="$(\'#modalAtividades\').modal(\'show\'); dados_editar({nome_atividade: \''+ $('#Ativ').val() +'\', prev_entrega:\''+$('#dtentregaAtiv').val()+'\', id_responsavel: '+ $('#slrespAtiv').val() +', descricao_atividade:\''+ $('#descricaoAtiv').val() +'\', id_atividade: '+data[0].ultimo_id[0].id_atividade+', id_projeto: '+$('#id_ativProjeto').val()+', id_depto: '+$('#id_ativDepto').val()+' });"><i class="fa fa-bars fa-1x text-dark m-2" aria-hidden="true"></i></button>\n\
                    <div class="row">\n\
                        <div class="col-12 p-1">\n\
                            <strong> '+ $('#Ativ').val() +'</strong>\n\
                            <br>\n\
                            <p class="m-0" maxlength="10" style="font-size: 10px;">'+$('#descricaoAtiv').val()+'</p>\n\
                            <p class="m-0" maxlength="10" style="font-size: 10px;">Criação: '+dtatual+' </p>\n\
                            <p class="m-0" maxlength="10" style="font-size: 10px;">Finalização: '+ ((($('#dtentregaAtiv').val()).split('-')).reverse()).join('/') +'</p>\n\
                        </div>\n\
                    </div>\n\
                </div>')
                    }
                    
                    retatividades(data[0].data.id_etapa);
                    msgRetorno(data[0].msg)
                    $('#table_atividades').bootstrapTable('refresh');
                    $('.selectpicker').selectpicker('val', '');
                    $('#edit_id_ativ').val('');
                    $('#Ativ').val('');
                    $('#dtentregaAtiv').val('');
                    $('#descricaoAtiv').val('');
                    $('#fileAtiv').val('');
                }
            },
            error: function(xhr, er) {
                msgSuporte()
            }
        })
    });
});



//#################################################
//######### CADASTAR E ALTERAR PROJETOS
//#################################################
$(document).ready(function() {
    $('#cadastroProjeto').submit(function(e) {
        e.preventDefault()
        var serializeDados = $('#cadastroProjeto').serialize()
        $.ajax({
            url: base_url + 'projetos/cadastrarProjeto',
            dataType: 'json',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Validando formulário...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                if (data[0].ret === 3) {
                    msgValida(data[0].msg)
                } else if (data[0].cod === 1) {
                    Swal.fire({
                        title: 'Sucesso!',
                        text: "Operação efetuada com sucesso!",
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'ok'
                    }).then((result) => {
                        $('#modalCadastoProjeto').modal('hide');
                        retProjetos($('#sldepto').val());
                        $('.tableProjetos').bootstrapTable('refresh');
                        limpaForm();
                    })
                }
            },
            error: function(xhr, er) {
                msgSuporte()
            }
        })
    });
});



//#################################################
//######### CADASTAR E ALTERAR ETEPAS
//#################################################

$(document).ready(function() {
    $('#cadastoEtapas').submit(function(e) {
        e.preventDefault()
        var serializeDados = $('#cadastoEtapas').serialize();
        $.ajax({
            url: base_url + 'etapas/cadastrarEtapa',
            dataType: 'json',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Validando formulário...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                if (data[0].cod == 3) {
                    msgValida(data[0].msg)
                } else if (data[0].cod == 1) {
                    Swal.fire({
                        title: 'Sucesso!',
                        text: "Operação efetuada com sucesso!",
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'ok'
                    }).then((result) => {
                        $('#modalCadastoEtapa').modal('hide');
                        $('#table_conjuntos' + $('#id_projetoEtapa').val()).bootstrapTable('removeByUniqueId', data[0].dados[0]);
                        $('#table_conjuntos' + $('#id_projetoEtapa').val()).bootstrapTable('append', {
                            id_etapa: data[0].dados[0],
                            etapa: data[0].dados.etapa,
                            descricao: data[0].dados.descricao,
                            data_criacao_etapa: data[0].dados[1],
                            data_entrega_etapa: data[0].dados[2]
                        });
                        limpaForm();
                    })
                }
            },
            error: function(xhr, er) {
                msgSuporte()
            }
        })
    });
});








function btn_download(value, row) {
    if (row.anexo_projeto !== '') {
        return '<a href="' + row.anexo_projeto + '" download><button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-cloud-download-alt"></i></button></a>';
    }
}

function downloadAtiv(value, row) {
    if (row.anexo_projeto !== '') {
        return '<a href="' + base_url + 'assets/uploads/' + row.anexo_atividade + '" download><button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-cloud-download-alt"></i></button></a>';
    }
}

function opcoes_projeto(value, row) {
    if (row.situacao_projeto == '') {
        return '<button type="button" class="btn btn-danger btn-sm my-1" onclick="edit_situacao(\'' + row.id_tarefa + '\', ' + row.id_projeto + ');">Pendente</button> <br> <a href="' + row.anexo_projeto + '" download><button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-cloud-download-alt"></i></button></a> <button type="button" class="btn btn-outline-danger btn-sm" onclick="del_projeto(' + row.id_projeto + ');"><i class="fas fa-trash-alt"></i></button>';
    } else if (row.situacao_projeto == 'A') {
        return '<button type="button" class="btn btn-success btn-sm my-1" onclick="edit_situacao(\'' + row.id_tarefa + '\', ' + row.id_projeto + ');">Em andamento</button> <br> <a href="' + row.anexo_projeto + '" download><button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-cloud-download-alt"></i></button></a> <button type="button" class="btn btn-outline-danger btn-sm" onclick="del_projeto(' + row.id_projeto + ');"><i class="fas fa-trash-alt"></i></button>';
    } else if (row.situacao_projeto == 'F') {
        return '<button type="button" class="btn btn-dark btn-sm my-1" disabled>Finalizado</button> <br> <a href="' + row.anexo_projeto + '" download><button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-cloud-download-alt"></i></button></a> <button type="button" class="btn btn-outline-danger btn-sm" onclick="del_projeto(' + row.id_projeto + ');"><i class="fas fa-trash-alt"></i></button>';
    } else if (row.situacao_projeto == 'P') {
        return '<button type="button" class="btn btn-warning btn-sm my-1" onclick="edit_situacao(\'' + row.id_tarefa + '\', ' + row.id_projeto + ');">Pausado</button> <br> <a href="' + row.anexo_projeto + '" download><button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-cloud-download-alt"></i></button></a> <button type="button" class="btn btn-outline-danger btn-sm" onclick="del_projeto(' + row.id_projeto + ');"><i class="fas fa-trash-alt"></i></button>';
    }
}



//#################################################
//#########   CADASTAR DIRETOS DE ACESSO
//#################################################
$(document).ready(function() {
    $('#usuarios').submit(function(e) {
        e.preventDefault()
        var serializeDados = $('#usuarios').serialize()
        $.ajax({
            url: base_url + '/usuarios/cadUsuarios',
            dataType: 'json',
            type: 'POST',
            data: serializeDados,
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Validando formulário...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                if (data[0].ret === 3) {
                    msgValida(data[0].msg)
                } else if (data[0].ret === 1) {
                    limpaUsers()
                    $('#ModalDireotosAcessos').modal('hide');
                    $('#table_direitosAcesso').bootstrapTable('refresh');
                    msgRetorno(data[0].msg);
                } else {
                    limpaUsers()
                    $('#ModalDireotosAcessos').modal('hide');
                    $('#table_direitosAcesso').bootstrapTable('refresh');
                    msgRetorno(data[0].msg);
                }
            },
            error: function(xhr, er) {
                msgSuporte()
            }
        })
    })
})

//#################################################
//######### ALTERAR  PROJETOS #####################
//#################################################
function retDadosProjetos(id_projeto) {
    $.ajax({
        url: base_url + '/projetos/retDadosProjetos',
        dataType: 'json',
        type: 'POST',
        data: { id: id_projeto },
        beforeSend: function() {
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Buscando dados...',
                showConfirmButton: false
            })
        },
        success: function(data) {
            $('#edit_id_projeto').val(data.id_projeto);
            $('#nome_projeto').val(data.nome);
            $('#dtentrega').val(data.dtentrega);
            $('#descricao_projeto').val(data.descricao);
            $('#sldepto').val(data.departamento);
            $('#slresp').selectpicker('val', data.responsavel);
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Buscando dados...',
                showConfirmButton: false,
                timer: 1
            })
            $('#modalCadastoProjeto').modal('show')
        },
        error: function(xhr, er) {
            msgSuporte();
        }
    })
}

//#################################################
//######### RETORNA ETAPAS   #####################
//#################################################
function retDadosEtapas(id_etapa) {
    $.ajax({
        url: base_url + '/etapas/retDadosEtapas',
        dataType: 'json',
        type: 'POST',
        data: { id: id_etapa },
        beforeSend: function() {
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Buscando dados...',
                showConfirmButton: false
            })
        },
        success: function(data) {
            $('#edit_id_etapa').val(data[0].id_etapa);
            $('#id_projetoEtapa').val(data[0].id_projeto);
            $('#id_deptoEtapa').val(data[0].id_departamento);

            $('#txtNomeEtapa').val(data[0].etapa);
            $('#dtentregaEtapa').val(data[0].dtentrega);
            $('#descricaoEtapa').val(data[0].descricao);
            $('#slrespEtapa').selectpicker('val', data[0].responsavel);
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Buscando dados...',
                showConfirmButton: false,
                timer: 1
            })
            $('#modalCadastoEtapa').modal('show');
        },
        error: function(xhr, er) {
            msgSuporte();
        }
    })
}

//#################################################
//######### DELETAR  PROJETOS #####################
//#################################################
function del_projeto(id_projeto) {
    Swal.fire({
        title: 'Atenção...',
        text: 'Tem Certeza Que Deseja Deletar Esse Projeto?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Não!'
    }).then((result) => {
        if (result['value'] == true) {

            $.ajax({
                url: base_url + '/projetos/del_projeto',
                dataType: 'json',
                type: 'POST',
                data: { projeto: id_projeto },
                beforeSend: function() {
                    Swal.fire({
                        imageUrl: base_url + '/assets/alert/loader.gif',
                        title: 'Deletando dados...',
                        showConfirmButton: false
                    })
                },
                success: function(data) {
                    if (data.cod == 1) {
                        Swal.fire({
                            title: 'Sucesso!',
                            text: "Operação efetuada com sucesso!",
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        }).then((result) => {
                            $('#modalCadastoProjeto').modal('hide');
                            retProjetos($('#sldepto').val());
                            $('.tableProjetos').bootstrapTable('refresh');
                            limpaForm();
                        })
                    } else {
                        msgValida(data.msg);
                    }
                },
                error: function(xhr, er) {
                    msgSuporte()
                }
            })
        }
    })
}


//#################################################
//######### DELETAR  ETAPAS   #####################
//#################################################
function del_etapa(id_etapa) {
    Swal.fire({
        title: 'Atenção...',
        text: 'Tem Certeza Que Deseja Deletar a etapa selecionada?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Não!'
    }).then((result) => {
        if (result['value'] == true) {

            $.ajax({
                url: base_url + '/etapas/del_etapa',
                dataType: 'json',
                type: 'POST',
                data: { id_etapa: id_etapa },
                beforeSend: function() {
                    Swal.fire({
                        imageUrl: base_url + '/assets/alert/loader.gif',
                        title: 'Deletando dados...',
                        showConfirmButton: false
                    })
                },
                success: function(data) {
                    if (data.cod == 1) {
                        $('#table_conjuntos').bootstrapTable('hideRow', { uniqueId: id_etapa });
                        Swal.fire({
                            title: 'Sucesso!',
                            text: "Operação efetuada com sucesso!",
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        });
                    } else {
                        msgValida(data.msg);
                    }
                },
                error: function(xhr, er) {
                    msgSuporte()
                }
            })
        }
    })
}


//###################################################
//######### DELETAR  ATIVIDADES #####################
//###################################################
function del_etapa(id_etapa) {
    Swal.fire({
        title: 'Atenção...',
        text: 'Tem Certeza Que Deseja Deletar a atividade?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Não!'
    }).then((result) => {
        if (result['value'] == true) {

            $.ajax({
                url: base_url + '/atividades/del_atividade',
                dataType: 'json',
                type: 'POST',
                data: { id_etapa: id_etapa },
                beforeSend: function() {
                    Swal.fire({
                        imageUrl: base_url + '/assets/alert/loader.gif',
                        title: 'Deletando dados...',
                        showConfirmButton: false
                    })
                },
                success: function(data) {
                    if (data.cod == 1) {
                        $('#table_conjuntos').bootstrapTable('hideRow', { uniqueId: id_etapa });
                        Swal.fire({
                            title: 'Sucesso!',
                            text: "Operação efetuada com sucesso!",
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        });
                    } else {
                        msgValida(data.msg);
                    }
                },
                error: function(xhr, er) {
                    msgSuporte()
                }
            })
        }
    })
}


//############################################################
//######## LIMPAR CAMPOS DE CADASTRO DE PROJETO ##############
//############################################################
function limpaForm() {
    $('#cadastroProjeto').trigger('reset');
    $('#cadastoEtapas').trigger('reset');
    $('.selectpicker').selectpicker('val', '');
}


//#################################################
//########   REDIMENCIONAR TABELAS   ##############
//#################################################
$('.table').on('load-success.bs.table', function() {
    var params = { minWidth: 1130, tableId: '.table' }
    if ($(window).width() < 1130) {
        $('.table').bootstrapTable('toggleView')
    }
    var toggle = window.innerWidth <= params.minWidth
    window.addEventListener('resize', function() {
        if (window.innerWidth <= params.minWidth && toggle === false) {
            $(params.tableId).bootstrapTable('toggleView')
            toggle = true
        } else if (window.innerWidth > params.minWidth && toggle === true) {
            $(params.tableId).bootstrapTable('toggleView')
            toggle = false
        }
    })
})

//#################################################
//######  MENSAGENS PADRAO DO SISTEMA #############
//#################################################
function msgValida(data) {
    Swal.fire({
        title: 'Atenção!',
        html: data,
        type: 'warning',
        confirmButtonColor: '#fb6340',
        confirmButtonText: 'Verificar',
        animation: false,
        customClass: {
            popup: 'animated tada'
        }
    })
}

function msgRetorno(data) {
    Swal.fire({
        title: 'Sucesso!',
        html: data,
        type: 'success',
        confirmButtonColor: '#66dfd6',
        confirmButtonText: 'Voltar',
        animation: false
    })
}

function msgSuporte() {
    Swal.fire({
        title: 'Ops!',
        html: 'Algo inesperado aconteceu, verifique com o suporte do sistema',
        type: 'question',
        confirmButtonColor: '#66dfd6',
        confirmButtonText: 'Voltar',
        animation: false
    })
}








//#################################################
//######## LIMPAR FORMULARIO DE USUARIOS
//#################################################
function limpaUsuarios() {
    $('#usuarios').trigger('reset');
    $('#sldepto').selectpicker('val', '');
    $('#slnivel').selectpicker('val', '');
}


//#################################################
//#########   CADASTRAR DEPARTAMENTO
//#################################################
$(document).ready(function() {
    $('#cadastrarDepartamento').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'depto/cadastrarDepartamento',
            dataType: 'json',
            type: 'POST',
            data: $('#cadastrarDepartamento').serialize(),
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Inserindo dados...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                if (data[0].ret === 3) {
                    msgValida(data[0].msg);
                } else if (data[0].ret === 1) {
                    $('#ModalDepto').modal('hide')
                    $('#table_depto').bootstrapTable('refresh');
                    limpaUsuarios();
                    msgRetorno(data[0].msg);
                } else {
                    msgValida(data[0].msg);
                }
            },
            error: function(xhr, er) {
                msgSuporte()
            }
        })
    })
})


//#################################################
//######### LIMPAR CAMPOS PREENCHIDOS
//#################################################
function LimparDados() {

}



//#################################################
//######### ALTERAR SITUAÇÃO DA TAREFA
//#################################################
$(document).ready(function() {
    $('#cadastroSituacao').submit(function(e) {
        e.preventDefault()
        var serializeDados = $('#cadastroSituacao').serialize()
        $.ajax({
            url: base_url + 'tarefas/cadSituacao',
            dataType: 'json',
            type: 'POST',
            //data: serializeDados,
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function() {
                Swal.fire({
                    imageUrl: base_url + '/assets/alert/loader.gif',
                    title: 'Validando formulário...',
                    showConfirmButton: false
                })
            },
            success: function(data) {
                if (data[0].ret === 3) {
                    msgValida(data[0].msg)
                } else {
                    msgRetorno(data[0].msg)
                    $('#ModalTarefas').modal('hide');
                    $('#btnCadastro').bootstrapTable('refresh');
                    $('.tableProjetos').bootstrapTable('refresh');
                    $('#table_tarefas').bootstrapTable('refresh');
                    $('#detalheSituacao').modal('hide');
                    $('#cadastroSituacao').trigger('reset');
                }
            },
            error: function(xhr, er) {
                msgSuporte()
            }
        })
    })
})



//#################################################
//######### DELETAR DEPARTAMENTO   ################
//#################################################
function del_departamento(id_departamento) {
    Swal.fire({
        title: 'Tem certeza que deseja deletar esse departamento?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Sair!'
    }).then((result) => {
        if (result['value'] == true) {

            $.ajax({
                url: base_url + 'depto/del_departamento',
                dataType: 'json',
                type: 'POST',
                data: { id_departamento: id_departamento },
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
                        $('#table_depto').bootstrapTable('refresh');
                    } else {
                        msgValida(data[0].msg);
                    }
                },
                error: function(xhr, er) {
                    msgSuporte()
                }
            })


        }
    })
}



$(".tableProjetos").bootstrapTable({
    onExpandRow: function(index, row, $detail) {
        $detail.html('Carregando dados...');
        columns = [{
                field: 'id_etapa',
                title: 'ID',
                align: 'center',
                valign: 'middle'
            },
            {
                field: 'etapa',
                title: 'Etapa',
                align: 'left',
                valign: 'middle'
            },
            {
                field: 'descricao',
                title: 'DESCRIÇÃO',
                align: 'left',
                valign: 'middle'
            },
            {
                field: 'data_criacao_etapa',
                title: 'CRIADO EM:',
                align: 'center',
                valign: 'middle'
            },
            {
                field: 'data_entrega_etapa',
                title: 'PREVISÃO DE ENTREGA:',
                align: 'center',
                valign: 'middle'
            },
            {
                field: 'anexo',
                title: 'anexo',
                align: 'center',
                valign: 'middle',
                formatter: function download(value, row) {
                    if (row.anexo != "") {
                        return '<a href="' + base_url + 'assets/uploads/' + row.anexo + '" download><button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-cloud-download-alt"></i></button></a>';
                    } else {
                        return 'Sem anexo';
                    }
                }
            },
            {
                field: 'situacao',
                title: 'situação',
                align: 'center',
                valign: 'middle',
                formatter: function situacao(value, row) {
                    return '<button type="button" class="btn btn-primary btn-sm" onclick="modalAtividades(\'' + row.id_etapa + '\', \'' + row.id_projeto + '\', \'' + row.id_departamento + '\');">Atividades</button>';
                }
            },
            {
                field: 'ações',
                title: 'situação',
                align: 'center',
                valign: 'middle',
                formatter: function situacao(value, row) {
                    return '<button type="button" onclick="retDadosEtapas(' + row.id_etapa + ');" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button> <button onclick="del_etapa(' + row.id_etapa + ');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
                }
            },

        ];
        $detail.html('<button onclick="modalCadastoEtapa(\'' + row.id_projeto + '\', ' + row.id_depto + ');" type="button" class="btn btn-warning button' + row.id_projeto + '" >ADICIONAR ETAPAS</button>');
        $detail.append('<table class="subtable" id="table_conjuntos' + row.id_projeto + '" data-show-refresh="true" data-toolbar=".button' + row.id_projeto + '" data-search="true" data-unique-id="id_etapa"></table>').find('table').bootstrapTable({
            columns: columns,
            data: row.info,
        });
    }
});



function edit_situacaoDet(id_tarefa, id_projeto) {
    $('#id_situacao').val(id_tarefa);
    $('#id_situacaoP').val(id_projeto);
    $('#detalheSituacao').modal('show');
}

function opcoes_projeto(value, row) {
    return '<button type="button" onclick="retDadosProjetos(' + row.id_projeto + ');" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button> <button onclick="del_projeto(' + row.id_projeto + ');" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>';
}

function opcoes_ativ(value, row) {
    return '<button type="button" onclick="editAtividades(' + row.id_atividade + ');" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>';
}

function anexo_projeto(value, row) {
    return '<a href="' + base_url + '/assets/uploads/' + row.anexo_projeto + '" download><button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-cloud-download-alt"></i></button></a>';
}

function modalAtividades(etapa, projeto, depto) {
    retatividades(etapa)
    $('#modalAtividades').modal('show');
    $('#id_ativEtapa').val(etapa);
    $('#id_ativProjeto').val(projeto);
    $('#id_ativDepto').val(depto);
}