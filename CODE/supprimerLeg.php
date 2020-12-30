<?php 
require_once('connect.php');
$id = $_GET['id'];
$sql = "DELETE FROM lignepanierleg WHERE legLigneP=$id";
$co->query($sql);
header('Location: panier.php');


?>