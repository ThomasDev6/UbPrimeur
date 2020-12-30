<?php 
require_once('connect.php');
$choix = $_POST['Choix'];

$sql="UPDATE client SET hebdo = '$choix' WHERE idClient=4";
$modif = $co->query($sql);
header("Location: paiement.html");
exit;
?>
