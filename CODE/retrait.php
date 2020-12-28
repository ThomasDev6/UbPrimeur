<?php

require_once("connect.php");

$type = $_POST["type"];
$nom = $_POST["nomMarch"];


if($type == "fru"){
    
    $req = "DELETE FROM Fruit WHERE nomFruit = '$nom' ";
    $rep2 = $co->query($req);
   
}else{

    $req = "DELETE FROM Legume WHERE nomLeg = '$nom'";
    $rep2 = $co->query($req);
}

header("Location: webmastermain.php");
exit();