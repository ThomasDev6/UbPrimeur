<?php

    require_once("connect.php");

    $mail = strip_tags($_POST['username']);
    $mail = mysqli_real_escape_string($co ,$mail);
    
    
    // Récupération du mdp hashé avec le grain de sel
    $salt = "*$=²ù€;.?,È{qü=BuÐ8ƒµ´à¤";
    $mdp = md5($_POST["password"].$salt); 


    $getId = "SELECT idMail FROM mail WHERE mail ='$mail'";
    $rep = $co->query($getId);
    while($row = $rep->fetch_assoc()){
        $idmail = $row["idMail"];
    }
    
    //Préparation de la vérif mot de passe
    $connexion = "SELECT mdpClient FROM client WHERE mailCli = '$idmail'";
    $testco = $co->query($connexion);
    $numrows = $co->num_rows;
    
    // Si mail pas trouvé 
    if($numrows === 0){

        header("Location: index.html");
        exit;
    }

    // Récupération du mdp
    while($row = $testco->fetch_assoc()){
        $compMdp = $row["mdpClient"];
    }
    

    
    // Si les mdp correspondent
    if($compMdp == $mdp){
        header("Location: accueil.php");
        exit;
    }


    header("Location: index.html");
    exit;

?>