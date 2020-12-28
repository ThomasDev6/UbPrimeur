<?php

    require_once("connect.php");

    $type = $_POST["type"];
    $nom = $_POST["nomMarch"];
    $new = $_POST["prix"];

    
    if($type == "fru"){
        
        $req = "UPDATE Fruit SET prixFruit = '$new' WHERE nomFruit = '$nom' ";
        $rep2 = $co->query($req);
       
    }else{

        $req = "UPDATE Legume SET prixLeg = '$new' WHERE nomLeg = '$nom'";
        $rep2 = $co->query($req);
    }
    
    header("Location: webmastermain.php");
    exit();