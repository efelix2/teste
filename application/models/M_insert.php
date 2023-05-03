
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_insert extends CI_Model
{
    ////////////////////////////////////////
    // CRIAR USUARIO                     
    // CRIADO POR MARCIO SILVA            
    // DATA: 08/02/2023                   
    ////////////////////////////////////////   
    public function cadUsuarios($value)
    {
        $dados = [
            "nome" => $value['nome'],
            "registro" => $value['registro'],
            "id_departamento" => $value['sldepto'],
            "usuario" => $value['usuario'],
            "senha" => md5($value['senha']),
            "nivel" => $value['slnivel']
        ];

        $this->db->trans_begin();
        if ($value['id_users'] == true && $value['id_users'] !== '') {
            $id_users = $value['id_users'];
            $this->db->where('id_users', $id_users);
            $this->db->update('tbl_users', $dados);
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                $retorno = 0;
            } else {
                $this->db->trans_commit();
                $retorno = 2;
            }
        } else {
            $this->db->insert('tbl_users', $dados);

            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                $retorno = 0;
            } else {
                $this->db->trans_commit();
                $retorno = 1;
            }
        }

        return $retorno;
    }

    ////////////////////////////////////////
    // CADASTRO DE PROJETO                   
    // CRIADO POR MARCIO SILVA            
    // DATA: 08/02/2023                   
    ////////////////////////////////////////   
    public function cadastrarProjeto($dados)
    {
        $this->db->trans_begin();
        if (($this->input->post('edit_id_projeto')) !== '') {
            $this->db->where('id_projeto', $this->input->post('edit_id_projeto'));
            $this->db->update('tbl_projetos', $dados);
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                $retorno[] = ['cod' => 0, 'msg' => 'Não Foi Possível Cadastrar o Projeto.'];
            } else {
                $this->db->trans_commit();
                $retorno[] = ['cod' => 1, 'msg' => 'O Projeto Foi Cadastrado.'];
            }
        } else {
            $this->db->insert('tbl_projetos', $dados);
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                $retorno[] = ['cod' => 0, 'msg' => 'Não Foi Possível Cadastrar o Projeto.'];
            } else {
                $this->db->trans_commit();
                $retorno[] = ['cod' => 1, 'msg' => 'O Projeto Foi Cadastrado.'];
            }
        }
        return $retorno;
    }


    ////////////////////////////////////////
    // CADASTRO DE ETAPAS                 
    // CRIADO POR MARCIO SILVA            
    // DATA: 08/02/2023                   
    ////////////////////////////////////////   
    public function cadastrarEtapa($dados)
    {
        //var_dump($dados);
        //exit();

        $this->db->trans_begin();
        if (($this->input->post('edit_id_etapa')) !== '') {
            $this->db->where('id_etapa', $this->input->post('edit_id_etapa'));
            $this->db->update('tbl_etapas', $dados);
            array_push($dados,  $this->input->post('edit_id_etapa'), date('d/m/Y'), implode('/', array_reverse(explode('-', $dados['dtentrega']))));
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                $retorno[] = ['cod' => 0, 'msg' => 'Não Foi Possível Cadastrar a etapa.'];
            } else {
                $this->db->trans_commit();
                $retorno[] = ['cod' => 1, 'msg' => 'Etapa alterada com sucesso.', 'dados' => $dados];
            }
        } else {
            $this->db->insert('tbl_etapas', $dados);
            array_push($dados,  $this->db->insert_id(), date('d/m/Y'), implode('/', array_reverse(explode('-', $dados['dtentrega']))), $dados['anexo']);
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                $retorno[] = ['cod' => 0, 'msg' => 'Não Foi Possível Cadastrar a etapa.'];
            } else {
                $this->db->trans_commit();

                $retorno[] = ['cod' => 1, 'msg' => 'Etapa cadastrada com sucesso.', 'dados' => $dados];
            }
        }
        return $retorno;
    }

    ////////////////////////////////////////
    // CADASTRO DE ATIVIDADES               
    // CRIADO POR MARCIO SILVA            
    // DATA: 08/02/2023                   
    ////////////////////////////////////////   
    public function cadastrarAtiv($nomeImg)
    {
        // echo '<pre>';
        // print_r($this->input->post());
        // echo '</pre>';
        // exit;

        // $this->db->where('id_etapa', $this->input->post('id_ativEtapa'));
        // $ret = $this->db->get('tbl_etapas');

        // if ($this->input->post('edit_id_Ativ') !== '') {
        //     $dados = [
        //         'atividade' => $this->input->post('Ativ'),
        //         'data_fim' => $this->input->post('dtentregaAtiv'),
        //         'descricao' => $this->input->post('descricaoAtiv'),
        //         'responsavel' => $this->input->post('slrespAtiv'),
        //         'situacao' => ''
        //     ];
        // } else {
            $dados = [
                'usucria' => $_SESSION['id_users'],
                // 'id_etapa' => $this->input->post('id_ativEtapa'),
                'id_projeto' => $this->input->post('id_ativProjeto'),
                'id_departamento' => $this->input->post('id_ativDepto'),
                'atividade' => $this->input->post('Ativ'),
                'data_fim' => $this->input->post('dtentregaAtiv'),
                'descricao' => $this->input->post('descricaoAtiv'),
                'anexo' => $nomeImg,
                'responsavel' => $this->input->post('slrespAtiv'),
                'situacao' => 'A'
            ];
        // }

        $data = [
            'id_etapa' => $this->input->post('id_ativEtapa'),
            'id_projeto' => $this->input->post('id_ativProjeto'),
            'id_departamento' => $this->input->post('id_ativDepto'),
        ];

        // echo '<pre>';
        // print_r($dados);
        // echo '</pre>';
        // exit();

        $this->db->trans_begin();
        // if (($this->input->post('edit_id_Ativ')) !== '') {
        //     $this->db->where('id_atividade', $this->input->post('edit_id_Ativ'));
        //     $this->db->update('tbl_atividades', $dados);
        //     if ($this->db->trans_status() === false) {
        //         $this->db->trans_rollback();
        //         $retorno[] = ['cod' => 0, 'msg' => 'Não Foi Possível Cadastrar a etapa.'];
        //     } else {
        //         $this->db->trans_commit();
        //         $retorno[] = ['cod' => 1, 'msg' => 'Atividade alterada com sucesso.', 'data' => $data];
        //     }
        // } else {
            $this->db->insert('tbl_atividades', $dados);
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                $retorno[] = ['cod' => 0, 'msg' => 'Não Foi Possível Cadastrar a atividade.'];
            } else {
                $this->db->select("id_atividade");
                $this->db->order_by("id_atividade", "desc");
                $this->db->limit(1);
                $return = $this->db->get("tbl_atividades");
                $return = $return->result();

                // echo '<pre>';
                // print_r($return->result());
                // echo '</pre>';
                // exit;

                $this->db->trans_commit();
                $retorno[] = ['cod' => 1, 'msg' => 'Atividade cadastrada com sucesso.', 'data' => $data, 'ultimo_id' => $return];
            } 
        // }
        return $retorno;
    }





    ////////////////////////////////////////
    // CADASTRAR DEPARTAMENTO                     
    // CRIADO POR MARCIO SILVA            
    // DATA: 08/02/2023                   
    ////////////////////////////////////////   
    public function cadastrarDepartamento($value)
    {
        $dados = [
            "cod_departamento" => $value['cod_departamento'],
            "descricao" => $value['descricao'],
        ];

        $this->db->trans_begin();
        $this->db->insert('tbl_departamentos', $dados);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $retorno = 0;
        } else {
            $this->db->trans_commit();
            $retorno = 1;
        }

        return $retorno;
    }






    /////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////





    ////////////////////////////////////////
    // CADASTRO DE TAREFAS                  
    // CRIADO POR MARCIO SILVA            
    // DATA: 31/05/2019                   
    ////////////////////////////////////////   
    public function cadTarefa($tbl_tarefas)
    {
        if ($this->input->post('id_tarefa') == TRUE) {
            $retorno = 2;
        } else {
            $this->db->trans_begin();
            $this->db->insert('tbl_tarefas', $tbl_tarefas);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $retorno = 1;
            } else {
                $this->db->trans_commit();
                $retorno = 1;
            }
        }
        return $retorno;
    }

    ////////////////////////////////////////
    // CADASTRO STATUS TAREFAS                  
    // CRIADO POR MARCIO SILVA            
    // DATA: 31/05/2019                   
    ////////////////////////////////////////   
    public function statusTarefa($status)
    {
        if ($this->input->post('id_tarefa') == TRUE) {
            $retorno = 2;
        } else {
            $this->db->trans_begin();
            $this->db->insert('tbl_status_tarefas', $status);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $retorno = 1;
            } else {
                $this->db->trans_commit();
                $retorno = 1;
            }
        }
        return $retorno;
    }
}
