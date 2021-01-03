<?php
	require_once("../PT/Modeles/bd.php");
	require_once("../PT/Modeles/membre.php");
	
	if (isset($_POST["nom"]) && isset($_POST["mdp"])){
		$nom = $_POST["nom"];
		$pwd= $_POST["mdp"];
		
		$coBd = new Bd("espace_membres");
		$co = $coBd->connexion() or die("Erreur de connexion !");
		
		$result = mysqli_query($co, "SELECT * FROM Client WHERE loginClient='$nom' AND mdpClient='$mdp'")
		       or die("Erreur requête");
			   
		if (mysqli_num_rows($result) == 1) {
			$m = new Membre($co,$id,$nom,$prenom,$pseudo,$mdepasse,$adresse,$cp,$ville,$quart);
			$m->connexion();
			
			header('Location:../PT/vues/accueil2.php');
		}
		else{
			header('Location:../PT/Vues/formulaire_connexion.php');
		}
	}
?>