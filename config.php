<?php
require 'environment.php';

$config = array();

if(ENVIRONMENT == 'development'){

define("BASE_URL", "http://aulas.pc/projeto_mensagem/");
$config['dbname'] = 'projeto_mensagem_usuario';
$config['host'] = 'localhost';
$config['dbuser'] = 'root';
$config['dbpass'] = '';

}else{

define("BASE_URL", "http://meusite.com.br/");
$config['dbname'] = 'classificados';
$config['host'] = 'localhost';
$config['dbuser'] = 'root';
$config['dbpass'] = '';

}

global $db;

try{

	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}catch(PDOException $e){
	echo "ERRO: ".$e->getMessage();
	exit;
}
?>