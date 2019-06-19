<?php
session_start();
require 'config.php';

if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) ){
	echo $_SESSION['id_user']."<br/><br/><br/>";
	}
	else {
		header("Location: login.php");
	}
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="bootstrap.min.css"/>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
</head>
<div class="container">
	<a href="adicionar-produto.php">Adicionar Novo Produto</a><br/>
	<a href="sair.php">Sair</a>

		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Produto</th>
					<th>Valor</th>
					<th>Marcar</th>					
				</tr>
			</thead>
			<tbody>	
				<?php

					$sql = "SELECT * FROM produtos";
					$sql = $pdo->query($sql);
					 if ($sql->rowCount()>0){
				 		foreach ($sql->fetchAll() as $produto):
				 			?>
				 			<tr>
				 				<td><?php echo $produto['nome']; ?></td>
				 				<td><?php echo $produto['valor']; ?></td>
				 				<td><a href="add-pedido.php?h=<?php echo $produto['id_produto'];?>">Encaminhar</a></td>
				 			</tr>
				 		<?php endforeach; }?>
			</tbody>
		</table><br/><br/><br/>
</div>