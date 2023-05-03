<?php

defined('BASEPATH') or exit('No direct script access allowed');



class projetos extends MY_Controller
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
        $retorno['retGeral'] = $this->M_retorno->retCadGeral();
        $this->load->view('includes/header');
        $this->load->view('includes/menu_sup');
        $this->load->view('v_projetos1', $retorno);
        $this->load->view('includes/footer');
    }

    ////////////////////////////////////////
    // RETORNO DE CADASTRO GERAL
    // CRIADO POR MARCIO SILVA
    // DATA: 09/02/2023
    ////////////////////////////////////////
    public function retCadGeral(){
        $this->load->model('M_retorno');
        $retorno = $this->M_retorno->retCadGeral();
        // echo '<pre>';
        // print_r($retorno);
        // echo '<pre>';
    }

    ////////////////////////////////////////
    // RETORNO DE PROJETOS
    // CRIADO POR MARCIO SILVA
    // DATA: 09/02/2023
    ////////////////////////////////////////

    public function retProjetos()
    {
        $this->load->model('M_retorno');
        $retorno = $this->M_retorno->retProjetos();
        echo json_encode($retorno);
    }

    ////////////////////////////////////////
    // CADASTRAR PROJETO
    // CRIADO POR MARCIO SILVA
    // DATA: 08/02/2023
    ////////////////////////////////////////

    public function cadastrarProjeto()
    {
        $this->load->library('upload');
        $this->form_validation->set_rules('nome_projeto', 'Nome do Projeto', 'required');
        $this->form_validation->set_rules('descricao_projeto', 'Descrição de Projeto', 'required');
        $this->form_validation->set_rules('slresp', 'Responsável', 'required');
        $this->form_validation->set_rules('dtentrega', 'Previsão da entrega', 'required');
        if ($this->form_validation->run() == FALSE) {
            $return[] = array(
                'cod' => 3,
                'msg' => validation_errors()
            );
        } else {
            if ($_FILES['arquivo']['tmp_name'] != '') {
                $nomeImg = date('YmdHis') . $_FILES['arquivo']['name'];
                $caminhoArquivo = './assets/uploads/' . $nomeImg;
                if (!move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminhoArquivo)) {
                    $return[] = array(
                        'cod' => 0,
                        'msg' => 'Tarefa cadastrada com sucesso!'
                    );
                }
            } else {
                $nomeImg = null;
            }


            if ($this->input->post('edit_id_projeto') !== '') {
                $dados = [
                    'nome' => $this->input->post('nome_projeto'),
                    'responsavel' => $this->input->post('slresp'),
                    'descricao' => $this->input->post('descricao_projeto'),
                    'dtentrega' => $this->input->post('dtentrega'),
                    'situacao' => '',
                ];
            } else {
                $dados = [
                    'usucria' => $_SESSION['id_users'],
                    'nome' => $this->input->post('nome_projeto'),
                    'id_departamento' => $this->input->post('id_depProjeto'),
                    'responsavel' => $this->input->post('slresp'),
                    'descricao' => $this->input->post('descricao_projeto'),
                    'dtentrega' => $this->input->post('dtentrega'),
                    'anexo' => $nomeImg,
                    'situacao' => '',
                    'status' => ''
                ];
            }


            $return = $this->M_insert->cadastrarProjeto($dados);
        }
        echo json_encode($return);
    }

  
    public function retDadosProjetos()
    {
        $id_projeto = $this->input->post('id');

        $this->load->model('M_retorno');
        $retorno = $this->M_retorno->retDadosProjetos($id_projeto);

        echo json_encode($retorno->result()[0]);
    }

    public function alt_projeto()
    {
        var_dump($this->input->post());
        exit;
        $form = $this->input->post();

        $this->load->model('M_update');

        if ($_FILES['arquivo']['tmp_name'] != '') {

            $this->load->model('M_retorno');
            $retorno = $this->M_retorno->retAntigoAnexo($form['id_projeto']);

            /// CAPTURA EXTENSÃO DO ARQUIVO
            $extensao = substr(strrchr($_FILES['arquivo']['name'], '.'), 0);
            $caminhoArquivo = './assets/uploads/projetoDocs/' . date('YmdHis') . $extensao;

            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminhoArquivo)) {

                $form['caminhoArquivo'] = '.' . $caminhoArquivo;
                $retorno = $this->M_update->alt_projeto($form);
            } else {
                $retorno = [
                    'cod' => 0,
                    'mensagens' => 'Não Foi Possível Salvar o Documento no Servidor.'
                ];
            }
        } else {
            $retorno = $this->M_update->alt_projeto($form);
        }

        echo json_encode($retorno);
    }

    public function del_projeto()
    {
        $id_projeto = $this->input->post('projeto');
        $this->form_validation->set_rules('projeto', 'Projeto', 'callback_checar_departamento', array('checar_departamento' => 'Existem Tarefas Cadastradas Para Esse Projeto.'));

        if ($this->form_validation->run() == FALSE) {
            $retorno = array(
                'cod' => 0,
                'msg' => validation_errors()
            );
        } else {
            $this->load->model('M_delete');
            $retorno = $this->M_delete->del_projeto($id_projeto);
        }

        echo json_encode($retorno);
    }

    public function checar_departamento($valor)
    {
        $this->load->model('M_retorno');
        $count = $this->M_retorno->check_fk('tbl_tarefas', 'id_projeto', $valor);

        if ($count > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
}
