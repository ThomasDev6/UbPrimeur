<?php
session_start();
    $mdp = $_POST["password"];

    if($mdp == "webmaster"){

        $_SESSION['auto'] = true;

        header("Location: webmastermain.php" );
        exit;
    }else{
        header("Location: accueil.php");
        exit;
    }