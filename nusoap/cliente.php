<?php
// Observacoes:
// Comentar a extensao php_soap
// Baixar o arquivo nusoap.php

// inclusao do arquivo de classes NuSOAP
require_once('lib/nusoap.php');

// criacao de uma instancia do cliente
$client = new soapclient('http://127.0.0.1:8081/webservice01/nusoap/server.php'); // ex.: http://localhost/nusoap/server.php

// chamada do m�todo SOAP
$result = $client->call('helloWorld',array('Tormen'));
// exibe o resultado
print_r($result);

// OPCIONAL : exibe a requisicao e a resposta

/*
echo '<h2>Requisicao</h2>';
echo '<pre>'.htmlspecialchars($client->request).'</pre>';
echo '<h2>Resposta</h2>';
echo '<pre>'.htmlspecialchars($client->response).'</pre>';
// Exibe mensagens para debug
echo '<h2>Debug</h2>';
echo '<pre>'.htmlspecialchars($client->debug_str).'</pre>';
*/
?>
