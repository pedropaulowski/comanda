<?php
require 'config.php';
if(isset($_POST['nome']) && empty($_POST['nome']) == false && isset($_POST['senha']) && empty($_POST['senha']== false)){
	$nome = addslashes($_POST['nome']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = $pdo->prepare("INSERT INTO users (nome, senha) VALUES (:nome, :senha)");
	$sql->bindValue(":nome", $nome);
	$sql->bindValue(":senha",$senha);
	$sql->execute();

	header("Location: usuario.php");

}
?>
<form method="POST">
	Nome:<br/>
	<input type="text" name="nome"/><br/><br/>

	Senha:<br/>
	<input type="password" name="senha"/><br/><br/>

	<input type="submit" value="Cadastrar"/>

</form>