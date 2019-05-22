<?php
session_start();
require 'config.php';
if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) ){
	echo $_SESSION['id_user']."<br/><br/><br/>";}
	else {
		header("Location: login.php");
	}
header("Refresh: 5; url = cozinheiro.php");
?>
<a href="sair.php">Sair</a>
<table border="1" width="100%">
	<tr>
		<th>Pedidos</th>
		<th>Mesa</th>
		<th>Hora</th>
	</tr>
	<?php
 	$sql = "SELECT * FROM pedidos ORDER BY hora DESC";
 	$sql = $pdo->query($sql);
 	if ($sql->rowCount()>0){
 		foreach ($sql->fetchAll() as $pedido) {
 			echo '<tr>';
 			echo '<td>'.$pedido['pedidos'].'</td>';
 			echo '<td>'.$pedido['mesa'].'</td>';
 			echo '<td>'.$pedido['hora'].'</td>';
 			echo '</tr>';
 		}
 	}

	?>

</table>