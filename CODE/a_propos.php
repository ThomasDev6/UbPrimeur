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
<link rel="stylesheet" href="css/style_a_propos.css" />

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
    <div id="livraison_explication">
        <h1 id="h1_liv">Notre Livraison</h1>
        <p id="p1_explication_liv">
            Il existe deux types de livraison différente. Pour la première il s'agit de la livraison à domicile. 
            Lorsque la prise en compte de la commande aura été confirmée par e-mail au client, la livraison interviendra dans les 24 heures sauf le dimanche.
        </p>
        <p id ="p2_explication_liv">Le client s’engage à être présent à l’adresse de livraison durant cette tranche horaire. 
            En cas d’absence du client le transporteur se réserve le droit de déposer la marchandise devant la porte sans que celle-ci ne soit réceptionné par le client directement.
            UberPrimeur ne pourra être tenue pour responsable si la marchandise était amenée à disparaitre entre le moment de la dépose de la marchandise et la réception de celle-ci par le client.
        </p>
        <p id ="p3_explication_liv">Le deuxième type de livraison est lorsque qu'une commande groupée est passée.</p>
        <p id ="p4_explication_liv">Un mail sera envoyé à chacun des clients participants à la commande groupée. Dans ce mail se trouvera le créneau horaire ainsi que l'emplacement du livreur.
            Afin que chaque personne aille chercher sa partie de la commande.
        </p>
        <div class="separateur1"></div>
		<button id="btn_cgv" type="button" onclick="toggle_text('span_txt2');"><h1 id="titre_cgv">Conditions générales de vente</h1></button>
		<span id="span_txt2" >
		<div id ="details_cgv">
        <p id="p_cgv_1">ARTICLE I : ACCEPTATION DES CONDITIONS GENERALES DE VENTE <br>
             Ces Conditions Générales de Vente peuvent être consultées par le Client à tout moment, simplement en cliquant sur le lien hypertexte. 
             "CGV" accessible depuis la page « à propos ». Le fait de se connecter sur le site de UBERPRIMEUR.FR implique la connaissance des présentes conditions 
             générales dans leur intégralité. Ces conditions générales sont totalement applicables à toutes commandes passées sur le site de UBERPRIMEUR.FR. 
             Le fait pour un utilisateur de réaliser un bon de commande et de confirmer celui-ci vaut acceptation pleine et entière des présentes conditions générales, 
             lesquelles seront seules applicables au contrat ainsi conclu. Toute commande sera régie par ces conditions générales, à l'exclusion de toute autre. 
             UBERPRIMEUR.FR se réserve la possibilité d'adapter ou de modifier à tout moment les présentes Conditions Générales de Vente. En cas de modification, 
             il sera appliqué à chaque commande les Conditions Générales de Vente en vigueur au jour de la commande. Il appartient en conséquence au Client de se référer 
             à la dernière version des Conditions Générales de Vente disponible en permanence sur le site.</p>
             <p id="p_cgv_2">
                ARTICLE II : CONCLUSION DE LA VENTE <br>
                Le Client passe commande auprès de UBERPRIMEUR.FR en remplissant un panier sur le Site pour un montant minimum de 60 € TTC pour bénéficier de la 
                livraison gratuite. Après avoir validé son panier, le Client doit s'identifier puis transmettre et payer son panier. <br>
                VALIDATION DE LA COMMANDE : Le Client ayant choisi les produits qu'il souhaite acheter, valide son panier aux vues du récapitulatif affiché à l'écran 
                et recevra un e-mail de confirmation. Le récapitulatif indique notamment : • le libellé des Produits sélectionnés, leur référence et leur prix unitaire
                 • les frais de transport • le prix total à payer par le Client. Aucun droit de rétractation sur les produits périssables avec ou sans DLC ne sera 
                possible une fois la commande validée. <br>
                IDENTIFICATION DU CLIENT : Après avoir validé sa commande, le Client doit s'identifier. A cette fin, il doit remplir sur le Site un formulaire mis à 
                sa disposition. Il indiquera notamment ses nom et prénom, son adresse e-mail, son adresse postale (et l'adresse de livraison si elle est différente), 
                son numéro de téléphone (et le numéro de téléphone du destinataire s’il est différent). UBERPRIMEUR.FR se réserve le droit de vérifier l'exactitude de 
                toute information saisie par le Client, et notamment ses identités et adresse, avant d'expédier les produits commandés. Les informations énoncées par le 
                Client engagent celui-ci : en cas d'erreur dans le libellé des coordonnées du destinataire, le Site ne saurait être tenu responsable de l'impossibilité 
                dans laquelle il pourrait être de livrer les produits commandés. <br>
                PAIEMENT : Le Client valide définitivement sa commande en saisissant son numéro de carte bancaire et la date d'expiration de celle-ci. 
                Les paiements par carte bancaire sont sécurisés par le système de paiement en ligne aux normes SSL. br
                CONFIRMATION : La commande validée par le Client ne sera considérée effective par le Site que lorsque les centres de paiement bancaire concernés 
                auront donné leur accord. Après validation du paiement, la commande est réputée acceptée par UBERPRIMEUR SAS. En cas de refus desdits centres, 
                la commande sera automatiquement annulée et le Client prévenu par e-mail. Les confirmations de commande seront archivées dans les locaux de UBERPRIMEUR.FR 
                et seront considérées comme valant preuve de la nature de la convention et de sa date. Le client ne dispose pas d'un droit de rétractation conformément aux 
                dispositions de l'article L.121-20-2 du Code de la consommation. <br>
                RESERVES : UBERPRIMEUR.FR se réserve en outre la possibilité de ne pas confirmer une commande pour quelques raisons que ce soit, tenant en particulier à un 
                problème d'approvisionnement des produits en raison de leur caractère périssable, un problème concernant la commande reçue, ou un problème prévisible 
                concernant la livraison à effectuer. <br>
             </p>
	</div>
	<div class="separateur1"></div>
	
</span>
 
		<script type="text/javascript">
		function toggle_text(id) {
  	var span = document.getElementById(id);
  	if(span.style.display == "none") {
    	span.style.display = "inline";
  		} else {
    	span.style.display = "none";
  		}
		}
 
 
 
</script>

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