<?php
session_start();
require 'config.php';

//preciso fazer essa ação
if(isset($_POST['mesa']) ){
	$mesa = addslashes($_POST['mesa']);
	$pedidos = addslashes($_POST['pedidos']);
	

	$sql = $pdo->prepare("INSERT INTO pedidos SET pedidos = :pedidos, mesa = :mesa, hora = NOW()");
	$sql->bindValue(":pedidos", $pedidos);
	$sql->bindValue(":mesa", $mesa);

	$sql->execute();

	header("Location:garcom.php");
	
}


?>
