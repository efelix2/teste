//#################################################
//########    DELETA  FUNCOES
//#################################################
function del_funcoes(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover a função?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: base_url + 'local/funcoes/delFuncoes',
        type: 'POST',
        data: {id_funcao: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Deletando função, Aguarde...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Função deletada com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_funcoes').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}



////#################################################
//########    DELETA  CONTRIBUINTES   ##############
//#################################################
function del_contribuintes(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover o contribuinte?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: '../home/delContribuintes',
        type: 'POST',
        data: {id_contribuinte: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Deletando contribuinte, Aguarde...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Contribuinte deletado com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_contribuintes').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}


//#################################################
//########    DELETA  CONGREGACAO
//#################################################
function del_congregacoes(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover a congregacao?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: '../home/delCongregacao',
        type: 'POST',
        data: {id_congregacao: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Deletando congregação, Aguarde...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Congregação deletada com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_congregacoes').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}


//#################################################
//########    DELETA  DIREITOS DE ACESSO
//#################################################
function del_direitosAcessos(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover direito de acesso?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: base_url + '/admin/direitosacessos/delDireitosAcessos',
        type: 'POST',
        data: {id_users: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Deletando acesso, Aguarde...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Acesso deletado com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            limpaDireitosAcessos();
            $('#table_direitosAcesso').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}




//#################################################
//########    DELETA  CONGREGACAO
//#################################################
function del_periodoMovimento(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover o período?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: base_url + 'admin/periodosMovimentos/delPeriodoMovimento',
        type: 'POST',
        data: {id_movimento: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Deletando período, Aguarde...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Período deletado com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_periodosMovimentos').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}





//#################################################
//########    DELETA DESPESAS  
////#################################################
function del_despesa(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover a despesa?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: base_url + 'local/lancamentos/delDespesas',
        type: 'POST',
        data: {id_despesa: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Deletando despesa, Aguarde...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Despesa deletado com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_despesas').bootstrapTable('refresh');
            $('#table_lancamentos').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}


//#################################################
//########    DELETA  OFERTAS
//#################################################
function del_oferta(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover oferta?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: base_url + 'local/lancamentos/delOfertas',
        type: 'POST',
        data: {id_oferta: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Deletando oferta, Aguarde...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Oferta deletada com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_ofertas').bootstrapTable('refresh');
            $('#table_lancamentos').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}


//#################################################
//########    DELETA  OFERTAS
//#################################################
function del_dizimo(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover dízimo?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: base_url + 'local/lancamentos/delDizimos',
        type: 'POST',
        data: {id_dizimo: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Deletando dízimo, Aguarde...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Dizimo deletado com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_dizimos').bootstrapTable('refresh');
            $('#table_lancamentos').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}



//#################################################
//########      DELETA  LANÇAMENTOS
//#################################################
function fechar_lancamento(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Antes de fechar o lançamento verifique se os valores estão corretos?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, Fechar Lançamento!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: base_url + 'local/lancamentos/fecharLancamento',
        type: 'POST',
        data: {nro_doc: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: base_url + '/assets/alert/loader.gif',
                title: 'Fechando Lançamento...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Lançamento diário fechado com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_dizimos').bootstrapTable('refresh');
            $('#table_ofertas').bootstrapTable('refresh');
            $('#table_lancamentos').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}














//#################################################
//########      DELETA  CLIENTES     ##############
//#################################################
function del_cliente(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover o cliente?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: '/local/vendas/delcliente',
        type: 'POST',
        data: {id_cliente: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: '/local/assets/alert/loader.gif',
                title: 'Deletando cliente...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Cliente deletado com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_clientes').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}


//#################################################
//########      DELETA  COMPRADOR     ##############
//#################################################
function del_comprador(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover o comprador?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: '/local/compras/delcomprador',
        type: 'POST',
        data: {id_comprador: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: '/local/assets/alert/loader.gif',
                title: 'Deletando comprador...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'comprador deletado com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_compradores').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}



//#################################################
//#######  DELETA UNIDADE DE MEDIDA  ##############
//#################################################
function del_unimed(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover a unidade de medida?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: '/local/produtos/delUnimed',
        type: 'POST',
        data: {id_unimed: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: '/local/assets/alert/loader.gif',
                title: 'Deletando unidade de medidas...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Unidade de medida removida com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_unimed').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}



//#################################################
//#######        DELETA PRODUTOS     ##############
//#################################################
function del_Produto(value) {
Swal.fire({
  title: 'Atenção,',
  text: "Deseja realmente remover o produto?",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Não, voltar!',
  confirmButtonText: 'Sim, remover!'
}).then((result) => {
  if(result.value) {
        $.ajax({
        url: '/local/produtos/delproduto',
        type: 'POST',
        data: {id_produto: value},
        beforeSend: function () {
            Swal.fire({
                imageUrl: '/local/assets/alert/loader.gif',
                title: 'Deletando produto...',
                showConfirmButton: false
            })
        },
        success: function (data) {
            if(data == 1){
            Swal.fire({
                title: 'Sucesso!',
                text: 'Produto removido com sucesso!',
                type: 'success',
                confirmButtonColor: '#66dfd6',
                confirmButtonText: 'ok',
                animation: false
            });
            $('#table_produtos').bootstrapTable('refresh');
        }else{
            
        }
        },
        error: function (xhr, er) {
            msgSuporte();
        }
    });
  }
});
}


