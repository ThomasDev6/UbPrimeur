<?php 
require_once('connect.php');

session_start();

	if($_SESSION['idCli'] != 0){
		
		$idclient = $_SESSION['idCli'];
	}else{
		header("Location: index.html");
		exit;
    }
$choix = $_POST['Choix'];
$_SESSION['choixP'] = $choix;


header("Location: paiement.html");
exit;
?>
