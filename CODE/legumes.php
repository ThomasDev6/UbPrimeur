<?php

session_start();
    if($_SESSION['idCli'] != 0){
		
		$idclient = $_SESSION['idCli'];
	}else{
		header("Location: index.html");
		exit;
	}
	
	?>
	
<!DOCTYPE html>
<html lang="fr">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styleFruit.css" />
		
        <title>UberPrimeur</title>
        


        <!--Menu de nav-->

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
		<!--Début du body-->
		<body>



        <?php
            require_once("connect.php");
            
            $req = "SELECT * FROM legume";
            $rep = $co->query($req);
            $count = $rep->num_rows;
            $count = $count/4;

            while($row = $rep->fetch_assoc()){

                echo "<div id =\"ligne1\" class=\"ligne\">";
                echo "<div class=\"fruit\">


                <img src=\"../PHOTOS/".$row["nomPhotoLeg"]."\" height=200 width=300 alt>


                <p class=\"nomfruit\">".$row["nomLeg"]." (".$row["detailVenteLeg"].") "."</p>
                <p class=\"nomfruit\">".$row["prixLeg"]." €  </p>
				<p class=\"nomfruit\"> Stock disponible : ".$row["quantiteLeg"]."</p>	

                <form method=\"post\" action=\"ajoutPanierL.php?idL=".$row["idLegume"]."\">

                <input name=\"quantite\" type=\"number\" value=\"0\" max=\"". $row["quantiteLeg"]."\">
                <input name =\"ajout\" id=\"btnAjout\" type=\"submit\" value=\"Ajouter au panier\">
                </form>
                </div>";
                echo "</div>";
            }
        ?>
        </body>

        <!-- FOOTER -->
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
</html>