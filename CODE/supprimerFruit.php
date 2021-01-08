<?php 

require_once('connect.php');

session_start();

	if($_SESSION['idCli'] != 0){
		
		$idclient = $_SESSION['idCli'];
	}else{
		header("Location: index.html");
		exit;
}
    

$id = $_GET['id'];
$sql = "DELETE FROM lignepanierfruit WHERE fruitLigneP='$id' AND clientLigneP = '$idclient' ";
$co->query($sql);
header('Location: panier.php');
exit;

?>