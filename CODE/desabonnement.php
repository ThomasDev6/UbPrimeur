<?php
    require_once("connect.php");

    session_start();
    if($_SESSION['idCli'] != 0){
		
		$idclient = $_SESSION['idCli'];
	}else{
		header("Location: index.html");
		exit;
    }
    
    $upd = "UPDATE client SET hebdo = \"\" WHERE idClient = $idclient ";
    $co->query($upd);
    header("Location: compte.php");
    exit;


?>