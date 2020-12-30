<?php 
require_once('connect.php');
$ancienMDP = $_POST['pass'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$sql="select * from client where idClient=1";
$p1 = $co->query($sql);
$modif=true;
$idcli=1;
$salt = "*$=²ù€;.?,È{qü=BuÐ8ƒµ´à¤";
$ancienMDP = md5($ancienMDP.$salt); 
while ($row = $p1->fetch_assoc() )  
{
    $mdp=$row['mdpClient'];
}
if ($mdp!=$ancienMDP)
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
    $pass1=md5($pass1.$salt);
    $sql="UPDATE client SET mdpClient='$pass1' WHERE idClient=$idcli";
    $modif2 = $co->query($sql);
    header('Location: compte.php?modif=3');
}

?>