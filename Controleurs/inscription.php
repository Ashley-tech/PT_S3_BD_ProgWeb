<?php
	require_once("../PT/Modeles/bd.php");
	require_once("../PT/Modeles/membre.php");
	
	if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["login"]) && isset($_POST["mdp"])){
		$nom = $_POST["nom"];
		$prenom= $_POST["prenom"];
		$pseudo= $_POST["login"];
		$mdepasse= $_POST["mdp"];
		
		$coBd = new Bd("projet_tutore");
		$co = $coBd->connexion();
		$m = new Membre($co,$id,$nom,$prenom,$pseudo,$mdepasse,$adresse,$cp,$ville,$quart);
		
		header('Location:../vues/formulaire_connexion.php');
	}
?>