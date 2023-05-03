
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_retorno extends CI_Model
{
    ////////////////////////////////////////
    // RETORNO DE DE USUARIOS             //
    // CRIADO POR MARCIO SILVA            //
    // DATA: 31/05/2019                   //
    ////////////////////////////////////////
    public function retUsuarios()
    {
        $id_users = $this->input->post('id_users');
        $value = $this->input->post('value');
        $id_departamento = $this->input->post('id_departamento');

        isset($id_departamento) == true && $id_departamento != '' ? $this->db->where('A.id_departamento', $id_departamento) : '';
        isset($id_users) == true && $id_users != '' ? $this->db->where('A.id_users', $id_users) : '';
        isset($value['usuario']) == true && $value['usuario'] != '' ? $this->db->where('A.usuario', $value['usuario']) : '';
        isset($value['registro']) == true && $value['registro'] != '' ? $this->db->where('A.registro', $value['registro']) : '';
        $this->db->where('A.status !=', 'D');
        $this->db->join("tbl_departamentos B", "A.id_departamento = B.id_departamento", "inner");
        $retorno = $this->db->get('tbl_users A');
        return $retorno;
    }

    ////////////////////////////////////////
    // RETORNO DE DEPARTAMENTOS           //
    // CRIADO POR MARCIO SILVA            //
    // DATA: 31/05/2019                   //
    ////////////////////////////////////////
    public function retDepto()
    {

        $this->db->select('*');
        $this->db->select("DATE_FORMAT(dtcria, '%d/%m/%Y') AS dtcria", FALSE);
        $this->db->where('status !=', 'D');
        $retorno = $this->db->get('tbl_departamentos');
        return $retorno;
    }

    ////////////////////////////////////////
    // RETORNO DE PROJETOS                //
    // CRIADO POR MARCIO SILVA            //
    // DATA: 10/02/2023                   //
    ////////////////////////////////////////
    public function retProjetos($id_projeto = null, $id_departamento = null)
    {
        $this->db->select('A.id_projeto id_projeto');
        $this->db->select('A.usucria id_criador');
        $this->db->select('A.responsavel id_responsavel');
        $this->db->select('A.id_departamento id_depto');
        $this->db->select('A.nome nome_projeto');
        $this->db->select('A.usucria usucria');
        $this->db->select('A.descricao descricao_projeto');
        $this->db->select('A.situacao situacao_projeto');
        $this->db->select('A.anexo anexo_projeto');
        $this->db->where('A.status !=', 'D');
        $this->db->select('C.nome responsavel');
        $this->db->select('D.nome criador');
        $this->db->select("DATE_FORMAT(A.data_fim, '%d/%m/%Y') AS datafim", FALSE);
        $this->db->select("DATE_FORMAT(A.dtcria, '%d/%m/%Y') AS datacria", FALSE);
        $this->db->select("DATE_FORMAT(A.dtentrega, '%d/%m/%Y') AS dtentrega", FALSE);
        isset($id_departamento) == true && $id_departamento != '' ? $this->db->where('A.id_departamento', $id_departamento) : '';
        isset($id_projeto) == true && $id_projeto != '' ? $this->db->where('A.id_projeto', $id_projeto) : '';
        $this->db->join("tbl_departamentos B", "A.id_departamento = B.id_departamento", "inner");
        $this->db->join("tbl_users C", "C.id_users = A.responsavel", "inner");
        $this->db->join("tbl_users D", "D.id_users = A.usucria", "inner");
        $ret = $this->db->get('tbl_projetos A');
        $retorno = [];
        foreach ($ret->result() as $linha) {
            $retorno[] = array(
                "id_projeto" => $linha->id_projeto,
                "id_criador" => $linha->usucria,
                "id_responsavel" => $linha->id_responsavel,
                "nome_projeto" => $linha->nome_projeto,
                "id_depto" => $linha->id_depto,
                "datacria" => $linha->datacria,
                "datafim" => $linha->datafim,
                "dtentrega" => $linha->dtentrega,
                "descricao_projeto" => $linha->descricao_projeto,
                "situacao_projeto" => $linha->situacao_projeto,
                "anexo_projeto" => $linha->anexo_projeto,
                "responsavel" => $linha->responsavel,
                "criador" => $linha->criador
            );
        }
        return $retorno;
    }

    ////////////////////////////////////////
    // RETORNO DE TAREFAS                 //
    // CRIADO POR MARCIO SILVA            //
    // DATA: 31/05/2019                   //
    ////////////////////////////////////////
    public function retEtapas($id_projeto = null, $id_etapa = null)
    {
        $this->db->select('*');
        $this->db->select("DATE_FORMAT(A.dtcria, '%d/%m/%Y') AS data_criacao_etapa", FALSE);
        $this->db->select("DATE_FORMAT(A.dtentrega, '%d/%m/%Y') AS data_entrega_etapa", FALSE);
        isset($id_etapa) == true && $id_etapa != '' ? $this->db->where('A.id_etapa', $id_etapa) : '';
        isset($id_projeto) == true && $id_projeto != '' ? $this->db->where('A.id_projeto', $id_projeto) : '';
        $this->db->where('A.status !=', 'D');
        $retorno = $this->db->get('tbl_etapas A');
        return $retorno;
    }

    ////////////////////////////////////////
    // RETORNO DE ATIVIDADES              //
    // CRIADO POR MARCIO SILVA            //
    // DATA: 31/05/2019                   //
    ////////////////////////////////////////
    public function retAtividades($id_atividade = null, $projeto = null )
    {
        isset($projeto) == true && $projeto !== '' ? $this->db->where('C.id_projeto', $projeto) : '';
        $this->db->select('A.id_atividade as id_atividade');
        $this->db->select('A.atividade as atividade');
        $this->db->select('A.anexo as anexo_atividade');
        $this->db->select('A.descricao as descricao');
        $this->db->select('A.situacao as situacao');
        $this->db->select('E.nome as responsavel');
        $this->db->select('E.id_users as id_responsavel');
        $this->db->select('A.data_fim as dtentregaAtiv');
        $this->db->select("DATE_FORMAT(A.dtcria, '%d/%m/%Y') AS data_criacao", FALSE);
        $this->db->select("DATE_FORMAT(A.data_fim, '%d/%m/%Y') AS data_finalizacao", FALSE);
        $this->db->where('A.status !=', 'D');
        $this->db->join("tbl_users E", "E.id_users = A.responsavel", "inner");
        $this->db->join("tbl_projetos C", "A.id_projeto = C.id_projeto", "inner");
        $retorno = $this->db->get('tbl_atividades A');
        return $retorno;
    }

    ////////////////////////////////////////
    // RETORNO CADASTRO GERAL             //
    // CRIADO POR MARCIO SILVA            //
    // DATA: 31/05/2019                   //
    ////////////////////////////////////////
    public function retCadGEral()
    {

        $this->db->select('*');
        $this->db->select("DATE_FORMAT(dtcria, '%d/%m/%Y') AS dtcria", FALSE);
        $this->db->where('status !=', 'D');
        $retorno = $this->db->get('tbl_departamentos');

        foreach ($retorno->result() as $linhadep) :
            $buscaProjetos =  $this->geralProjetos($linhadep->id_departamento);
            $return[] = array(
                "id_departamento" => $linhadep->id_departamento,
                "cod_departamento" => $linhadep->cod_departamento,
                "descricao" => $linhadep->descricao,
                "cod_departamento" => $linhadep->cod_departamento,
                "projetos" =>["projetos"=>$buscaProjetos]
             );
           
        endforeach;
        return $return;
    }

    public function geralProjetos($id_departamento = null)
    {
        isset($id_departamento) == true && $id_departamento !== '' ? $this->db->where('id_departamento', $id_departamento) : '';                
        $this->db->where('status !=', 'D');
       
        $retorno =  $this->db->get('tbl_projetos');
        foreach ($retorno->result() as $linha) :
        $buscaAtividades =  $this->retAtividades('',$linha->id_projeto);
        $return[] = array(
            "id_projeto" => $linha->id_projeto,
            "nome_projeto" => $linha->nome,
            "descricao_projeto" => $linha->descricao,
            "atividades" => $buscaAtividades->result()
         );   
        endforeach;
        return $return;
    }   























    //////////////////////////////////////////////////
    // RETORNO DE DADOS DOS PROJETOS PARA ALTERAÇÃO //
    // CRIADO POR MARCIO SILVA                      //
    // DATA: 10/02/2023                             //
    //////////////////////////////////////////////////
    public function retDadosProjetos($id_projeto)
    {
        // var_dump($id_projeto);
        // exit;

        // $this->db->select('*');

        $this->db->order_by("dtcria", "desc");
        $this->db->where('id_projeto', $id_projeto);
        $retorno = $this->db->get('tbl_projetos');
        return $retorno;
    }

    ///////////////////////////////////////////////////
    // RETORNO DO CAMINHO DO DOCUMENTO JÁ REGISTRADO //
    // CRIADO POR MARCIO SILVA                       //
    // DATA: 10/02/2023                              //
    ///////////////////////////////////////////////////
    public function retAntigoAnexo($id_projeto)
    {
        // var_dump($id_projeto);
        // exit;

        // $this->db->select('*');
        $this->db->where('id_projeto', $id_projeto);
        $retorno = $this->db->get('tbl_projetos');
        return $retorno;
    }

    ////////////////////////////////////////
    // RETORNO DE TAREFAS                 //
    // CRIADO POR MARCIO SILVA            //
    // DATA: 31/05/2019                   //
    ////////////////////////////////////////
    public function retTarefas($id_projeto)
    {
        $id_tarefa = $this->input->post('id_tarefa');
        $id_situacao = $this->input->post('id_situacao');
        $this->db->select('A.situacao as situacao');
        $this->db->select('A.id_tarefa as id_tarefa');
        $this->db->select('A.id_projeto as id_projeto');
        $this->db->select('A.tarefa as nome_tarefa');
        $this->db->select('A.descricao as descricao_tarefa');
        $this->db->select("DATE_FORMAT(A.dtcria, '%d/%m/%Y') AS data_criacao", FALSE);
        $this->db->select('C.nome as responsavel');
        $this->db->select('A.anexo as anexo');
        $this->db->select('A.prioridade as prioridade');
        $this->db->select('B.descricao as descricao_projeto');
        $this->db->select('B.nome as nome_projeto');
        $this->db->select('D.descricao as nome_dep');
        $this->db->join("tbl_projetos B", "A.id_projeto = B.id_projeto", "inner");
        $this->db->join("tbl_users C", "A.id_usuario = C.id_users", "inner");
        $this->db->join("tbl_departamentos D", "A.id_departamento = D.id_departamento", "inner");
        isset($id_tarefa) == true && $id_tarefa != '' ? $this->db->where('A.id_tarefa', $id_tarefa) : '';
        isset($id_projeto) == true && $id_projeto != '' ? $this->db->where('A.id_projeto', $id_projeto) : '';
        isset($id_situacao) == true && $id_situacao != '' ? $this->db->where('A.id_tarefa', $id_situacao) : '';
        $this->db->where('A.status !=', 'D');
        $retorno = $this->db->get('tbl_tarefas A');
        return $retorno;
    }

    ////////////////////////////////////////
    // RETORNO DE LOG DE TAREFAS          //
    // CRIADO POR MARCIO SILVA            //
    // DATA: 31/05/2019                   //
    ////////////////////////////////////////
    public function retLogTarefas()
    {
        $id_tarefa = $this->input->post('id_tarefa');
        $this->db->select('A.status as situacao');
        $this->db->select('A.id_movimento as id_movimento');
        $this->db->select('A.descricao as descricao');
        $this->db->select("DATE_FORMAT(A.dtcria, '%d/%m/%Y') AS data_criacao", FALSE);
        $this->db->select("DATE_FORMAT(A.dtcria, '%H:%i') AS hora_criacao", FALSE);
        isset($id_tarefa) == true && $id_tarefa != '' ? $this->db->where('A.id_tarefa', $id_tarefa) : '';
        $retorno = $this->db->get('tbl_status_tarefas A');
        return $retorno;
    }

    ///////////////////////////////////////////
    // CHECA SE FK FOI USADA EM OUTRA TABELA //
    // CRIADO POR MARCIO SILVA               //
    // DATA: 15/02/2023                      //
    ///////////////////////////////////////////
    public function check_fk($tabela, $campo, $valor)
    {
        $this->db->select("count(*) as count");
        $this->db->where("$campo = $valor");
        $count = $this->db->get("$tabela");

        $count = $count->result()[0]->count;
        return $count;
    }
}
