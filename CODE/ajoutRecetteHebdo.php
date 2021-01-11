<?php
    require_once("connect.php");  
$nomR = $_POST['nomRecette'];
$nomP = $_POST['nomPhre'];
$temps = $_POST['temps'];


$quantite = array($_POST['qt1'],$_POST['qt2'],$_POST['qt3'],$_POST['qt4'],$_POST['qt5'],
$_POST['qt6'],$_POST['qt7'],$_POST['qt8']);
$mesure = array($_POST['m1'],$_POST['m2'],$_POST['m3'],$_POST['m4'],$_POST['m5'],
$_POST['m6'],$_POST['m7'],$_POST['m8']);
$ing = array($_POST['ing1'],$_POST['ing2'],$_POST['ing3'],$_POST['ing4'],$_POST['ing5'],
$_POST['ing6'],$_POST['ing7'],$_POST['ing8']);
$etape = array($_POST['etape1'],$_POST['etape2'],$_POST['etape3'],$_POST['etape4'],
$_POST['etape5'],$_POST['etape6'],$_POST['etape7'],$_POST['etape8'],$_POST['etape9'],
$_POST['etape10']);
$ok = false;
$a = 0;
$y = 0;




$getid = "SELECT idRecette FROM recette WHERE nomRecette = $nomR";
$rep2 = mysqli_query($co, $getid);


while (1){

    
if ($nomR != "" && $temps != "" && $nomP != ""){

    $strNom = str_replace("'"," ",$nomR);
    $strNomPh = str_replace("'"," ",$nomP);
    $req = "UPDATE recettehebdo SET nomRecette = '$strNom ' ,tempsPrep = '$temps',
nomPhotoRecette = '$strNomPh' WHERE 1";
$rep = mysqli_query($co, $req);
}
else{

    break;
}

for($i = 0; $i < sizeof($ing); $i++){
    if($ing[0] == null || $quantite[0] == null){

        break;
    }
    if($ing[$i] == null && $quantite[$i] == null){
        $ok = true;
        break;
    }
    else{
        if ($ing[$i] == null){

        break;
    }
        elseif($quantite[$i] == null){
 
        break;
    }
    }

}

    if($etape[0] == null){

        $ok = false;
    }
    break;
}
if($ok == true){
    $delete = "DELETE FROM ingredient WHERE recetteIngredient = 1";
    $del = mysqli_query($co, $delete);
    $delete1 = "DELETE FROM etape WHERE recetteEtape = 1";
    $del1 = mysqli_query($co, $delete1);
    
    while($ing[$a]!=null)
    {
        $toInsertIng = str_replace("'"," ",$ing[$a]);
        $req3 = "INSERT INTO ingredient VALUES (null, 1, '$quantite[$a]','$mesure[$a]', '$toInsertIng')";
        $rep3 = mysqli_query($co, $req3);
        $a++;
    }
    while($etape[$y]!= null){
        $toInsert = str_replace("'"," ",$etape[$y]);
        $req4 = "INSERT INTO etape VALUES (null, 1, '$toInsert')";
        $rep4 = mysqli_query($co, $req4);
        echo " ligne ajoutée : ".$etape[$y];
        $y++;   
    }
    }


    header("Location: webmastermain.php");
    exit;
    ?>