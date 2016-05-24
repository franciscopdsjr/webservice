<?php
// Observacoes:
// Comentar a extensao php_soap
// Baixar o arquivo nusoap.php

// inclusao do arquivo de classes NuSOAP
require_once('lib/nusoap.php');

// criacao de uma instancia do servidor
$server = new soap_server;

// registro do metodo
$server->register('helloWorld');
// definicao do metodo como uma funcao do PHP
	function helloWorld($name) {
		return 'Hello World '.$name.'!';
	}

// requisicao para uso do servico
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ?
$HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

?>
