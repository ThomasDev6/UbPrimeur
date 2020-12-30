<?php 
require_once('connect.php');
$sql="select * from client where idClient=4";
if(!empty($_GET['modif']))
{
$modifmdp = $_GET['modif'];
}
$p1 = $co->query($sql);
while ($row = $p1->fetch_assoc() )  
{
	$nom=$row['nomClient'];
	$prenom=$row['prenomClient'];
	$mdp=$row['mdpClient'];
	$abo=$row['hebdo'];
	$telephone=$row['telClient'];
	$numAdresse=$row['adresseCli'];
	$groupemail=$row['mailCli'];
}
$sql2="select * from mail where idMail=$groupemail";
$p2 = $co->query($sql2);
while ($row2 = $p2->fetch_assoc() )  
{
	$mail=$row2['mail'];
	
}
$sql3="select * from adresse where idAdresse=$numAdresse";
$p3 = $co->query($sql3);
while ($row3 = $p3->fetch_assoc() )  
{
	$CP=$row3['codePostal'];
	$ville=$row3['ville'];
	$adresse=$row3['adresse'];
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
				<p class="name2" >Nom : <?php echo $nom; ?> </p>
				
						
				<p class="name2">Prénom : <?php echo $prenom; ?> </p>
				
				<p class="separationCom"></p>
				<form method="post" action="mdp.php"> 
					<div class="form">
						
						<p class="name">Mot de passe actuel : </p>
						<input class="inpt" type = "password" id="" name="pass" value="" > 
						
						<p class="name">Nouveau mot de passe :</p>
						<input class="inpt" type ="password" id="pass" name="pass1"> 
						<p class="name">Comfirmer nouveau mot de passe :</p>
						<input class="inpt" type ="password" id="pass" name="pass2"> 
					
					</div>
					<input class="btn" type="submit" value="Valider modifications">
					</form>
					<?php 
					if(!empty($_GET['modif']))
					{
				
					if ($_GET['modif']==1)
					{
						echo "<p>Ancien mot de passe incorrect</p>";
					}
					if ($_GET['modif']==2)
					{
						echo "<p>Nouveau mot de passe ne sont pas similaire</p>";
					}
					if ($_GET['modif']==3)
					{
						echo "<p>Mot de passe modifié !!</p>";
					}
					}
					

					?>
					
					<p class="separationCom"></p>
					<form method="post" action="mail.php"> 
						<div class="form">
							
							<p class="name">Ancienne adresse mail :</p>
							<input class="inpt" type = "" id="mail" name="" value="<?php echo $mail; ?>" > 
							
							<p class="name">Nouvelle adresse mail :</p>
							<input class="inpt" type = "" id="mail" name="mail" required> 
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
				echo "<p class='abonnement' >Vous avez souscrit à un abonnement pour un $abo panier hebdomadaire </p>";
			}
			else 
			echo "<p class='TA text_abo'> aucun abonnement actuellement</p>
				<a class='btn_abo' type='button' href='nospaniers.php'>Souscrire à un abonnement</a>";


			?>
			<p class="gTitre TA"> Adresse de livraison</p>
			
			<div class="contenue">
		
				


					<p class="txtAdresse" >Code postal : <?php echo $CP; ?> </p>
					<p class="txtAdresse">Ville : <?php echo $ville; ?></p>
					<p class="txtAdresse">Adresse : <?php echo $adresse; ?></p>

			
					
				
				
				
				
			</div>
			<p class="gTitre TA"> Historique de commande</p>
			
			<p class="numCom TA">Numéro de commande : 525155</p>
			<table>
				<tr>
				  <th>Désignation</th>
				  <th>Prix</th>
				  <th>Quantité</th>
				  <th>Total</th>
				</tr>
				<tr>
				  <td>Fruit</td>
				  <td>10€</td>
				  <td>5</td>
				  <td>50€</td>
				</tr>
				<tr>
					<td>Légumes</td>
					<td>20€</td>
					<td>5</td>
					<td>100€</td>
				</tr>
			  </table>
			  <p class="TA">Sous-total de la commande : 150€</p>
			  <p class="separationCom"></p>
			  <p class="numCom TA">Numero de commande : 5892</p>
			<table>
				<tr>
				  <th>Désignation</th>
				  <th>Prix</th>
				  <th>Quantité</th>
				  <th>Total</th>
				</tr>
				<tr>
				  <td>Fruit</td>
				  <td>2€</td>
				  <td>5</td>
				  <td>10€</td>
				</tr>
				<tr>
					<td>Légumes</td>
					<td>15€</td>
					<td>5</td>
					<td>75€</td>
				</tr>
			  </table>
			  <p class="TA">Sous total commande : 85€</p>
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