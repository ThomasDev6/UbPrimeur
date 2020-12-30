<?php 
require_once('connect.php');
$mail = $_POST['mail'];
$idcli=2;
$sql="UPDATE mail SET mail='$mail' WHERE mail.idMail=$idcli";
$modif = $co->query($sql);
header('Location: compte.php');
?>