<!DOCTYPE html>
<html lang="fr">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/stylenosPanier.css" />
		
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
				<p class="gTitre TA"> Panier Hebdomadaire</p> 
				<p class="TA txt">Nous vous proposons des paniers au gré des saisons qui vous seront livrés le samedi chaque semaine. </p>
				<p class="TA">La composition du panier est secrète ! vous la découvrirez le jour de la livraison, UberPrimeur vous garantie une satisfaction totale. </p>
				<p class="separationCom"></p>
				
<form method="post" action="paiment.php">
				<div class="photoPanier">
				



				<img src="../PHOTOS/petitpanier.jpeg" alt="" />
					<p>Ce panier convient à 2-3 personnes</p>
					<input type="radio" id="" name="Choix" value="petit" >
				</div>
				<div class="photoPanier">

					<img src="../PHOTOS/moyenpanier.jfif" alt="" />
					<p>Ce panier convient à 4-5 personnes</p>
					<input type="radio" id="" name="Choix" value="moyen" >
				</div>
				<div class="photoPanier">

					<img src="../PHOTOS/photoPanier.jpg" alt="" />
					<p>Ce panier convient à plus de 6 personnes</p>
					<input type="radio" id="" name="Choix" value="grand" >
				</div>

			<input class="btnPanier" type="submit" value="Souscrire à l'abonnement">




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