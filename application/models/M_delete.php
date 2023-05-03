
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_delete extends CI_Model
{

    ////////////////////////////////////////
    // DELETAR USUARIO          
    // CRIADO POR MARCIO SILVA          
    // DATA: 10/02/2023                  
    ////////////////////////////////////////
    public function del_usuarios($id_users)
    {

        $this->db->where('id_users', $id_users);

        $this->db->trans_begin();

        $tbl_users = array('status' => 'D');
        $this->db->update('tbl_users', $tbl_users);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $retorno = 0;
        } else {
            $this->db->trans_commit();
            $retorno = 1;
        }

        return $retorno;
    }

    ////////////////////////////////////////
    // DELETAR PROJETO          
    // CRIADO POR MARCIO SILVA          
    // DATA: 10/02/2023                  
    ////////////////////////////////////////
    public function del_projeto($id_projeto)
    {
        $this->db->trans_begin();

        $tbl_users = array('status' => 'D');

        $this->db->where('id_projeto', $id_projeto);
        $this->db->update('tbl_projetos', $tbl_users);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $retorno = ['cod' => 0, 'msg' => 'Não Foi Possível Apagar o Projeto.'];
        } else {
            $this->db->trans_commit();
            $retorno = ['cod' => 1, 'msg' => 'O Projeto Foi Apagado.'];
        }

        return $retorno;
    }

    ////////////////////////////////////////
    // DELETAR PROJETO          
    // CRIADO POR MARCIO SILVA          
    // DATA: 10/02/2023                  
    ////////////////////////////////////////
    public function del_etapa($id_etapa)
    {
        $this->db->trans_begin();

        $tbl_etapas = array('status' => 'D');

        $this->db->where('id_etapa', $id_etapa);
        $this->db->update('tbl_etapas', $tbl_etapas);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $retorno = ['cod' => 0, 'msg' => 'Não Foi Possível Apagar a etapa.'];
        } else {
            $this->db->trans_commit();
            $retorno = ['cod' => 1, 'msg' => 'Ação efetuada com sucesso.'];
        }

        return $retorno;
    }
}
