<?php
require_once("connect.php");


session_start();

    if(!$_SESSION['auto']){
		header("Location: index.html");
		exit;
    }
?>
	


<!DOCTYPE html>
<html lang="fr">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/webmaster.css" />
		
		<title>UberPrimeur</title>
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
        <body style="text-align:center">
        
            <h1> Page webmaster</h1>


            <div class="tout">
                 <div class="form">
                    <h2>Ajout de stock de fruits et légumes </h2>
                    <form method="post" action="stock.php">

                        <p> Type de marchandise</p>
                        <select name="type" required >
                            <option value="">--Choisissez un type--</option>
                            <option value="fru">Fruit</option>
                            <option value="leg">Légume</option>
                        </select></br>

                        <p>Nom de la marchandise</p>
                        <input type="texte" name="nomMarch" required></br>

                        <p>Ajout de stock</p>
                        <input type="number" name="stock" value="0" required></br>

                        <input id="btnVal" type="submit" value="Valider">

                    </form>
                </div>


                <div class="form">
                    <h2>Changement de prix d'une marchandise </h2>
                    <form method="post" action="prix.php">

                        <p> Type de marchandise</p>
                        <select name="type" required>
                            <option value="">--Choisissez un type--</option>
                            <option value="fru">Fruit</option>
                            <option value="leg">Légume</option>
                        </select></br>

                        <p>Nom de la marchandise</p>
                        <input type="texte" name="nomMarch" required></br>

                        <p>Nouveau prix</p>
                        <input type="number" name="prix" value="0" required></br>

                        <input id="btnVal" type="submit" value="Valider">

                    </form>
                </div>


                <div class="form">
                    <h2>Suppression d'une marchandise </h2>
                    <form method="post" action="retrait.php">

                        <p> Type de marchandise</p>
                        <select name="type" required>
                            <option value="">--Choisissez un type--</option>
                            <option value="fru">Fruit</option>
                            <option value="leg">Légume</option>
                        </select></br>

                        <p>Nom de la marchandise</p>
                        <input type="texte" name="nomMarch" required></br>


                        <input id="btnVal" type="submit" value="Valider">

                    </form>
                </div>



                <div class="form">
                    <h2>Ajout de nouveaux fruits et légumes </h2>
                    <form method="post" action="ajoutMarch.php">

                        <p> Type de marchandise</p>
                        <select name="type" required>
                            <option value="">--Choisissez un type--</option>
                            <option value="fru">Fruit</option>
                            <option value="leg">Légume</option>
                        </select></br>

                        <p>Nom de la marchandise</p>
                        <input type="texte" name="nomMarch" required></br>

                        <p>Nom de la photo</p>
                        <input type="texte" name="nomPh" required></br>

                        <p>Prix à l'unité</p>
                        <input type="number" name="prix" value="0" required></br>

                        <p>Détail de vente</p>
                        <input type="texte" name="detail" required></br>

                        <p>Stock initial</p>
                        <input type="number" name="stockI" value="0" required></br>

                        <p>Famille</p>
                        <input type="texte" name="famille" required></br>

                        <p>Saison</p>
                        <input type="texte" name="saison" required></br>

                        <input id="btnVal" type="submit" value="Valider">

                    </form>
                </div>
            

            <!-- PARTIE THOMAS -->

            <div class ="form">
                    <h2>Ajout de la recette hebdomadaire</h2>
                    <form method ="post" action="ajoutRecetteHebdo.php">

                        <p>Nom de la recette</p>
                        <input type="text" name="nomRecette" require></br>

                        <p>Nom de la photo</p>
                        <input type="text" name="nomPhre"></br>

                        <p>Temps de préparation</p>
                        <input type="time" name="temps"></br>

                        <p>Ingédients :</p>
                        <table>
                            <tr>
                                <th class ="col">Quantité :</th>
                                <th class ="col">Mesure :</th>
                                <th>Nom ingrédient :</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="qt1" placeholder="100"></td>
                                <td><input type="text" name="m1" placeholder="g"></td>
                                <td><input type="text" name="ing1" placeholder="chocolat" ></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qt2"></td>
                                <td><input type="text" name="m2"></td>
                                <td><input type="text" name="ing2"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qt3"></td>
                                <td><input type="text" name="m3"></td>
                                <td><input type="text" name="ing3"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qt4"></td>
                                <td><input type="text" name="m4"></td>
                                <td><input type="text" name="ing4"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qt5"></td>
                                <td><input type="text" name="m5"></td>
                                <td><input type="text" name="ing5"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qt6"></td>
                                <td><input type="text" name="m6"></td>
                                <td><input type="text" name="ing6"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qt7"></td>
                                <td><input type="text" name="m7"></td>
                                <td><input type="text" name="ing7"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="qt8"></td>
                                <td><input type="text" name="m8"></td>
                                <td><input type="text" name="ing8"></td>
                            </tr>
                                                   
                        </table>
                        <table id="etp">
                            <p>Etapes :</p>
                                <tr>
                                <td class="long"><input type="text" name="etape1"></td>
                                </tr>
                                <tr>
                                <td class="long"><input type="text" name="etape2"></td>
                                </tr>
                                <tr>
                                <td class="long"><input type="text" name="etape3"></td>
                                </tr>
                                <tr>
                                <td class="long"><input type="text" name="etape4"></td>
                                </tr>
                                <tr>
                                <td class="long"><input type="text" name="etape5"></td>
                                </tr>
                                <tr>
                                <td class="long"><input type="text" name="etape6"></td>
                                </tr>
                                <tr>
                                <td class="long"><input type="text" name="etape7"></td>
                                </tr>
                                <tr>
                                <td class="long"><input type="text" name="etape8"></td>
                                </tr>
                                <tr>
                                <td class="long"><input type="text" name="etape9"></td>
                                </tr>
                                <tr>
                                <td class="long"><input type="text" name="etape10"></td>
                                </tr>
                        </table>
                        <input id="btnVal" type="submit" value="Valider">
                    </form>
                </div>
                </div>
            <!-- FIN PARTIE THOMAS -->

            <h3> Liste des clients ayant accepté l'envoi de mails de notification :</h3>
            <?php
                require_once("connect.php");

                $req = "SELECT nomClient, prenomClient FROM client WHERE envoiMail = true";
                $rep = $co->query($req);
                while($row = $rep->fetch_assoc()){
                    echo "<p> - ".$row["nomClient"]." ".$row["prenomClient"]."</p>";
                }
            ?>
            

            


        </body>

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