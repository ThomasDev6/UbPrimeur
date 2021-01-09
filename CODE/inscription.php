<?php

    require_once("connect.php");

    // Grain de sel pour personnaliser le hachage du mdp
    $salt = "*$=²ù€;.?,È{qü=BuÐ8ƒµ´à¤";
    //Hachage du mdp avec la fonction md5 et le grain de sel
    $mdp = md5($_POST["mdp"].$salt);

    $choix = 0;    

    // Récupération du choix
    if ($_POST["choix"]=="oui"){
        $choix = 1;
    }


    $hebdo ="";

    // On évite les failles :

    $nom = strip_tags($_POST['nom']);
    $nom = mysqli_real_escape_string($co ,$nom);

    $prenom = strip_tags($_POST['prenom']);
    $prenom = mysqli_real_escape_string($co ,$prenom);

    $mail = strip_tags($_POST['mail']);
    $mail = mysqli_real_escape_string($co ,$mail);
    
    $tel = strip_tags($_POST['tel']);
    $tel = mysqli_real_escape_string($co ,$tel);

    $cp = strip_tags($_POST['cp']);
    $cp = mysqli_real_escape_string($co ,$cp);

    $ville = strip_tags($_POST['ville']);
    $ville = mysqli_real_escape_string($co ,$ville);

    $addr = strip_tags($_POST['addr']);
    $addr = mysqli_real_escape_string($co ,$addr);
    
    
    $verifMail = "SELECT * FROM client JOIN mail ON (mailCli = idMail) WHERE mail = '$mail' ";
    $vmail = $co->query($verifMail);
    $count = $vmail->num_rows;
    echo $count;
    
    if($count > 0){
        header("Location: index.html");
        exit;
    }
    
    // Création du mail
    $insertMail = "INSERT INTO mail VALUES (null,'$mail')";
    $insmail = $co->query($insertMail);
    $idmail = $co->insert_id;
    
    // Création de l'adresse
    $addr = str_replace("'"," ",$addr);
    $insertAddr = "INSERT INTO adresse VALUES(null,'$cp','$ville','$addr')";
    $insAd = $co->query($insertAddr);
    $idAddr = $co->insert_id;
    
    
    $test2 = 1;
    // Création du client
    $insert = "INSERT INTO client VALUES (null,'$nom','$prenom','$mdp','$choix','$hebdo','$tel','$idAddr','$idmail')";
    $inscli = $co->query($insert);

    header("Location: index.html");
    exit;
    
?>






    
    