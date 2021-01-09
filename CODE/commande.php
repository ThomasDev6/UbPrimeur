<?php 
require_once('connect.php');

session_start();

	if($_SESSION['idCli'] != 0){
		
		$id = $_SESSION['idCli'];
	}else{
		header("Location: index.html");
		exit;
    }
    
$dateCom = date("Y-m-d");
$dateliv = date("Y-m-d");
$dateliv = date('Y-m-d', strtotime($dateliv . ' +7 day'));
$idAddr = $_POST["idAddr"];


$sql1= "INSERT INTO livraison  VALUES (null, $idAddr, '$dateliv' ,null, 1)";
$rep = $co->query($sql1);
$idLiv = $co->insert_id;


$sql3="INSERT INTO commande VALUES (null, '$id', '$dateCom', '$idLiv')";
$rep2 = $co->query($sql3);
$idCom = $co->insert_id;


$sql5="SELECT idPanierClient FROM panierclient WHERE  clientPanier = '$id' ";
$p5 = $co->query($sql5);
while ($row3 = $p5->fetch_assoc() )  
{
    $idpanier=$row3['idPanierClient'];
}


$sql6="SELECT * FROM lignepanierfruit WHERE panierLigneP = '$idpanier' ";
$p6 = $co->query($sql6);
while ($row3 = $p6->fetch_assoc() )  
{
    $idfruit = $row3['fruitLigneP'];
    $quantitefruit = $row3['quantiteFruitP'];
    $sql7="INSERT INTO lignefruitcommande VALUES ('$idfruit', '$id', '$idCom', '$quantitefruit')";
    $co->query($sql7);
}


$sql8="SELECT * FROM lignepanierleg WHERE panierLigneLegP = '$idpanier' ";
$p7 = $co->query($sql8);
while ($row4 = $p7->fetch_assoc() )  
{
    $idleg=$row4['legLigneP'];
    $quantiteleg=$row4['quantiteLegP'];
    $sql9="INSERT INTO lignelegcommande VALUES ('$idleg', '$id', '$idCom', '$quantiteleg')";
    $co->query($sql9);
}

$del = "DELETE FROM lignepanierfruit WHERE clientLigneP = $id";
$co->query($del);

$del2 = "DELETE FROM lignepanierleg WHERE clientLigneLegP = $id";
$co->query($del2);

$del3 = "DELETE FROM panierclient WHERE clientPanier = $id";
$co->query($del3);


header('Location: compte.php');
exit;
?>