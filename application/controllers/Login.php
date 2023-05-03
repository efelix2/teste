<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        /////////////////////////////////////////////////
        //// TELA DE LOGIN
        /////////////////////////////////////////////////
        $retorno['msg'] = null; 
        $this->load->view('includes/header');
        $this->load->view('v_login', $retorno);
        $this->load->view('includes/footer');
        /////////////////////////////////////////////////
    }

    public function logar() {
        $this->load->model('m_login');
        $ret_login = $this->m_login->logar();
        if ($ret_login == 1) {
           ?>
           <script>
          window.location.href = "https://gtxsoftware.com.br/projetos/desenv/projetos/";
          </script>
           <?php
        }  else {
            $retorno['msg'] = '<div class="alert btn-google-plus text-center" role="alert"> Usuário ou senha inválida!<br>Tente novamente!</div>';
            $this->load->view('includes/header');
            $this->load->view('v_login', $retorno);
            $this->load->view('includes/footer');
        }
    }
    
    ////////////////////////////////////////
    //FUNÇÃO: DESLOGAR DO SISTEMA
    //DATA DE CRIAÇÃO: 10/07/2019
    //CRADA POR: MARCIO SILVA
    ////////////////////////////////////////
    public function sair() {
        //$this->session->sess_destroy();
        session_unset();
        ?>
        <script>
          window.location.href = "https://gtxsoftware.com.br/projetos/desenv/";
          </script>
          <?php
    }

}
