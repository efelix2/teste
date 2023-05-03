
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_update extends CI_Model
{

    ////////////////////////////////////////
    // ALTERAÇÃO DE STATUS DE TAREFAS                   
    // CRIADO POR MARCIO SILVA            
    // DATA: 31/05/2019                   
    ////////////////////////////////////////   
    public function altSituacaoTarefa($dados)
    {

        $id_tarefa = $this->input->post('id_situacao');
        $id_projeto = $this->input->post('id_situacaoP');
        $descricao = $this->input->post('situacaoTarefa');
        $situacao = $this->input->post('slSituacao');

        if ($situacao === 'F') {
            $data_fim = date('Y-m-d');
        } else {
            $data_fim = '';
        }

        $dados_tarefas = array(
            "situacao" => $situacao,
            "data_fim" => $data_fim
        );

        $dados_projetos = array(
            "situacao" => 'F',
            "data_fim" => date('Y-m-d')
        );

        $this->db->trans_begin();

        $this->db->where('id_tarefa', $id_tarefa);
        $this->db->update('tbl_tarefas', $dados_tarefas);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $retorno = 0;
        } else {
            $this->db->where('id_projeto', $id_projeto);
            $this->db->update('tbl_projetos', $dados_projetos);
            $this->db->trans_commit();
            $retorno = 1;
        }
        return $retorno;
    }

    ////////////////////////////////////////
    // ALTERAÇÃO DO REGISTRO DE ATIVIDADE                   
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

        $update = [
            'atividade' => $dados['Ativ'],
            'data_fim' => $dados['dtentregaAtiv'],
            'responsavel' => $dados['slrespAtiv'],
            'descricao' => $dados['descricaoAtiv']
            // 'anexo' => 
        ];

        //     [edit_id_Ativ] => 51
        //     [id_ativProjeto] => 169
        //     [id_ativDepto] => 45

        $this->db->trans_begin();

        $this->db->where('id_atividade', $dados['edit_id_Ativ']);
        $this->db->where('id_departamento', $dados['id_ativDepto']);
        $this->db->update('tbl_atividades', $update);

        // $this->db->where('id_atividade', $dados['edit_id_Ativ']);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $retorno = 0;
        } else {
            $this->db->trans_commit();
            $retorno = 1;
        }

        echo $retorno;
        exit;

        return $retorno;
    }
}
