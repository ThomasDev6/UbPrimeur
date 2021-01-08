<?php 
	require_once('connect.php');
	session_start();

	if($_SESSION['idCli'] != 0){
		
		$idclient = $_SESSION['idCli'];
	}else{
		header("Location: index.html");
		exit;
	}

	$sql0="SELECT * FROM client WHERE idClient='$idclient'";
	if(!empty($_GET['modif']))
	{
	$modifmdp = $_GET['modif'];
	}
	$p01 = $co->query($sql0);
	while ($row0 = $p01->fetch_assoc() )  
	{
		$nom=$row0['nomClient'];
		$prenom=$row0['prenomClient'];
		$mdp=$row0['mdpClient'];
		$abo=$row0['hebdo'];
		$telephone=$row0['telClient'];
		$numAdresse=$row0['adresseCli'];
		$groupemail=$row0['mailCli'];
	}
	$sql02="select * from mail where idMail=$groupemail";
	$p02 = $co->query($sql02);
	while ($row02 = $p02->fetch_assoc() )  
	{
		$mail=$row02['mail'];
		
	}
	$sql03="select * from adresse where idAdresse=$numAdresse";
	$p03 = $co->query($sql03);
	while ($row03 = $p03->fetch_assoc() )  
	{
		$CP=$row03['codePostal'];
		$ville=$row03['ville'];
		$adresse=$row03['adresse'];
	}



?>
<!DOCTYPE html>
<html lang="fr">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styleCompte.css" />
		
		<title>UberPrimeur</title>

		
		<!--Début du body-->
		<body>
			<div class="header">
				<div class="logo">
					<a href="accueil.php"><img id="logoNav" src="../LOGOS/logo5.PNG" width=400 height=62 alt></a>
				</div>
				<div class="menuNav">
					<a href="a_propos.php" class="rubrique"><img id="iconMenu" src="../PHOTOS/apropos.png" height=18 width=18 alt>À propos</a>
					<a href="nospaniers.php"class="rubrique"><img id="iconMenu" src="../PHOTOS/nospaniers.png" height=18 width=18 alt>Nos paniers</a>
					<a href="fruits.php"class="rubrique"><img id="iconMenu" src="../PHOTOS/fruit.jpg" height=18 width=18 alt>Fruits</a>
					<a href="legumes.php"class="rubrique"><img id="iconMenu" src="../PHOTOS/legume.png" height=18 width=18 alt>Légumes</a>
					<a href="panier.php"class="rubrique"><img id="iconMenu" src="../PHOTOS/panier.png" height=18 width=18 alt>Panier</a>
					<a href="compte.php"class="rubrique"><img id="iconMenu" src="../PHOTOS/compte.jpg" height=18 width=18 alt>Compte</a>
				</div>
			</div>
			
			<div class="encadre">
				<p class="gTitre TA"> Informations personnelles</p>
				<div class="contenue">
				<p class="name2" ><b>Nom : </b><?php echo $nom; ?> </p>
				
						
				<p class="name2"><b>Prénom : </b><?php echo $prenom; ?> </p>
				
				<p class="separationCom"></p>
				<form method="post" action="mdp.php"> 
					<div class="form">
						
						<p class="name">Mot de passe actuel : </p>
						<input class="inpt" type = "password" id="" name="pass" value="" > 
						
						<p class="name">Nouveau mot de passe :</p>
						<input class="inpt" type ="password" id="pass" name="pass1"> 
						<p class="name">Confirmer nouveau mot de passe :</p>
						<input class="inpt" type ="password" id="pass" name="pass2"> 
					
					</div>
					<input class="btn" type="submit" value="Valider modifications">
					</form>
					<?php 
					if(!empty($_GET['modif']))
					{
				
					if ($_GET['modif']==1)
					{
						echo "<p>Ancien mot de passe incorrect.</p>";
					}
					if ($_GET['modif']==2)
					{
						echo "<p>Les deux mots de passes sont différents.</p>";
					}
					if ($_GET['modif']==3)
					{
						echo "<p>Mot de passe modifié. </p>";
					}
					}
					

					?>
					
					<p class="separationCom"></p>
					<form method="post" action="mail.php"> 
						<div class="form">
							
							<p class="name">Adresse mail actuelle :</p>
							<input class="inpt" type = "text" id="mail" name="" value="<?php echo $mail; ?>" > 
							
							<p class="name">Nouvelle adresse mail :</p>
							<input class="inpt" type = "text" id="mail" name="mail" required> 
						</div>
						<input class="btn" type="submit" value="Valider modifications">
					</form>
			</div>
			<p class="gTitre TA"> Abonnement</p>
			<?php 
					if(!empty($_GET['paye']))
					{
					echo "<p class='abonnement'>Le paiement a bien été effectué</p>";
					
					}
					

					?>

			<?php
			if (!empty($abo))
			{
				echo "<p class='abonnement' >Vous avez souscrit a un abonnement pour un panier hebdomadaire $abo</p>";
			}
			else 
			echo "<p class='TA text_abo'> Vous n'avez souscrit à aucun abonnement actuellement</p>
				<a class='btn_abo' type='button' href='nospaniers.php'>Souscrire à un abonnement</a>";


			?>
			<p class="gTitre TA"> Adresse</p>
			
			<div class="contenue">
		
				


					<p class="txtAdresse" ><b>Code postal : </b><?php echo $CP; ?> </p>
					<p class="txtAdresse"><b>Ville : </b><?php echo $ville; ?></p>
					<p class="txtAdresse"><b>Adresse : </b><?php echo $adresse; ?></p>

			
					
				
				
				
				
			</div>
			<p class="gTitre TA"> Historique des commandes <label id="tet">( 3 plus récentes )<label></p>
			
			<?php 

	$totalPrixLeg=0;
	$totalPrixFruit=0;
	
	
	$sql="SELECT idCommande FROM commande WHERE clientCom='$idclient'";
    $p1 = $co->query($sql);
    $NBcommande= mysqli_num_rows($p1);
	$compteur=1;
	if ($NBcommande<1)
		{
			
			echo "<p class='tb'> Vous n'avez pas encore commander  </p>";
		}
	while ($row = $p1->fetch_assoc() )  
	{
		
		if($compteur<$NBcommande-2)
        {
			
            $compteur++;
        }
        else {

        
        $idcommande = $row['idCommande'];
        echo "<p class=' TA'>Numero de commande : ".$idcommande."</p>";
        echo "	<table >
        <tr>
              <th>Désignation</th>
              <th>Prix</th>
              <th>Details</th>
              <th>Quantité</th>
              <th>Total</th>
            </tr>
    ";

        
        $sql2="SELECT * FROM lignefruitcommande WHERE commandeLigneFruitCom='$idcommande'";
    $p2 = $co->query($sql2);
    $NBligneFruit= mysqli_num_rows($p2);
    if ($NBligneFruit>0)
    {
while ($row2 = $p2->fetch_assoc() )  
	{

	$idfruit=$row2['fruitLigne'];
	$sql3="select * from fruit where idFruit=$idfruit";
	$p3 = $co->query($sql3);
			while ($row3 = $p3->fetch_assoc() )  
			{
		echo "<tr>";
		echo "<td>".$row3['nomFruit']."</td>";
		echo "<td>".$row3['prixFruit']." €</td>";
		echo "<td>".$row3['quantiteFruit']." ".$row3['detailVenteFruit']."</td>";
		echo "<td>".$row2['quantiteFruitCom']."</td>";
		$total=$row3['prixFruit']*$row2['quantiteFruitCom'];
		$totalPrixFruit+=$total;
		echo "<td>".$total." €</td>"; 
		
		echo "</tr>";
	}
	}


    }
	
	/////////////////////////////////////////////////////////////////////////
	$sql4="SELECT * FROM lignelegcommande WHERE commandeLegFruitCom='$idcommande'";
    $p4 = $co->query($sql4);
    $NBligneLeg= mysqli_num_rows($p4);
    if ($NBligneLeg>0)
    {

        while ($row4 = $p4->fetch_assoc() )  
	    {
		$idleg=$row4['legumeLigne'];
		$sql5="select * from legume where idLegume=$idleg";
        $p5 = $co->query($sql5);
		while ($row5 = $p5->fetch_assoc() )  
			{
				echo "<tr>";
				echo "<td>".$row5['nomLeg']."</td>";
				echo "<td>".$row5['prixLeg']." €</td>";
				echo "<td>".$row5['quantiteLeg']." ".$row5['detailVenteLeg']."</td>";
				echo "<td>".$row4['quantiteLegCom']."</td>";
				$total=$row5['prixLeg']*$row4['quantiteLegCom'];
				$totalPrixLeg+=$total;
				echo "<td>".$total." €</td>"; 
				
				echo "</tr>";
			}



        }


    }

	
        
        echo "</table>";
        $sousTotal=$totalPrixLeg+$totalPrixFruit;
        
    echo "<p class='TA'>Sous total de la commande : ".$sousTotal." € </p>";
    $sousTotal=0;
        $totalPrixLeg=0;
        $totalPrixFruit=0;

echo "<p class='separationCom'></p>";

    }
}
   
	
?>
			</div>
			<div class="footer">
				<div id="dispoFoot">
					<div id="certif">
						<p>Site réalisé par Valentin Melusson, Lhukas Nelhomme et Thomas Jallu  ©</p><p id="ita">Tous droits réservés</p>
					</div>
					<div class="reseaux">
						<a href="https://www.instagram.com/uberprimeur_/"><img src="../PHOTOS/insta.png" height=40 width=40 alt ></a>
						<a href="https://twitter.com/UPrimeur"><img src="../PHOTOS/twitter.png" height=40 width=40 alt ></a>
					</div>
					
				</div>
				</br>
				<a href="webmaster.php" id="webmaster">accès webmaster</a>
			</div>
        </body>
</html>