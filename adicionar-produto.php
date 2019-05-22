<?php
session_start();
require 'config.php';
if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) ){
	echo $_SESSION['id_user']."<br/><br/><br/>";}
	else {
		header("Location: login.php");
	}

if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['valor']) && !empty($_POST['valor'])){
	$nome = addslashes($_POST['nome']);
	$valor = addslashes($_POST['valor']);

	$sql = $pdo->prepare("INSERT INTO produtos (nome, valor) VALUES (:nome, :valor)");
	$sql->bindValue(":nome", $nome);
	$sql->bindValue(":valor", $valor);
	$sql->execute();

	header("Location:garcom.php");

}
?>
<form method="POST">
	Nome do produto:<br/>
	<input type="text" name="nome"/><br/><br/>
	Valor do produto:<br/>
	<input type="text" name="valor" pattern="[0-9.,]{1,}" /><br/><br/><br/>
	<input type="submit" value="Adicionar"/>
</form>