<?php

    require_once("connect.php");

    session_start();

	if($_SESSION['idCli'] != 0){
		
		$idclient = $_SESSION['idCli'];
	}else{
		header("Location: index.html");
		exit;
    }
    

    $idL = $_GET["idL"];
    $quantite = $_POST["quantite"];


    $testQu = "SELECT quantiteLeg FROM legume WHERE idLegume = $idL";
    $repQu = $co->query($testQu);

    while($rowQu = $repQu->fetch_assoc()){
        $stockDispo = $rowQu["quantiteLeg"];
    }

    if( $quantite > $stockDispo){

        header("Location: legumes.php");
        exit;

    }else{
        if($quantite < 1){
            header("Location: legumes.php");
            exit;
        }
        $test = "SELECT * FROM panierclient WHERE clientPanier = '$idclient'";
        $exTest = $co->query($test);
        $numRows = $exTest->num_rows;
    
        if($numRows != 0){
            
            while($row = $exTest->fetch_assoc()){
                $idPanierC = $row["idPanierClient"];
            }
    
        }else{
    
            $sql = "INSERT INTO panierclient VALUES (null,'$idclient')";
            $rep = $co->query($sql);
            $idPanierC = $co->insert_id;
        }
        
    
        $req = "INSERT INTO lignepanierleg VALUES('$idL','$idclient','$idPanierC','$quantite')";
        $ex = $co->query($req);
    
        header("Location: legumes.php");
        exit;
    }
    
    ?>