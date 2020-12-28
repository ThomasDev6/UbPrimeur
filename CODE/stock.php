<?php

    require_once("connect.php");

    $type = $_POST["type"];
    $nom = $_POST["nomMarch"];
    $ajout = $_POST["stock"];

    
    if($type == "fru"){

        
        $getQuantite = "SELECT quantiteFruit, idFruit FROM Fruit WHERE nomFruit = '$nom'";
        $rep = $co->query($getQuantite);

        while($row = $rep->fetch_assoc()){
            $quant = $row["quantiteFruit"];
            $id = $row["idFruit"];
        }
        
        $newQuant = $ajout + $quant;
        
        $req = "UPDATE Fruit SET quantiteFruit = '$newQuant' WHERE idFruit = '$id' ";
        $rep2 = $co->query($req);
       
    }else{

        $getQuantite = "SELECT quantiteLeg FROM Legume WHERE nomLeg = '$nom'";
        $rep = $co->query($getQuantite);

        while($row = $rep->fetch_assoc()){
            $quant = $row["quantiteLeg"];
        }
        $newQuant = $ajout + $quant;

        $req = "UPDATE Legume SET quantiteLeg = '$newQuant' WHERE nomLeg = '$nom'";
        $rep2 = $co->query($req);
    }
    
    header("Location: webmastermain.php");
    exit();
?>