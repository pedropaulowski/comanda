<?php
session_start();
require 'config.php';
if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) ){
		echo "SEU ID: ".$_SESSION['id_user'];}
		else {
			header("Location: login.php");
		}
header("Refresh: 5; url = cozinheiro.php");
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="bootstrap.min.css"/>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
</head>
<div class="container">
	
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>Pedidos</th>
				<th>Mesa</th>
				<th>Hora</th>
				<th>OBS</th>
			</tr>
		</thead>
		<tbody>
			<?php
		 	$sql = "SELECT * FROM pedidos ORDER BY hora DESC LIMIT 10";
		 	$sql = $pdo->query($sql);
		 	if ($sql->rowCount()>0){
		 		foreach ($sql->fetchAll() as $pedido) {
		 			echo '<tr>';
		 			echo '<td>'.$pedido['pedidos'].'</td>';
		 			echo '<td>'.$pedido['mesa'].'</td>';
		 			echo '<td>'.$pedido['hora'].'</td>';
		 			echo '<td><b>'.$pedido['obs'].'</b></td>';
		 			echo '</tr>';
		 		}
		 	}

			?>
		</tbody>
	</table>
	<a href="sair.php">Sair</a><br/>
</div>