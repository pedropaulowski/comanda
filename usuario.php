<?php 
session_start();
require 'config.php';
?>
O que você é?
<h1><?php if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) ){
	echo $_SESSION['id_user'];}
	else {
		header("Location: login.php");
	}?></h1>
<a href="garcom.php">Garçom</a>
<a href="cozinheiro.php">Cozinheiro</a> <br/><br/><br/><br/>
<a href="adicionar-produto">Adicionar novo produto</a>
<a href="sair.php">Sair</a>