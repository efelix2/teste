<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('formatarData')) {

    //FORMATAR DATA PADRAO AMERICANO
    function formatarData($entrada) {
        $data = date('d/m/Y', strtotime($entrada));
        return $data;
    }

}

if (!function_exists('formatarDataInvertida')) {

    //FORMATAR DATA PADRAO AMERICANO ANOMÊSDIA
    function formatarDataInvertida($entrada) {
        $data = date('Ymd', strtotime(implode('-', array_reverse(explode('/', $entrada)))));
        return $data;
    }

}

if (!function_exists('dataInvertida')) {

    //FORMATAR DATA PADRAO AMERICANO ANO-MÊS-DIA
    function dataInvertida($entrada) {
        $data = date('Y-m-d', strtotime(implode('-', array_reverse(explode('/', $entrada)))));
        return $data;
    }

}


if (!function_exists('nome_mes')) {

    function nome_mes($mes) {
        switch ($mes) {
            case "01": return "JANEIRO";
            case "02": return "FEVEREIRO";
            case "03": return "MARÇO";
            case "04": return "ABRIL";
            case "05": return "MAIO";
            case "06": return "JUNHO";
            case "07": return "JULHO";
            case "08": return "AGOSTO";
            case "09": return "SETEMBRO";
            case "10": return "OUTUBRO";
            case "11": return "NOVEMBRO";
            case "12": return "DEZEMBRO";
        }
    }

}


if (!function_exists('format_result')) {

    function format_result($retorno) {

        for ($i = 0; $i < $retorno->num_rows(); $i++) {

            foreach (get_object_vars($retorno->result()[$i]) as $attr => $value) {
                $retorno->result()[$i]->$attr = utf8_encode(trim($value));
            }
        }

        return $retorno;
    }

}

if (!function_exists('data_sql')) {

    function data_sql($data) {
        $data = explode('/', $data);
        $data = $data[2] . '-' . $data[1] . '-' . $data[0];
        return $data;
    }

}




