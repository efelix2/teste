<?php

defined('BASEPATH') or exit('No direct script access allowed');

class etapas extends MY_Controller
{
    ////////////////////////////////////////
    // HOME PADRAO
    // CRIADO POR MARCIO SILVA
    // DATA: 09/02/2023
    ////////////////////////////////////////
    public function index()
    {

        $this->load->model('M_retorno');
        $retorno['projetos'] = $this->M_retorno->retProjetos();
        $retorno['depto'] = $this->M_retorno->retDepto();
        $retorno['usuarios'] = $this->M_retorno->retUsuarios('', '');
        $this->load->view('includes/header');
        $this->load->view('includes/menu_sup');
        $this->load->view('v_projetos', $retorno);
        $this->load->view('includes/footer');
    }

    ////////////////////////////////////////
    // CADASTRAR ETAPAS
    // CRIADO POR MARCIO SILVA
    // DATA: 08/02/2023
    ////////////////////////////////////////
    public function cadastrarEtapa()
    {
        $this->load->library('upload');
        $this->form_validation->set_rules('txtNomeEtapa', 'Nome da etapa', 'required');
        $this->form_validation->set_rules('dtentregaEtapa', 'Previsão da entreaga ', 'required');
        $this->form_validation->set_rules('slrespEtapa', 'Responsável', 'required');

        if ($this->form_validation->run() == FALSE) {
            $return[] = array(
                'cod' => 3,
                'msg' => validation_errors()
            );
        } else {
            $form = $this->input->post();
            $this->load->model('M_insert');
            if ($_FILES['fileEtapa']['tmp_name'] != '') {
                $nomeImg = date('YmdHis') . $_FILES['fileEtapa']['name'];
                $caminhoArquivo = './assets/uploads/' . $nomeImg;
                if (!move_uploaded_file($_FILES['fileEtapa']['tmp_name'], $caminhoArquivo)) {
                    $nomeImg[] = array(
                        'cod' => 0,
                        'msg' => 'Projeto cadastrado com sucesso!'
                    );
                }
            } else {
                $nomeImg = '';
            }

            $id_depto = $this->input->post('id_projetoEtapa');
            $this->load->model('M_retorno');
            $id_depto = $this->M_retorno->retProjetos($id_depto);

            $d = json_decode($id_depto[0]['id_depto']);

            if ($this->input->post('edit_id_etapa') !== '') {
                $dados = [
                    'usucria' => $_SESSION['id_users'],
                    'id_etapa' => $this->input->post('edit_id_etapa'),
                    'id_projeto' => $this->input->post('id_projetoEtapa'),
                    'id_departamento' => $d,
                    'etapa' => $this->input->post('txtNomeEtapa'),
                    'dtentrega' => $this->input->post('dtentregaEtapa'),
                    'descricao' => $this->input->post('descricaoEtapa'),
                    'responsavel' => $this->input->post('slrespEtapa'),
                    'situacao' => ''
                ];
            } else {
                $dados = [
                    'usucria' => $_SESSION['id_users'],
                    'id_etapa' => $this->input->post('edit_id_etapa'),
                    'id_projeto' => $this->input->post('id_projetoEtapa'),
                    'id_departamento' => $d,
                    'etapa' => $this->input->post('txtNomeEtapa'),
                    'dtentrega' => $this->input->post('dtentregaEtapa'),
                    'anexo' => $nomeImg,
                    'descricao' => $this->input->post('descricaoEtapa'),
                    'responsavel' => $this->input->post('slrespEtapa'),
                    'situacao' => ''

                ];
            }


            $return = $this->M_insert->cadastrarEtapa($dados);
        }

        echo json_encode($return);
    }

    ////////////////////////////////////////
    // RETORNAR ETAPAS
    // CRIADO POR MARCIO SILVA
    // DATA: 08/02/2023
    ////////////////////////////////////////
    public function retDadosEtapas()
    {
        $id_etapa = $this->input->post('id');
        $this->load->model('M_retorno');
        $retorno = $this->M_retorno->retEtapas('', $id_etapa);
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
