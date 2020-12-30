<?php 
require_once('connect.php');
$id = $_GET['id'];
$dateCom = date("d-m-Y");
$dateliv = date("d-m-Y");
$dateliv = date('d-m-Y', strtotime($dateliv . ' +5 day'));
echo $dateliv;
$idliv;
$sql1="INSERT INTO livraison (idLivraison, adresseChoisie, dateLivraison, groupeMailLiv, typeLiv) VALUES (null, '1', $dateliv,'1', '1')";
$co->query($sql1);
$sql2="SELECT * FROM livraison ";
$p2=$co->query($sql2);
$NombreLigne= mysqli_num_rows($p2);
$compteur=0;
while ($row = $p2->fetch_assoc() )  
{
    $compteur++;
    if($compteur==$NombreLigne)
    {
         $idliv = $row['idLivraison'];
    }
   
}
$sql3="INSERT INTO commande (idCommande, clientCom, dateCom, livraisonCom) VALUES (null, '$id', '$dateCom', '$idliv')";
$co->query($sql3);
$sql4="SELECT * FROM commande ";
$p3=$co->query($sql4);
$NombreLigneCom= mysqli_num_rows($p3);
$compteur2=0;
while ($row2 = $p3->fetch_assoc() )  
{
    $compteur2++;
    if($compteur2==$NombreLigneCom)
    {
         $idcom= $row2['idCommande'];
    }
   
}

$sql5="select clientPanier from panierclient where idPanierClient=$id";
$p5 = $co->query($sql5);
while ($row3 = $p5->fetch_assoc() )  
{
$idpanier=$row3['clientPanier'];
}
$sql6="select * from lignepanierfruit where panierLigneP=$idpanier";
$p6 = $co->query($sql6);
while ($row3 = $p6->fetch_assoc() )  
{
$idfruit=$row3['fruitLigneP'];
$quantitéfruit=$row3['quantiteFruitP'];
$sql7="INSERT INTO lignefruitcommande (fruitLigne, clientLigneFruitCom, commandeLigneFruitCom, quantiteFruitCom) VALUES ('$idfruit', '$id', '$idcom', '$quantitéfruit')";
$co->query($sql7);
}
$sql8="select * from lignepanierleg where panierLigneLegP=$idpanier";
$p7 = $co->query($sql8);
while ($row4 = $p7->fetch_assoc() )  
{
$idleg=$row4['legLigneP'];
$quantitéleg=$row4['quantiteLegP'];
$sql9="INSERT INTO lignelegcommande (legumeLigne, clientLigneLegCom, commandeLegFruitCom, quantiteLegCom) VALUES ('$idleg', '$id', '$idcom', '$quantitéleg')";
$co->query($sql9);
}
header('Location: compte.php');
?>