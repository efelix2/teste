<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'gtxsoftware.com.br',
     'port' => 3306, 
	'username' => 'gtxso802_marcio',
	'password' => 'Dimarmore@123',
	'database' => 'gtxso802_dimarmore',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
        //'db_debug' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'Development'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
