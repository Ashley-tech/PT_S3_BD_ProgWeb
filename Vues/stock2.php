<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Accueil</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style_acc.css">
	</head>
	<body>
		<form method="post" action="deconnexion.php">
			<nav>
				<a href="accueil2.php"><img src="quality.png" alt="logo" class="logo"></a>
				<input type="submit" value="Se déconnecter">
				<a href="recapitulatif.php"><button id="btnPopup" class="btnPopup" style="background-color: rgb(0,255,0);font-family: Arial;font-size: 100%;cursor:pointer;"> Panier </button></a>
				<a href="stock2.php"><button id="btnPopup" class="btnPopup" style="background-color: rgb(0,255,0);font-family: Arial;font-size: 100%;cursor:pointer;"> Stock </button></a>
			</nav>
		</form>
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