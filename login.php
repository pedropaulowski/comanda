<?php
session_start();
require 'config.php';

if(isset($_SESSION['id_user'])){
	$id = $_SESSION['id_user'];

	header("Location:usuario.php");

	exit;
}

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
	$nome = addslashes($_POST['nome']);
	$senha = addslashes($_POST['senha']);

	$sql = $pdo->prepare("SELECT * FROM users WHERE nome = :nome");
	$sql->bindValue(":nome", $nome);
	$sql->execute();

	if($sql->rowCount()>0){
		//fazendo a sessão
		$sql = $pdo->prepare("SELECT * FROM users WHERE nome = :nome AND senha=:senha");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0){
		$sql = $sql->fetch();

		$_SESSION['id_user']=$sql['id_user'];

		header("Location:usuario.php");

		exit;
		} else {
			echo "Senha incorreta!<br/>";
		}

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