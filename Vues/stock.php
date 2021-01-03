<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Accueil</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style_acc.css">
	</head>
	<body>
		<nav>
			<a href="accueil.php"><img src="quality.png" alt="logo" class="logo"></a>
			<a href="formulaire_inscription.html"><button id="btnPopup" class="btnPopup" style="background-color: rgb(0,255,0);font-family: Arial;font-size: 100%;cursor:pointer;"> Créer un compte </button></a>
			<a href="formulaire_connexion.html"><button id="btnPopup" class="btnPopup" style="background-color: rgb(0,255,0);font-family: Arial;font-size: 100%;cursor:pointer;"> Se connecter </button></a>
			<a href="recapitulatif.php"><button id="btnPopup" class="btnPopup" style="background-color: rgb(0,255,0);font-family: Arial;font-size: 100%;cursor:pointer;"> Panier </button></a>
			<a href="stock.php"><button id="btnPopup" class="btnPopup" style="background-color: rgb(0,255,0);font-family: Arial;font-size: 100%;cursor:pointer;"> Stock </button></a>
		</nav>
		<br> <br>
		<div class="body">
			<h2> Gestion du stock : </h2>
			<?php
				$res=mysqli_query($co,"SELECT numproduit FROM Produit WHERE famille='Fruit'");
			?>
			<h2> Liste de commandes : </h2>
			<?php
				$res=mysqli_query($co,"SELECT * FROM Commande");
			?>
			<h2> Liste de commandes traitées : </h2>
			<button id="val"> Commande validée </button>
		</div>
		<footer>&copy; Brice RAHARINOSY et Ashley RAKOTOARISOA</footer>
	</body>
</html>