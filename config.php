<?php
try{
	$pdo = new PDO("mysql:dbname=restaurante;host=localhost","root","");

} catch (PDOExcetion $e){
	echo "ERRO: ".$e->getMessage();
	exit;
}
?>