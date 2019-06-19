<?php
session_start();
require 'config.php';

if(empty($_SESSION['id_user'])) {
	$id = $_SESSION['id_user'];

	header("Location:login.php");
}
?>
<head>
</head>
<form method="POST">
	Qual mesa fez o pedido?<br/>
	<input type="number" name="mesa"/><br/><br/>
	Alguma observação?<br/>
	<input type="text" name="obs"><br/>
	<input type="submit" value="Encaminhar"/>
</form>
<a href="garcom.php">Fazer novo pedido</a>
<?php
if(isset($_GET['h']) && !empty($_POST['mesa'])) {
	
	$h = $_GET['h'];
	
	$sql = "SELECT * FROM produtos WHERE id_produto = :h";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":h", $h);
	$sql->execute();

	if($sql->rowCount() > 0){

		$sql = $sql->fetch();
		$nome = $sql['nome'];			
		$id_user = $_SESSION['id_user'];
		$mesa = addslashes($_POST['mesa']);
		$obs = addslashes($_POST['obs']);

		$sql = "INSERT INTO pedidos SET pedidos = :pedidos, mesa = :mesa, hora = NOW(), id_user = :id_user, obs = :obs";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":pedidos", $nome);
		$sql->bindValue(":mesa", $mesa);
		$sql->bindValue(":id_user", $id_user);
		$sql->bindValue(":obs", $obs);
		$sql->execute();
	} 
}
?>