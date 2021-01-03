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
		<div class="body">
			<?php
				$res=mysqli_query($co,"SELECT * FROM Producteur");
			?>
		</div>
		<footer>&copy; Brice RAHARINOSY et Ashley RAKOTOARISOA</footer>
	</body>
</html>