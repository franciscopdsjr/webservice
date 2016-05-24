<?php
// Observacoes:
// Comentar a extensao php_soap
// Baixar o arquivo nusoap.php

// inclusao do arquivo de classes NuSOAP
require_once('lib/nusoap.php');

// criacao de uma instancia do servidor
$server = new soap_server;

// inicializa o suporte a WSDL
$server->configureWSDL('server.helloWorld','urn:server.helloWorld');
$server->wsdl->schemaTargetNamespace = 'urn:server.helloWorld';

// registra o metodo a ser oferecido
$server->register('helloWorld', //nome do metodo
array('name' => 'xsd:string'), //parametros de entrada
array('return' => 'xsd:string'), //parametros de saida
'urn:server.helloWorld', //namespace
'urn:server.helloWorld#helloWorld', //soapaction
'rpc', //style
'encoded', //use
'Retorna o nome' //documentacao do servico
);

	function helloWorld($name) {
		return 'Hello World '.$name.'!';
	}


// requisicao para uso do servico
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
