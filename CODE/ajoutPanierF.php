<?php

    require_once("connect.php");

    session_start();

	if($_SESSION['idCli'] != 0){
		
		$idclient = $_SESSION['idCli'];
	}else{
		header("Location: index.html");
		exit;
    }
    

    $idFruit = $_GET["idF"];
    $quantite = $_POST["quantite"];


    $testQu = "SELECT quantiteFruit FROM fruit WHERE idFruit = $idFruit";
    $repQu = $co->query($testQu);

    while($rowQu = $repQu->fetch_assoc()){
        $stockDispo = $rowQu["quantiteFruit"];
    }

    if( $quantite > $stockDispo){

        header("Location: fruits.php");
        exit;

    }else{

        if($quantite <1){
            header("Location: fruits.php");
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
        
    
        $req = "INSERT INTO lignepanierfruit VALUES('$idFruit','$idclient','$idPanierC','$quantite')";
        $ex = $co->query($req);
    }

   
    ?>
    

