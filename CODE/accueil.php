<?php
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" />

<title>UberPrimeur</title>
<!--Début du body-->

<body>
	<!--Menu de nav-->

	<div class="header">
		<div class="logo">
			<a href="accueil.php"><img id="logoNav" src="../LOGOS/logo5.PNG" width=400 height=62 alt></a>
		</div>
		<div class="menuNav">
			<a href="a_propos.php" class="rubrique"><img id="iconMenu" src="../PHOTOS/apropos.png" height=18 width=18
					alt>À propos</a>
			<a href="nospaniers.php" class="rubrique"><img id="iconMenu" src="../PHOTOS/nospaniers.png" height=18
					width=18 alt>Nos paniers</a>
			<a href="fruits.php" class="rubrique"><img id="iconMenu" src="../PHOTOS/fruit.jpg" height=18 width=18
					alt>Fruits</a>
			<a href="legumes.php" class="rubrique"><img id="iconMenu" src="../PHOTOS/legume.png" height=18 width=18
					alt>Légumes</a>
			<a href="panier.php" class="rubrique"><img id="iconMenu" src="../PHOTOS/panier.png" height=18 width=18
					alt>Panier</a>
			<a href="compte.php" class="rubrique"><img id="iconMenu" src="../PHOTOS/compte.jpg" height=18 width=18
					alt>Compte</a>
		</div>
	</div>

	<!--Body-->
	<div id="logo_accueil"><img src="../PHOTOS/logoferme7.png" alt=""></div>

	<div id="ptt_primeur">
		<p>Produits 100% français, bios et d'origine naturelle !</p>
	</div>
	<div id="recette">
		<?php 
		//Requête SQL
		$req_titre ="SELECT * from recettehebdo";
		$rep_titre = mysqli_query($co, $req_titre);
			//Récupération de la réponse + affichage
			while($row_titre = $rep_titre -> fetch_assoc()){
				echo "<h2>".$row_titre['nomRecette']. "</h2>";
				echo "<h3> Temps de préparation : ".$row_titre['tempsPrep']."</h3>";
			}
		?>
			<div id="ing">
				<h3>Ingrédients</h3>
				<ul>
					<?php
						//Requête SQL
						$req_ing = "SELECT * FROM ingredient";
						$rep_ing = mysqli_query($co, $req_ing);
							//Récupération de la réponse + affichage
							while ($row_ing = $rep_ing -> fetch_assoc()) {
								echo "<li> <p>".$row_ing['quantite']." ".$row_ing['mesure']." ".$row_ing['nomIngredient']."</p></li>";
							}
							
							

					?>
				</ul>				
			</div>
			<div id="prep">
				<h3>Préparation</h3>
				<ol>
					<?php
						//Requête SQL
						$req_prep = "SELECT * from etape";
						$rep_prep = mysqli_query($co,$req_prep);
							//Récupération de la réponse + affichage
							while($row_prep = $rep_prep -> fetch_assoc()){
								echo "<li><p>".$row_prep['descEtape']."</p></li>";
							}
							
					?>
					
				</ol>				
				</div>
				<div id="img_rct">
				<?php
					$req_img = "SELECT * from recettehebdo";
					$rep_img = mysqli_query($co,$req_img);
						//Récupération de la réponse + affichage
						while ($row_img = $rep_img -> fetch_assoc()){
						printf('<img id="image_rct" src="../PHOTOS/%s">', $row_img['nomPhotoRecette']);
						}						 
				?>
					
				</div>
	</div>
	<div id="choix_page">
		<div id="p_legume">
		<a href="legumes.php"><img class="img_choix" src="../PHOTOS/p_leg.jpg" alt=""></a>
			<div class="desc_choix_p">
				<a href="legumes.php">
					<span>Légumes</span>
				</a>
			</div>
		</div>
		<div id="p_fruit">
			<a href="fruits.php"><img class="img_choix" src="../PHOTOS/p_fruit.jpg" alt=""></a>
				<div class="desc_choix_p">
					<a href="fruits.php">
						<span>Fruits</span>
					</a>
				</div>
		</div>
	</div>

	<!--Footer-->

	<div class="footer">
		<div id="dispoFoot">
			<div id="certif">
				<p>Site réalisé par Valentin Melusson, Lhukas Nelhomme et Thomas Jallu ©</p>
				<p id="ita">Tous droits réservés</p>
			</div>
			<div class="reseaux">
				<a href="https://www.instagram.com/uberprimeur_/"><img src="../PHOTOS/insta.png" height=40 width=40
						alt></a>
				<a href="https://twitter.com/UPrimeur"><img src="../PHOTOS/twitter.png" height=40 width=40 alt></a>
			</div>

		</div>
		</br>
		<a href="webmaster.php" id="webmaster">accès webmaster</a>
	</div>

</body>

</html>