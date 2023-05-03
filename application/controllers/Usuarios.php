<?php

defined('BASEPATH') or exit('No direct script access allowed');

class usuarios extends MY_Controller
{

    ////////////////////////////////////////
    // HOME PADRAO                     
    // CRIADO POR MARCIO SILVA            
    // DATA: 31/05/2019                   
    ////////////////////////////////////////  
    public function index()
    {
        $this->load->model('M_retorno');
        $retorno['depto'] = $this->M_retorno->retDepto();
        $this->load->view('includes/header');
        $this->load->view('includes/menu_sup');
        $this->load->view('v_usuarios',$retorno);
        $this->load->view('includes/footer');
    }

    ////////////////////////////////////////
    // RETORNO DE DIREITOS DE ACESSOS     //       
    // CRIADO POR MARCIO SILVA            //
    // DATA: 31/05/2019                   //
    ////////////////////////////////////////   
    public function retDireitosAcesso()
    {
        $this->load->model('admin/M_direitosAcesso');
        $retorno = $this->M_direitosAcesso->retDireitosAcesso();
        echo json_encode($retorno->result());
    }

    ////////////////////////////////////////
    // CADASTRO DE DIREITOS DE ACESSO     //                
    // CRIADO POR MARCIO SILVA            //
    // DATA: 31/05/2019                   //
    ////////////////////////////////////////   
    public function cadUsuarios()
    {
        $this->form_validation->set_rules('nome', 'Nome do funcionário', 'required');
        $this->form_validation->set_rules('sldepto', 'Departamento', 'required');
        isset($id_users) == true && $id_users != '' ?  $this->form_validation->set_rules('usuario', 'Email', 'required|is_unique[tbl_users.usuario]') : '';
        isset($id_users) == true && $id_users != '' ?  $this->form_validation->set_rules('senha', 'Senha', 'required') : '';
        isset($id_users) == true && $id_users != '' ?   $this->form_validation->set_rules('rsenha', 'Confirmação de Senha', 'required|matches[senha]') : '';
        $this->form_validation->set_rules('slnivel', 'Nível de acesso', 'required');

        if ($this->form_validation->run() == FALSE) {
            $return[] = array(
                'ret' => 3,
                'msg' => validation_errors()
            );
        } else {

            $value = $this->input->post();
            $retorno = $this->M_insert->cadUsuarios($value);

            if ($retorno == 1) {
                $return[] = array(
                    'ret' => 1,
                    'msg' => 'Usuário cadastrado com sucesso!'
                );
            } else if ($retorno == 2) {
                $return[] = array(
                    'ret' => 2,
                    'msg' => 'Usuário alterado com sucesso!'
                );
            } else if ($retorno == 4) {
                $return[] = array(
                    'ret' => 3,
                    'msg' => 'Já existe um e-mail cadastrado, verifique!'
                );
            } else {
                $return[] = array(
                    'ret' => 2,
                    'msg' => 'Usuário alterado com sucesso!'
                );
            }
        }
        echo json_encode($return);
    }

    ////////////////////////////////////////
    // DELETAR CONGREGAÇÕES                     
    // CRIADO POR MARCIO SILVA            
    // DATA: 31/05/2019                   
    //////////////////////////////////////// 
    public function delDireitosAcessos()
    {
        $this->load->model('admin/M_direitosAcesso');
        $retorno = $this->M_direitosAcesso->delDireitosAcessos();
        echo $retorno;
    }

    ////////////////////////////////////////
    // RETORNA FUNCIONARIO                     
    // CRIADO POR MARCIO SILVA            
    // DATA: 08/02/2023                   
    ////////////////////////////////////////
    public function retUsuarios(){
        $id_users = $this->input->post('id_users');
        $this->load->model('M_retorno');
        $retorno = $this->M_retorno->retUsuarios($id_users);
        echo json_encode($retorno->result());   
    }
    
    ////////////////////////////////////////
    // DELETAR USUARIO                     
    // CRIADO POR MARCIO SILVA            
    // DATA: 09/02/2023                   
    ////////////////////////////////////////
    public function del_usuarios()
    {
            $id_users = $this->input->post('id_users');
            $this->load->model('M_delete');
            $returno = $this->M_delete->del_usuarios($id_users);
         
            if ($returno == 1) {
                $return[] = array(
                    'ret' => 1,
                    'msg' => 'Usuário deletado com sucesso!'
                );
            } else {
                $return[] = array(
                    'ret' => 0,
                    'msg' => 'Não foi possível deletar o Usuário!'
                );
            }
     
        echo json_encode($return);
    }
}
