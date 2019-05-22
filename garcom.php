
<?php
session_start();
require 'config.php';

if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) ){
	echo $_SESSION['id_user']."<br/><br/><br/>";}
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

	<form method="POST" action= "acao.php">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Produto</th>
					<th>Valor</th>
				</tr>
			</thead>
			<tbody>	
				<?php

					$sql = "SELECT * FROM produtos ORDER BY valor ASC";
					$sql = $pdo->query($sql);
					 if ($sql->rowCount()>0){
				 		foreach ($sql->fetchAll() as $produto) {
				 			echo '<tr>';
				 			echo '<td>'.$produto['nome'].'</td>'."          ";
				 			echo '<td>'.$produto['valor'].'</td>'."        ";
				 			echo '</tr>';
				 		} 
				 	}

				?>
			</tbody>
		</table><br/><br/><br/>

		Quais são os pedidos?<br/>
		<input type="text" name="pedidos" /><br/>
		<br/>
		Qual mesa fez o pedido?
		<br/>
		<input type="number" name="mesa" /><br/>
		<br/>

		<input type="submit" value="Terminar Pedido"/>

	</form>
</div>
