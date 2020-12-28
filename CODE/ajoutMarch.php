<?php

    require_once("connect.php");    

    $type = $_POST["type"];
    $nom = $_POST["nomMarch"];
    $nomPh = $_POST["nomPh"];
    $prix = $_POST["prix"];
    $detail = $_POST["detail"];
    $stockI = $_POST["stockI"];
    $nomfamille = $_POST["famille"];
    $nomsaison = $_POST["saison"];


    if($type == "fru"){

        $getid = "SELECT idFamilleFruit FROM famillefruit WHERE nomFamilleFruit = '$nomfamille'";
        $rep = $co->query($getid);
        while($row = $rep->fetch_assoc()){
            $famille = $row["idFamilleFruit"];
        }

        $getid2 = "SELECT idSaison FROM saison WHERE nomSaison = '$nomsaison'";
        $rep2 = $co->query($getid2);
        while($row2 = $rep2->fetch_assoc()){
            $saison = $row2["idSaison"];
        }

        $req = "INSERT INTO Fruit VALUES (null, '$nom', $prix, '$detail', $stockI , '$nomPh', null, '$saison', '$famille')";
        $insert = $co->query($req);

    }else{

        $getid = "SELECT idFamilleLegume FROM famillelegume WHERE nomFamilleLeg = '$nomfamille'";
        $rep = $co->query($getid);
        while($row = $rep->fetch_assoc()){
            $famille = $row["idFamilleLegume"];
        }

        $getid2 = "SELECT idSaison FROM saison WHERE nomSaison = '$nomsaison'";
        $rep2 = $co->query($getid2);
        while($row2 = $rep2->fetch_assoc()){
            $saison = $row2["idSaison"];
        }
        
        $req = "INSERT INTO Legume VALUES (null, '$nom', $prix, $stockI, '$detail', '$nomPh', null, '$saison', '$famille')";
        $insert = $co->query($req);

    }

    header("Location: webmastermain.php");
    exit;
?>