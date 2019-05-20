<?php
session_start();
require 'config.php';
if (isset($_POST['nome']) && !empty($_POST['nome'])) {
	$nome = addslashes($_POST['nome']);
	$senha = addslashes($_POST['senha']);

	$sql = $pdo->prepare("SELECT * FROM users WHERE nome = :nome AND senha=:senha");
	$sql->bindValue(":nome", $nome);
	$sql->bindValue(":senha", md5($senha));
	$sql->execute();

	if($sql->rowCount()>0){
		//fazendo a sessão
		$sql = $sql->fetch();

		$_SESSION['comanda']=$sql['id_user'];

		header("Location:usuario.php");

		exit;

	} else{
		header("Location:cadastro.php");
	}

}
?>
<form method="POST">
	Usuário:<br/>
	<input type="text" name="nome"/><br/><br/>

	Senha:<br/>
	<input type="password" name="senha"/><br/><br/>

	<input type="submit" value="Entrar"/><br/>
	Caso a conta não<br/>
	exista, você redirecionado<br/>
	para tela de cadastro.

</form>