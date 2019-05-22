<?php 
session_start();
require 'config.php';
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="bootstrap.min.css"/>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
</head>
<div class="container text-center">

	<h1><?php if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) ){
		echo "SEU ID: ".$_SESSION['id_user'];}
		else {
			header("Location: login.php");
		}?></h1>
	O que você é?<br/>
	<a href="garcom.php">Garçom</a>
	<a href="cozinheiro.php">Cozinheiro</a> <br/><br/><br/><br/>
	<a href="adicionar-produto">Adicionar novo produto</a><br/>
<a href="sair.php">Sair</a>
</div>