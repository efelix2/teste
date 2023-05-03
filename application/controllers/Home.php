<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    ////////////////////////////////////////
    // HOME PADRAO                     
    // CRIADO POR MARCIO SILVA            
    // DATA: 31/05/2019                   
    ////////////////////////////////////////    
    public function index() {
       //$retorno['into_top'] = $this->load->view('includes/into/into_top', '', TRUE);
       $this->load->view('includes/header');
       //$this->load->view('includes/menu_left');
       $this->load->view('includes/menu_sup');
       $this->load->view('v_home');
       $this->load->view('includes/footer');
    }

    public function retCadastro() {
        $this->load->model('local/M_funcoes');
        $retorno = $this->M_funcoes->retCadastro();
        echo json_encode($retorno->result());
    }

}
