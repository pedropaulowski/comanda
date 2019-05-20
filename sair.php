<?php
session_start();

unset($_SESSION['comanda']);
header("Location: login.php");
exit;
?>