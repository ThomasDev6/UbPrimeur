<?php
    $mdp = $_POST["password"];

    if($mdp == "webmaster"){
        header("Location: webmastermain.php" );
        exit;
    }else{
        header("Location: accueil.php");
        exit;
    }