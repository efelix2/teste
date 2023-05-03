<?php

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $logado = $this->session->userdata("logado");

        if ($logado != 1) {
          ?>
          <script>
          window.location.href = "https://gtxsoftware.com.br/projetos/desenv/login/";
          </script>
 
          <?php
          
        }
        

    }

}
