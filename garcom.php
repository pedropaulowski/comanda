
<?php
session_start();
require 'config.php';

if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user']) ){
	echo $_SESSION['id_user']."<br/><br/><br/>";}
	else {
		header("Location: login.php");
	}
?>
<a href="adicionar-produto.php">Adicionar Novo Produto</a><br/>
<a href="sair.php">Sair</a>

<form method="POST" action= "acao.php">
<table border="0" width="100%">
<tr>
	<td>Produto</td>
	<td>Valor</td>
</tr>
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
</table>
<br/>
<br/><br/>
Quais são os pedidos?<br/>
<input type="text" name="pedidos" /><br/>
<br/>
Qual mesa fez o pedido?
<br/>
<input type="number" name="mesa" /><br/>
<br/>

<input type="submit" value="Terminar Pedido"/>

</form>
