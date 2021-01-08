<?php 
require_once('connect.php');

session_start();

	if($_SESSION['idCli'] != 0){
		
		$idCli = $_SESSION['idCli'];
	}else{
		header("Location: index.html");
		exit;
    }

$ancienMDP = $_POST['pass'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
;

$sql = "SELECT mdpClient FROM client WHERE idClient='$idCli'";
$p1 = $co->query($sql);

$modif=true;
$salt = "*$=²ù€;.?,È{qü=BuÐ8ƒµ´à¤";
$ancienMDP = md5($ancienMDP.$salt); 

    while ($row = $p1->fetch_assoc() )  
    {
        $mdp = $row['mdpClient'];
    }

    if ($mdp != $ancienMDP)
    {
        $modif=false;
        header('Location: compte.php?modif=1');
    }
    else if ($pass1!=$pass2)
    {
        $modif=false;
        header('Location: compte.php?modif=2');
    }

    if ($modif==true)
    {
        $pass1 = md5($pass1.$salt);
        $sql2="UPDATE client SET mdpClient = '$pass1' WHERE idClient = '$idCli' ";
        $modif2 = $co->query($sql2);
        header('Location: compte.php?modif=3');
    }

?>