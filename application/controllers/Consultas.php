<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends MY_Controller {

    ////////////////////////////////////////
    // HOME PADRAO                     
    // CRIADO POR MARCIO SILVA            
    // DATA: 31/05/2019                   
    ////////////////////////////////////////    
    public function index() {
       $this->load->view('includes/header');
       $this->load->view('includes/menu_left');
       $this->load->view('includes/menu_sup');
       $this->load->view('v_desenv');
       $this->load->view('includes/footer');
    }


}
§§§