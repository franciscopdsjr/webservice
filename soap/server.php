<?php
require_once 'retorno.php';
// Observacoes:
// Adicionar a extensao php_soap no php.ini
//criacao de uma instancia do servidor (coloque o endereco na sua maquina local)
$server = new SoapServer(null, array('uri' => "http://127.0.0.1/Webservice/soap/"));  // ex.: http://localhost/soap/

//definicao dos métodos disponíveis para uso do servico ( vai retornar apenas a frase Hello World + parametro que receber + ! )
	  function somar($a,$b) {
		try{
			$r = new Retorno();
			$r->status = TRUE;
			$r->valorRetorno = $a+$b;
			return $r;
		}catch(Exception $e){
			$r = new Retorno();
			$r->status = FALSE;
			$r->mensagem = 'Ocorreu um erro $e';
			return $r;
		}
	  }
	  function dividir($a,$b) {
			try{
			$r = new Retorno();
			$r->status = TRUE;
			$r->valorRetorno = $a/$b;
			return $r;
		}catch(Exception $e){
			$r = new Retorno();
			$r->status = FALSE;
			$r->mensagem = 'Ocorreu um erro $e';
			return $r;
		}
	  }
	  function multiplicar($a,$b) {
			try{
			$r = new Retorno();
			$r->status = TRUE;
			$r->valorRetorno = $a*$b;
			return $r;

		}catch(Exception $e){
			$r = new Retorno();
			$r->status = FALSE;
			$r->mensagem = 'Ocorreu um erro $e';
			return $r;
		}
	  }
	  
	  function subtrair($a,$b) {
			try{
			$r = new Retorno();
			$r->status = TRUE;
			$r->valorRetorno = $a-$b;
			return $r;

		}catch(Exception $e){
			$r = new Retorno();
			$r->status = FALSE;
			$r->mensagem = 'Ocorreu um erro $e';
			return $r;
		}
	  }

//registro do servico na instania
$server->addFunction("somar");
$server->addFunction("dividir");
$server->addFunction("multiplicar");
$server->addFunction("subtrair");

// chamada do metodo para atender as requisicoes do servico
// se a chamada for um POST executa o método, caso contrario, apenas mostra a lista das funcoes disponiveis
if ($_SERVER["REQUEST_METHOD"]== "POST") {
		$server->handle();
} else {
	$functions = $server->getFunctions();
	print "Métodos disponíveis no serviço:";
	print "<hr/>";
	print " <ul>";
	foreach ($functions as $func) {
		print "<li>$func</li>";
	}
	print "</ul>";
}
?>
