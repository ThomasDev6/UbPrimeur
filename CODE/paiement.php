<?php 
require_once('connect.php');

session_start();

	if($_SESSION['idCli'] != 0){
		
        $idclient = $_SESSION['idCli'];
        $choix = $_SESSION['choixP'];
        
	}else{
		header("Location: index.html");
		exit;
    }
    
$sql="UPDATE client SET hebdo = '$choix' WHERE idClient='$idclient'";
$modif = $co->query($sql);

header("Location: compte.php");
exit;
?>