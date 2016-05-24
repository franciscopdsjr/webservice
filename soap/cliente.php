
<!DOCTYPE html>
<html>
<head>
	<title>Webservice</title>
</head>
<body>
<form method="Post">
<input type="text" name="a">Numero 1</input>
</br>
<input type="text" name="b">Numero 2</input>
</br>
<input type="submit" name="op" value="somar"></input>
<input type="submit" name="op" value="multiplicar"></input>
<input type="submit" name="op" value="dividir"></input>
<input type="submit" name="op" value="subtrair"></input>
</form> 
</body>
</html>
<?php
// Observacoes:
// Adicionar a extensao php_soap no php.ini

// configurando o objeto executor cliente com o endereco do servidor
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$client = new SoapClient(null, array(
	'location' => 'http://127.0.0.1/Webservice/soap/server.php',  // ex.: http://localhost/soap/server.php
	'uri' => 'http://127.0.0.1/Webservice/soap/',  				// ex.: http://localhost/soap/
	'trace' => 1));

// chamada do servico SOAP
if ($_POST['op'] == "somar") {
$result = $client->somar($_POST['a'],$_POST['b']);
}
if ($_POST['op'] == "multiplicar") {
$result = $client->multiplicar($_POST['a'],$_POST['b']);
}
if ($_POST['op'] == "dividir") {
$result = $client->dividir($_POST['a'],$_POST['b']);
}
if ($_POST['op'] == "subtrair") {
$result = $client->dividir($_POST['a'],$_POST['b']);
}

// verifica erros na execucao do servico e exibe o resultado
if (is_soap_fault($result)){
	trigger_error("SOAP Fault: (faultcode: {$result->faultcode},
	faultstring: {$result->faulstring})", E_ERROR);
}else{
	echo "Resultado Encontrado: ";
	echo($result->valorRetorno);
	echo($result->mensagem);
}

}
?>
