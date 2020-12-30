<!DOCTYPE html>
<html lang="fr">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/stylePanier.css" />
		
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
                <p class="GT">résumé du panier<p>
			<table >
            <tr>
				  <th>Désignation</th>
                  <th>Prix</th>
                  <th>Poids</th>
                  <th>Quantité</th>
                  <th>Total</th>
				</tr>
<?php 
	require_once('connect.php');
	$totalPrixLeg=0;
	$totalPrixFruit=0;
	$idclient=1;
	$sql="SELECT clientPanier FROM panierclient WHERE idPanierClient='$idclient'";
	$p1 = $co->query($sql);
	while ($row = $p1->fetch_assoc() )  
	{
		$idpanier = $row['clientPanier'];
	}
	$sql2="SELECT * FROM lignepanierfruit WHERE panierLigneP='$idpanier'";
	$p2 = $co->query($sql2);
	while ($row2 = $p2->fetch_assoc() )  
	{

	$idfruit=$row2['fruitLigneP'];
	$sql3="select * from fruit where idFruit=$idfruit";
	$p3 = $co->query($sql3);
			while ($row3 = $p3->fetch_assoc() )  
			{
		echo "<tr>";
		echo "<td>".$row3['nomFruit']."</td>";
		echo "<td>".$row3['prixFruit']." €</td>";
		echo "<td>".$row3['quantiteFruit']." ".$row3['detailVenteFruit']."</td>";
		echo "<td>".$row2['quantiteFruitP']."</td>";
		$total=$row3['prixFruit']*$row2['quantiteFruitP'];
		$totalPrixFruit+=$total;
		echo "<td>".$total." €</td>"; 
		echo"<td><a href = 'supprimerFruit.php?id=".$idfruit."'>supprimer</a></td>";
		echo "</tr>";
	}
	}
	/////////////////////////////////////////////////////////////////////////
	$sql4="SELECT * FROM lignepanierleg WHERE panierLigneLegP='$idpanier'";
	$p4 = $co->query($sql4);
	while ($row4 = $p4->fetch_assoc() )  
	{
		$idleg=$row4['legLigneP'];
		$sql5="select * from legume where idLegume=$idleg";
		$p5 = $co->query($sql5);
		while ($row5 = $p5->fetch_assoc() )  
			{
				echo "<tr>";
				echo "<td>".$row5['nomLeg']."</td>";
				echo "<td>".$row5['prixLeg']." €</td>";
				echo "<td>".$row5['quantiteLeg']." ".$row5['detailVenteLeg']."</td>";
				echo "<td>".$row4['quantiteLegP']."</td>";
				$total=$row5['prixLeg']*$row4['quantiteLegP'];
				$totalPrixLeg+=$total;
				echo "<td>".$total." €</td>"; 
				echo"<td><a href = 'supprimerLeg.php?id=".$idleg."'>supprimer</a></td>";
				echo "</tr>";
			}



		}
		$sousTotal=$totalPrixLeg+$totalPrixFruit;
	echo "<p class='recap'>Sous total du panier : ".$sousTotal." € </p>";
?>
</table>
<p class="separationCom"></p>
<p class='recap'>Adresse de livraison </p>
<?php 

echo "<form method='post' action='paimentPanier.php?id=$idclient'>";

?>

					<div class="form">
						
						<p class="name">Code postal : </p>
						<input class="inpt" type = "" id="" name="" value="" > 
						
						<p class="name">Ville :</p>
						<input class="inpt" type ="" id="pass" name=""> 
						<p class="name">Adresse :</p>
						<input class="inpt" type ="" id="pass" name=""> 
					
					</div>
					<input class="btn" type="submit" value="Comfirmez panier et passez au paiement" >
					</form>
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

