<?php 
    require_once('connect.php');

    session_start();

	if($_SESSION['idCli'] != 0){
		
		$idcli = $_SESSION['idCli'];
	}else{
		header("Location: index.html");
		exit;
    }
    

    $mail = $_POST['mail'];



    $req = "SELECT mailCli FROM client WHERE idClient = '$idcli' ";
    $rep = $co->query($req);
    while( $row = $rep->fetch_assoc()){
        $idM = $row['mailCli'];
    }

    $sql="UPDATE mail SET mail = '$mail' WHERE idMail = '$idM' ";

    $modif = $co->query($sql);

    header('Location: compte.php');
?>
