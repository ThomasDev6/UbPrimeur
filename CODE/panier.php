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
                <p class="GT">Résumé du panier<p>
		
<?php 
	require_once('connect.php');

	session_start();

	if($_SESSION['idCli'] != 0){
		
		$idclient = $_SESSION['idCli'];
	}else{
		header("Location: index.html");
		exit;
	}


	$totalPrixLeg=0;
	$totalPrixFruit=0;
	
	$sql01="SELECT * FROM client WHERE idClient='$idclient'";
	$p01 = $co->query($sql01);
	
	while ($row = $p01->fetch_assoc() )  
	{
		$numAdresse=$row['adresseCli'];
	}
	$sql03="select * from adresse where idAdresse=$numAdresse";
	$p03 = $co->query($sql03);


	while ($row3 = $p03->fetch_assoc() )  
	{
	$CP=$row3['codePostal'];
	$ville=$row3['ville'];
	$adresse=$row3['adresse'];
	}


	$sql="SELECT idPanierClient FROM panierclient WHERE clientPanier='$idclient'";
	$p1 = $co->query($sql);

	$req="SELECT * FROM lignepanierleg WHERE clientLigneLegP = '$idclient'";
	$rep= $co->query($req);
	$value = $rep->num_rows;

	$sql00="SELECT * FROM lignepanierfruit WHERE clientLigneP ='$idclient'";
	$p00 = $co->query($sql00);
	$value2= $p00->num_rows;

	$test = $value + $value2;

	if ($test ==0)
	{
		
		echo "<img  src='../PHOTOS/panierCoeur.jpg' height=200 width=200 alt>";
		echo "<p>Votre panier est vide </p>";
	}
	else 
	{
		echo "<table >
		<tr>
			  <th>Désignation</th>
			  <th>Prix</th>
			  <th>Détail de vente</th>
			  <th>Quantité</th>
			  <th>Total</th>
			</tr>";
	while ($row = $p1->fetch_assoc() )  
	{
		$idpanier = $row['idPanierClient'];
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
		echo "<td>".$row3['detailVenteFruit']."</td>";
		echo "<td>".$row2['quantiteFruitP']."</td>";
		$total=$row3['prixFruit']*$row2['quantiteFruitP'];
		$totalPrixFruit+=$total;
		echo "<td id=\"avantsupp\">".$total." €</td>"; 
		echo"<td id=\"supp\"><a id=\"btnSupp\" href = 'supprimerFruit.php?id=".$idfruit."'>Supprimer</a></td>";
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
				echo "<td>".$row5['detailVenteLeg']."</td>";
				echo "<td>".$row4['quantiteLegP']."</td>";
				$total=$row5['prixLeg']*$row4['quantiteLegP'];
				$totalPrixLeg+=$total;
				echo "<td id=\"avantsupp\" >".$total." €</td>"; 
				echo"<td id=\"supp\" ><a id=\"btnSupp\" href = 'supprimerLeg.php?id=".$idleg."'>Supprimer</a></td>";
				echo "</tr>";
			}



		}
		$sousTotal=$totalPrixLeg+$totalPrixFruit;
	echo "<p class='recap'>Sous total du panier : ".$sousTotal." € </p>";
	echo "</table>";
	echo "<p class='separationCom'></p>";
	echo "<p class='recap'>Adresse de livraison </p>";

echo "<form method='post' action='paimentPanier.php'>";


echo "<div class='form'>";
						
echo "<p class='name'>Code postal : </p>  <input class='inpt'  value='$CP' >" ;
						
echo "<p class='name'>Ville :</p> <input class='inpt' id='pass' value='$ville'> ";
	echo "<p class='name'>Adresse :</p> <input class='inpt'  id='pass' value='$adresse'> ";					
						
					
					
					echo "</div>";
					echo "<input class='btn' type='submit' value='Comfirmez panier et passez au paiement' >";
					echo "</form>";


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

