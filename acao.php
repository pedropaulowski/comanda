<?php
session_start();
require 'config.php';

//preciso fazer essa ação
if(isset($_GET['mesa']) ){
	$mesa = addslashes($_GET['mesa']);
	$pedidos = $_GET['produto[]'];
	$id_user = $_SESSION['id_user'];

	$sql = $pdo->prepare("INSERT INTO pedidos SET pedidos = :pedidos, mesa = :mesa, hora = NOW(), id_user = :id_user");
	$sql->bindValue(":pedidos", $pedidos);
	$sql->bindValue(":mesa", $mesa);
	$sql->bindValue(":id_user", $id_user);
	$sql->execute();

	header("Location:garcom.php");
	
}

	header("Location:garcom.php");


?>