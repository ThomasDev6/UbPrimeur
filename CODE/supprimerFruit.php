<?php 
require_once('connect.php');
$id = $_GET['id'];
$sql = "DELETE FROM lignepanierfruit WHERE fruitLigneP=$id";
$co->query($sql);
header('Location: panier.php');


?>