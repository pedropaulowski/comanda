<?php
session_start();
require 'config.php';
?>
<a href="adicionar-produto.php">Adicionar Novo Produto</a><br/>
<a href="sair.php">Sair</a>
<form method="POST">
<table border="0" width="100%">
<tr>
	<th>Produto</th>
	<th>Valor</th>
	<th>O que a mesa deseja</th>

</tr>
<?php

	$sql = "SELECT * FROM produtos ORDER BY valor ASC";
	$sql = $pdo->query($sql);
	 if ($sql->rowCount()>0){
 		foreach ($sql->fetchAll() as $produto) {
 			echo '<tr>';
 			echo '<td>'.$produto['nome'].'</td>';
 			echo '<td>'.$produto['valor'].'</td>';
 			echo '<td><input type="checkbox" name="'.$produto['nome'].'" /></a>';
 			echo '</tr>';
 		} 
 	}

?>
</table>
<br/>
<br/>
<br/>

Qual mesa fez o pedido?<br/>
<br/>
<?php
$sql = "SELECT * FROM mesas ORDER BY id_mesa ASC";
$sql = $pdo->query($sql);
	 if ($sql->rowCount()>0){
 		foreach ($sql->fetchAll() as $mesa) {			
 			echo '<input type ="checkbox" "value ="'.$mesa['num_mesa'].'">'.$mesa['num_mesa'].'<br/>';

 			}
 	}
?>
<br/>

<input type="submit" value="Terminar Pedido"/>
</form>
