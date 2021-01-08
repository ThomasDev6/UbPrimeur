
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/stylePaiment.css" />
 
</head>
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

    <div class="contenue">
    <?php 
    require_once('connect.php');
      echo "<form method='post' action='commande.php'>";
      ?>
      
      <div class="row">

<div class="col-50">
  <h3>Paiement</h3>
  <label for="fname">Cartes acceptées</label>
  <div class="icon-container">
    <i class="fa fa-cc-visa" style="color:navy;"></i>
    <i class="fa fa-cc-amex" style="color:blue;"></i>
    <i class="fa fa-cc-mastercard" style="color:red;"></i>
    <i class="fa fa-cc-discover" style="color:orange;"></i>
  </div>
  <label >Nom sur la carte</label>
  <input type="text" id="" name="" placeholder="" required>
  <label for="">Numéro de carte</label>
  <input type="text" id="" name="" placeholder="1111-2222-3333-4444">
  <label for="">Mois d'expiration </label>
  <input type="text" id="" name="" placeholder="Septembre" required>
  <div class="row">
    <div class="col-50">
      <label for="">Année d'expiration</label>
      <input type="text" id="" name="" placeholder="2022" required>
    </div>
    <div class="col-50">
      <label for="">Cryptogramme (CVV)</label>
      <input type="text" id="" name="" placeholder="352" required>
    </div>
  </div>
</div>

</div>
 <button  class="btn" type="submit">Payer</button>
  
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
