<?php
session_start();
require 'config.php';


if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])){
	$id = $_SESSION['id_user'];

	$sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
	$sql->bindValue(":id", $id);
	$sql->execute();

	if($sql->rowCount() > 0){
		$info = $sql->fetch();
	} else {
		header("Location: login.php");
		exit;
	}

} else{
	header("Location: login.php");
	exit;
}
?>