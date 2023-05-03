<?php

defined('BASEPATH') or exit('No direct script access allowed');

class atividades extends MY_Controller
{
    ////////////////////////////////////////
    // HOME PADRAO
    // CRIADO POR MARCIO SILVA
    // DATA: 09/02/2023
    ////////////////////////////////////////
    public function index()
    {
    }

    ////////////////////////////////////////
    // EDITAR ETAPAS
    // CRIADO POR MARCIO SILVA
    // DATA: 19/04/2023
    ////////////////////////////////////////
    public function edtAtividades()
    {
        $dados = $this->input->post();

        // echo '<pre>';
        // print_r($dados);
        // echo '</pre>';
        // exit;

        $this->form_validation->set_rules('Ativ', 'Atividade', 'required');
        $this->form_validation->set_rules('dtentregaAtiv', 'Previsão da entreaga', 'required');
        $this->form_validation->set_rules('descricaoAtiv', 'descricão', 'required');

        if ($this->form_validation->run() == FALSE) {
            $return[] = array(
                'cod' => 3,
                'msg' => validation_errors()
            );
        } else {
            // $this->load->model('M_insert');
            // if ($_FILES['fileAtiv']['tmp_name'] != '') {
            //     $nomeImg = date('YmdHis') . $_FILES['fileAtiv']['name'];
            //     $caminhoArquivo = './assets/uploads/' . $nomeImg;
            //     if (!move_uploaded_file($_FILES['fileAtiv']['tmp_name'], $caminhoArquivo)) {
            //         $nomeImg[] = array(
            //             'cod' => 0,
            //             'msg' => 'Projeto cadastrado com sucesso!'
            //         );
            //     }
            // } else {
            //     $nomeImg = '';
            // }
        }
    }

    ////////////////////////////////////////
    // CADASTRAR ETAPAS
    // CRIADO POR MARCIO SILVA
    // DATA: 08/02/2023
    ////////////////////////////////////////
    public function cadAtividades()
    {
        // $dados = $this->input->post();
        // echo '<pre>';
        // print_r($this->input->post());
        // echo '</pre>';
        // exit;
        $this->load->library('upload');
        $this->form_validation->set_rules('Ativ', 'Atividade', 'required');
        $this->form_validation->set_rules('dtentregaAtiv', 'Previsão da entreaga ', 'required');
        $this->form_validation->set_rules('descricaoAtiv', 'descricão', 'required');

        if ($this->form_validation->run() == FALSE) {
            $return[] = array(
                'cod' => 3,
                'msg' => validation_errors()
            );
        } else {

            if ($_FILES['fileAtiv']['tmp_name'] != '') {
                $nomeImg = date('YmdHis') . $_FILES['fileAtiv']['name'];
                $caminhoArquivo = './assets/uploads/' . $nomeImg;
                if (!move_uploaded_file($_FILES['fileAtiv']['tmp_name'], $caminhoArquivo)) {
                    $ret[] = array(
                        'cod' => 0,
                        'msg' => 'Projeto cadastrado com sucesso!'
                    );
                }
            } else {
                $caminhoArquivo = '';
                $ret[] = array(
                    'cod' => 3,
                    'msg' => 'Não foi possível armazenar o anexo!'
                );
            }
            if ($this->input->post('edit_id_Ativ') == '') {
                $this->load->model('M_insert');
                $return = $this->M_insert->cadastrarAtiv($caminhoArquivo);
            } else {
                $this->load->model('M_update');
                $return = $this->M_update->edtAtividades();
            }
        }

        echo json_encode($return);
    }

    ////////////////////////////////////////
    // RETORNAR ETAPAS
    // CRIADO POR MARCIO SILVA
    // DATA: 08/02/2023
    ////////////////////////////////////////
    public function retAtividades()
    {
        $this->load->model('M_retorno');
        $retorno = $this->M_retorno->retAtividades();
        echo json_encode($retorno->result());
    }

    ////////////////////////////////////////
    // DELETAR ETAPAS
    // CRIADO POR MARCIO SILVA
    // DATA: 08/02/2023
    ////////////////////////////////////////
    public function del_etapa()
    {
        $this->form_validation->set_rules('id_etapa', 'ID da Etapa', 'required');
        $id_etapa = $this->input->post('id_etapa');
        if ($this->form_validation->run() == FALSE) {
            $retorno = array(
                'cod' => 0,
                'msg' => validation_errors()
            );
        } else {
            $this->load->model('M_delete');
            $retorno = $this->M_delete->del_etapa($id_etapa);
        }
        echo json_encode($retorno);
    }
}
