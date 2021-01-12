<?php
    require_once("connect.php");

    $idComm = $_GET["idc"];

    $delLigneF = "DELETE FROM lignefruitcommande WHERE commandeLigneFruitCom = $idComm ";
    $co->query($delLigneF);

    $delLigneL  = "DELETE FROM lignelegcommande WHERE commandeLegFruitCom = $idComm ";
    $co->query($delLigneL);

    $getIdLiv = "SELECT livraisonCom FROM commande WHERE idCommande = $idComm";
    $rep = $co->query($getIdLiv);

    while($row = $rep->fetch_assoc()){
        $idLiv = $row["livraisonCom"];
    }

    $delCommande  = "DELETE FROM commande WHERE idCommande = $idComm ";
    $co->query($delCommande);

    $delLiv = "DELETE FROM livraison WHERE idLivraison = $idLiv";
    $co->query($delLiv);

    header("Location: compte.php");
    exit;   
    

?>